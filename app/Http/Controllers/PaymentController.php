<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Barang;
use Midtrans\Snap;
use Midtrans\Config;

class PaymentController extends Controller
{
    public function prosesPemesanan(Request $request)
    {
        $pemesanan = Pemesanan::create(array_merge(
            $request->only([
                'nama', 'email', 'pickup_method',
                'provinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'kodepos',
                'alamat_detail', 'tanggal_mulai', 'tanggal_selesai',
                'durasi', 'total_harga', 'nama_kendaraan'
            ]),
            ['status' => 'pending']
        ));
        

        $barang = Barang::find($request->barang_id);

        if ($barang && $barang->stok > 0) {
            $barang->decrement('stok');
        }

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
   
    public function riwayat(Request $request)
{
    $query = Pemesanan::query();

    // Filter berdasarkan email user yang login
    if (Auth::check()) {
        $query->where('email', Auth::user()->email);
    }

    // Filter status jika dipilih
    if ($request->has('status') && $request->status !== 'all') {
        $query->where('status', $request->status);
    }

    $pemesanans = $query->orderByDesc('created_at')->paginate(10);

    return view('riwayat', compact('pemesanans'));
}
    public function handleCallback(Request $request)
    {
        $notif = new \Midtrans\Notification();
        $status = $notif->transaction_status;
        $order_id = $notif->order_id;
        $pemesanan_id = explode('-', $order_id)[1];

        $pemesanan = Pemesanan::find($pemesanan_id);
        if (!$pemesanan) return;

        if ($status == 'capture' || $status == 'settlement') {
            $pemesanan->status = 'completed';
        } elseif ($status == 'pending') {
            $pemesanan->status = 'pending';
        } elseif ($status == 'cancel' || $status == 'expire') {
            $pemesanan->status = 'canceled';
        }

        $pemesanan->save();
    }

}
