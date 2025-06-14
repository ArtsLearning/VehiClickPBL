<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class RiwayatTransaksiController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // ambil ID user yang sedang login

        $riwayat = Transaksi::with('kendaraan')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('riwayat.index', compact('riwayat'));
    }
}
