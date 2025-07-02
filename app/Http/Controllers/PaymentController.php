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
                'order_id' => 'INV-' . $pemesanan->id . '-' . time(),
                'gross_amount' => $pemesanan->total_harga,
            ],
            'customer_details' => [
                'first_name' => $pemesanan->nama,
                'email' => $pemesanan->email,
            ],
        ];

        // PERUBAHAN: Menambahkan URL Redirect setelah pembayaran
        $params['finish_redirect_url'] = route('payment.finish', ['pemesanan' => $pemesanan->id]);

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
                'order_id' => 'INV-' . $pemesanan->id . '-' . time(),
                'gross_amount' => $pemesanan->total_harga,
            ],
            'customer_details' => [
                'first_name' => $pemesanan->nama,
                'email' => $pemesanan->email,
            ],
        ];

        // PERUBAHAN: Menambahkan URL Redirect setelah pembayaran
        $params['finish_redirect_url'] = route('payment.finish', ['pemesanan' => $pemesanan->id]);

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

    /**
     * FUNGSI BARU
     * Menangani redirect dari Midtrans setelah user selesai melakukan aksi.
     */
    public function paymentFinish(Request $request, Pemesanan $pemesanan)
    {
        $statusCode = $request->query('status_code');
        $transactionStatus = $request->query('transaction_status');

        // Jika pembayaran sukses (status code 200 dan status settlement)
        if ($statusCode == '200' && $transactionStatus == 'settlement') {
            // Hanya update jika statusnya masih 'pending' untuk mencegah duplikasi
            if ($pemesanan->status == 'pending') {
                // 1. Update status pesanan
                $pemesanan->status = 'process';
                $pemesanan->save();

                // 2. Update status ketersediaan barang
                $barang = Barang::find($pemesanan->barang_id);
                if ($barang) {
                    // Asumsi nama kolom adalah 'ketersediaan' dan nilainya 'tersedia' / 'tidak tersedia'
                    $barang->ketersediaan = 'tidak tersedia';
                    $barang->save();
                }

                // 3. Catat di tracking
                TrackingStatus::create([
                    'pesanan_id' => $pemesanan->id,
                    'deskripsi' => 'Pembayaran berhasil, pesanan sedang diproses.',
                ]);

                return redirect()->route('riwayat')->with('success', 'Pembayaran berhasil! Pesanan Anda sedang diproses.');
            }
        }
        
        // Jika pembayaran gagal atau belum selesai, redirect dengan pesan error/info
        return redirect()->route('riwayat')->with('error', 'Pembayaran tidak berhasil atau masih tertunda.');
    }

    public function handleWebhook(Request $request)
    {
        // Fungsi webhook ini tetap ada sebagai cadangan jika notifikasi dari server berhasil masuk (di lingkungan produksi)
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
        $notif = new \Midtrans\Notification();
        $status = $notif->transaction_status;
        $order_id = $notif->order_id;
        $pemesanan_id = explode('-', $order_id)[1];
        $pemesanan = Pemesanan::find($pemesanan_id);
        if (!$pemesanan) return;

        if ($status == 'capture' || $status == 'settlement') {
            if ($pemesanan->status == 'pending') {
                $pemesanan->status = 'process';
                $barang = Barang::find($pemesanan->barang_id);
                if ($barang) {
                    $barang->ketersediaan = 'tidak tersedia';
                    $barang->save();
                }
            }
        } elseif ($status == 'cancel' || $status == 'expire') {
            if ($pemesanan->status == 'pending') {
                $pemesanan->status = 'canceled';
                $barang = Barang::find($pemesanan->barang_id);
                if ($barang) {
                    $barang->ketersediaan = 'tersedia';
                    $barang->save();
                }
            }
        }
        $pemesanan->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Webhook received successfully',
        ]);
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

        // Kembalikan stok kendaraan
        $barang = Barang::find($order->barang_id);
        if ($barang) {
            // Asumsi nama kolom adalah 'ketersediaan' dan nilainya 'tersedia'
            $barang->ketersediaan = 'tersedia';
            $barang->save();
        }

        TrackingStatus::create([
            'pesanan_id' => $order->id,
            'deskripsi' => 'Pesanan dibatalkan oleh pelanggan.',
        ]);

        return redirect()->route('riwayat')->with('success', 'Pesanan berhasil dibatalkan.');
    }
}
