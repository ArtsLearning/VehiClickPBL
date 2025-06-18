<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class RiwayatTransaksiController extends Controller
{
    public function index()
    {
        // 1. Ambil ID pengguna yang sedang login
        $userId = Auth::id();

        // 2. Ambil data dari database dan simpan ke variabel $riwayat_pengguna
        $riwayat_pengguna = Transaksi::with('kendaraan')
                            ->where('user_id', $userId)
                            ->orderBy('created_at', 'desc')
                            ->get();

        // 3. Kirim variabel $riwayat_pengguna ke view dengan nama 'riwayat'
        //    Pastikan nama di sini ('riwayat') cocok dengan yang dipakai di file Blade (@forelse ($riwayat as ...))
        return view('pages.riwayat_pemesanan', ['riwayat' => $riwayat_pengguna]);
    }
}