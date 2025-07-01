<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Barang;
use App\Models\Ulasan;
use Midtrans\Snap;
use Midtrans\Config;

class PaymentController extends Controller
{
    public function prosesPemesanan(Request $request)
    {
        // --- PERUBAHAN 1: Menyimpan user_id dan barang_id ---
        // Kita gabungkan data dari form dengan user_id dan barang_id
        $dataPemesanan = array_merge(
            $request->only([
                'nama', 'email', 'pickup_method',
                'provinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'kodepos',
                'alamat_detail', 'tanggal_mulai', 'tanggal_selesai',
                'durasi', 'total_harga', 'nama_kendaraan'
            ]),
            [
                'status' => 'pending',
                'user_id' => Auth::id(), // Mengambil ID user yang sedang login
                'barang_id' => $request->barang_id, // Mengambil ID barang dari form
            ]
        );

        $pemesanan = Pemesanan::create($dataPemesanan);

        $barang = Barang::find($request->barang_id);

        if ($barang && $barang->stok > 0) {
            $barang->decrement('stok');
        }

        return redirect()->route('payment.show', ['id' => $pemesanan->id]);
    }

    public function show($id)
    {
        // ... (Tidak ada perubahan di fungsi ini)
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
        $snapToken = Snap::getSnapToken($params);
        return view('pembayaran-midtrans', compact('pemesanan', 'snapToken'));
    }

    public function createSnap(Request $request, $id)
    {
        // ... (Tidak ada perubahan di fungsi ini)
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
        $snapToken = Snap::getSnapToken($params);
        return view('pembayaran-midtrans', compact('snapToken', 'pemesanan'));
    }
    
    // --- FUNGSI RIWAYAT YANG SUDAH DIPERBAIKI ---
    public function riwayat(Request $request)
    {
        // ==========================================================
        // ================== PERUBAHAN DI BARIS INI ==================
        // ==========================================================
        $query = Pemesanan::with('barang')->where('user_id', Auth::id());

        // Filter status jika dipilih (logika ini sudah benar, kita pertahankan)
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $pemesanans = $query->orderByDesc('created_at')->paginate(10);

        // Ambil semua ID pesanan yang SUDAH PERNAH DIULAS
        $ulasanDiberikan = Ulasan::where('id_user', Auth::id())
                                    ->pluck('id_pesanan') // Ambil hanya kolom id_pesanan, sangat efisien
                                    ->unique();

        // Kirim semua data yang dibutuhkan ke view
        return view('riwayat', [
            'pemesanans' => $pemesanans,
            'ulasanDiberikan' => $ulasanDiberikan,
        ]);
    }

    public function handleWebhook(Request $request)
    {
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
            $pemesanan->status = 'process';
        } elseif ($status == 'pending') {
            $pemesanan->status = 'pending';
        } elseif ($status == 'cancel' || $status == 'expire') {
            $pemesanan->status = 'canceled';
        }
        $pemesanan->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Webhook received successfully',
        ]);
    }
}
