<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function show(Request $request)
    {
        // Jika ada data order, kirim ke view
        $order = $request->has('order') ? $request->input('order') : null;
        return view('pages.pembayaran', compact('order'));
    }

    public function process(Request $request)
    {
        // Ambil data dari form
        $order = [
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'metode' => $request->input('metode'),
            'nominal' => $request->input('nominal'),
        ];
        // Redirect ke halaman pembayaran dengan data order
        return view('pages.pembayaran', compact('order'));
    }
}
