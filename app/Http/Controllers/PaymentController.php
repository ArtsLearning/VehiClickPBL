<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Midtrans\Snap;
use Midtrans\Config;

class PaymentController extends Controller
{

    public function prosesPemesanan(Request $request)
    {
        $pemesanan = Pemesanan::create($request->only([
            'nama', 'email', 'pickup_method',
            'provinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'kodepos',
            'alamat_detail', 'tanggal_mulai', 'tanggal_selesai',
            'durasi', 'total_harga', 'nama_kendaraan'
        ]));
        

    return redirect()->route('payment.show', ['id' => $pemesanan->id]);
    }
    public function show($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        // Midtrans configuration
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
        $pemesanan = Pemesanan::findOrFail($id);

        // Konfigurasi Midtrans
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
    public function riwayat()
    {
        // Jika menggunakan auth
        $riwayat = Pemesanan::where('email', auth()->user()->email)
            ->orderBy('created_at', 'desc')
            ->get();
    
        return view('riwayat', compact('riwayat'));
    }
}
