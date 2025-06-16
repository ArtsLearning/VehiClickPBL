<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function process(Request $request)
    {
        // Simpan pembayaran atau validasi di sini
        return redirect()->back()->with('success', 'Pembayaran berhasil diproses!');
    }
}
