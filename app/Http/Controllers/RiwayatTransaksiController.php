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

        // 2. Ambil data dari database (DENGAN PERBAIKAN)
        $riwayat_pengguna = Transaksi::with('barang') // Diubah dari 'k' menjadi 'barang'
                                   ->where('user_id', $userId) // Diubah dari 'id' menjadi 'user_id'
                                   ->orderBy('created_at', 'desc')
                                   ->paginate(10);

        // 3. Kirim data ke view
        return view('pages.riwayat_pemesanan', ['riwayat' => $riwayat_pengguna]);
    }
}