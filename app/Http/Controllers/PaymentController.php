<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Barang;
use App\Models\Ulasan;
use App\Models\TrackingStatus;
use Midtrans\Snap;
use Midtrans\Config;
// use Midtrans\Transaction;

class PaymentController extends Controller
{
    public function prosesPemesanan(Request $request)
    {
        $dataPemesanan = array_merge(
            $request->only([
                'nama', 'email', 'pickup_method',
                'provinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'kodepos',
                'alamat_detail', 'tanggal_mulai', 'tanggal_selesai',
                'durasi', 'total_harga', 'nama_kendaraan'
            ]),
            [
                'status' => 'pending',
                'user_id' => Auth::id(),
                'barang_id' => $request->barang_id,
            ]
        );

        $pemesanan = Pemesanan::create($dataPemesanan);

        return redirect()->route('payment.show', ['id' => $pemesanan->id]);
    }

    public function show($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
        
        $params = [
            'transaction_details' => [
                'order_id' => $pemesanan->id . '-' . time(),
                'gross_amount' => $pemesanan->total_harga,
            ],
            'customer_details' => [
                'first_name' => $pemesanan->nama,
                'email' => $pemesanan->email,
            ],
            /*
            // --- BAGIAN REDIRECT DINONAKTIFKAN SEMENTARA ---
            'callbacks' => [
                'finish' => route('payment.finish')
            ]
            */
        ];

        $snapToken = Snap::getSnapToken($params);
        return view('pembayaran-midtrans', compact('pemesanan', 'snapToken'));
    }

    public function createSnap(Request $request, $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        $params = [
            'transaction_details' => [
                'order_id' => $pemesanan->id . '-' . time(),
                'gross_amount' => $pemesanan->total_harga,
            ],
            'customer_details' => [
                'first_name' => $pemesanan->nama,
                'email' => $pemesanan->email,
            ],
            /*
            // --- BAGIAN REDIRECT DINONAKTIFKAN SEMENTARA ---
            'callbacks' => [
                'finish' => route('payment.finish')
            ]
            */
        ];
        
        $snapToken = Snap::getSnapToken($params);
        return view('pembayaran-midtrans', compact('snapToken', 'pemesanan'));
    }
    
    public function riwayat(Request $request)
    {
        $query = Pemesanan::with('barang')->where('user_id', Auth::id());

        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $pemesanans = $query->orderByDesc('created_at')->paginate(10);

        $ulasanDiberikan = Ulasan::where('id_user', Auth::id())
                                    ->pluck('id_pesanan')
                                    ->unique();

        return view('riwayat', [
            'pemesanans' => $pemesanans,
            'ulasanDiberikan' => $ulasanDiberikan,
        ]);
    }

    /*
    // --- FUNGSI BARU DINONAKTIFKAN SEMENTARA ---
    public function paymentFinish(Request $request)
    {
        $orderId = $request->query('order_id');
        $pemesanan_id = explode('-', $orderId)[0];
        $pemesanan = Pemesanan::findOrFail($pemesanan_id);

        if ($pemesanan->status !== 'pending') {
            return redirect()->route('riwayat')->with('info', 'Status pesanan ini sudah diproses.');
        }

        try {
            Config::$serverKey = config('midtrans.server_key');
            Config::$isProduction = config('midtrans.is_production');
            $status = Transaction::status($orderId);

            if ($status->transaction_status == 'settlement' || $status->transaction_status == 'capture') {
                $pemesanan->status = 'process';
                $pemesanan->save();

                $barang = Barang::find($pemesanan->barang_id);
                if ($barang) {
                    $barang->ketersediaan = 'tidak tersedia';
                    $barang->save();
                }

                TrackingStatus::create([
                    'pesanan_id' => $pemesanan->id,
                    'deskripsi' => 'Pembayaran berhasil, pesanan sedang diproses.',
                ]);

                return redirect()->route('riwayat')->with('success', 'Pembayaran berhasil! Pesanan Anda sedang diproses.');
            }
        } catch (\Exception $e) {
            return redirect()->route('riwayat')->with('error', 'Terjadi kesalahan saat verifikasi pembayaran.');
        }

        return redirect()->route('riwayat')->with('error', 'Pembayaran tidak berhasil atau masih tertunda.');
    }
    */

    public function handleWebhook(Request $request)
{
    try {
        \Log::info('Webhook dipanggil', ['payload' => $request->all()]);

        // Midtrans config
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        // Ambil notifikasi Midtrans
        $notif = new \Midtrans\Notification();
        $order_id_full = $notif->order_id;
        $status = $notif->transaction_status;

        \Log::info('Notifikasi diterima', [
            'order_id' => $order_id_full,
            'status' => $status
        ]);

        // Ambil ID pemesanan dari order_id Midtrans
        $pemesanan_id = explode('-', $order_id_full)[0];
        $pemesanan = Pemesanan::find($pemesanan_id);

        if (!$pemesanan) {
            \Log::warning("Pemesanan ID {$pemesanan_id} tidak ditemukan");
            return response()->json(['error' => 'Pemesanan tidak ditemukan.'], 404);
        }

        if ($pemesanan->status === 'pending') {
            if (in_array($status, ['capture', 'settlement'])) {
                $pemesanan->status = 'process';

                $barang = Barang::find($pemesanan->barang_id);
                if ($barang) {
                    // Kurangi stok jika belum 0
                    if ($barang->stok > 0) {
                        $barang->stok = $barang->stok - 1;
                    }
                    $barang->save();
                }

                TrackingStatus::create([
                    'pesanan_id' => $pemesanan->id,
                    'deskripsi' => 'Pembayaran berhasil, pesanan sedang diproses.',
                ]);

                $pemesanan->save();

            } elseif (in_array($status, ['cancel', 'expire', 'deny'])) {
                $pemesanan->status = 'canceled';

                $barang = Barang::find($pemesanan->barang_id);
                if ($barang) {
                    $barang->stok = $barang->stok + 1;
                    $barang->save();
                }

                TrackingStatus::create([
                    'pesanan_id' => $pemesanan->id,
                    'deskripsi' => 'Pembayaran gagal atau dibatalkan.',
                ]);

                $pemesanan->save();
            }
        }

        return response()->json(['status' => 'success']);
    } catch (\Exception $e) {
        \Log::error('Webhook Error: ' . $e->getMessage());
        \Log::error('Trace: ' . $e->getTraceAsString());
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}

    

public function cancel(Pemesanan $order)
{
    if (Auth::id() !== $order->user_id) {
        return back()->with('error', 'Anda tidak berhak membatalkan pesanan ini.');
    }

    if ($order->status !== 'pending') {
        return back()->with('error', 'Pesanan ini tidak dapat dibatalkan lagi.');
    }

    $order->status = 'canceled';
    $order->save();

    $barang = Barang::find($order->barang_id);
    if ($barang) {
        // Tambahkan stok kembali karena pesanan dibatalkan
        $barang->stok = $barang->stok + 1;
        $barang->save();
    }

    TrackingStatus::create([
        'pesanan_id' => $order->id,
        'deskripsi' => 'Pesanan dibatalkan oleh pelanggan.',
    ]);

    return redirect()->route('riwayat')->with('success', 'Pesanan berhasil dibatalkan.');
}

}