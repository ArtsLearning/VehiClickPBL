<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;

class PembayaranController extends Controller
{
    public function process(Request $request)
    {
        // Simpan data ke tabel 'pemesanans'
        $pemesanan = Pemesanan::create($request->all());

        // Redirect ke halaman pembayaran dengan membawa ID
        return redirect()->route('payment.show', ['id' => $pemesanan->id]);
    }

    public function show($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        return view('pembayaran', [
            'order' => $pemesanan,
            'invoice' => 'INV-' . str_pad($id, 4, '0', STR_PAD_LEFT),
        ]);
    }
}
