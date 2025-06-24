<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Ulasan; // <-- [DITAMBAHKAN] Memanggil model Ulasan
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function showProduct()
    {
        $barangs = Barang::paginate(6);
        return view('pages.produk', compact('barangs'));
    }
    
    public function showDashboard()
    {
        $barangs = Barang::paginate(6);
        $jumlah = Barang::count();
        $jumlahMobil = Barang::where('kategori', 'Mobil')->count();
        $jumlahMotor = Barang::where('kategori', 'Motor')->count();
        return view('dashboard', compact('barangs', 'jumlah', 'jumlahMobil', 'jumlahMotor'));
    }

    // ==========================================================
    // ==== FUNGSI INI YANG DIPERBAIKI ====
    // ==========================================================
public function showDetails($id)
{
    $barang = Barang::findOrFail($id);

    // Ambil data ulasan (sama seperti sebelumnya)
    $ulasans = Ulasan::where('id_produk', $id)
                        ->with('user')
                        ->latest()
                        ->paginate(5, ['*'], 'ulasan_page');

    // [TAMBAHAN BARU] Hitung rata-rata rating dan jumlah ulasan
    $reviewCount = $ulasans->total();
    $averageRating = Ulasan::where('id_produk', $id)->avg('rating');

    // Kirim semua data yang kita butuhkan ke view
    return view('pages.detail_kendaraan', [
        'barang' => $barang,
        'ulasans' => $ulasans,
        'reviewCount' => $reviewCount,         // <-- Data baru
        'averageRating' => $averageRating,     // <-- Data baru
    ]);
}
}