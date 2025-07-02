<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Ulasan;
use App\Models\Pemesanan; // Pastikan ini ada
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    // Fungsi ini tidak diubah
    public function showProduct()
    {
        $barangs = Barang::paginate(6);
        return view('pages.produk', compact('barangs'));
    }

    public function showDashboard()
    {
        // ==========================================================
        // ==================== AWAL PERUBAHAN LOGIKA =====================
        // ==========================================================

        // LANGKAH 1: Dapatkan semua ID barang yang statusnya 'process' atau 'disewa'.
        $unavailableBarangIds = Pemesanan::whereIn('status', ['process', 'disewa'])
                                        ->pluck('barang_id')
                                        ->unique();

        // LANGKAH 2: Bangun query utama dengan filter whereNotIn
        $ulasanTableName = (new Ulasan())->getTable();

        // PERBAIKAN: Menggunakan 'barangs.id' untuk menghindari ambiguitas
        $barangsQuery = Barang::whereNotIn('barangs.id', $unavailableBarangIds) // <-- Filter diperbaiki di sini
            ->leftJoin($ulasanTableName, 'barangs.id', '=', $ulasanTableName . '.id_produk')
            ->select(
                'barangs.id',
                'barangs.nama_barang',
                'barangs.deskripsi',
                'barangs.harga_barang',
                'barangs.foto_barang',
                'barangs.kategori',
                'barangs.stok',
                DB::raw('COALESCE(AVG(' . $ulasanTableName . '.rating), 0) as average_rating'),
                DB::raw('COUNT(' . $ulasanTableName . '.id) as total_ulasan')
            )
            ->groupBy(
                'barangs.id',
                'barangs.nama_barang',
                'barangs.deskripsi',
                'barangs.harga_barang',
                'barangs.foto_barang',
                'barangs.kategori',
                'barangs.stok'
            );

        // LANGKAH 3: Lakukan pagination
        $barangs = $barangsQuery->paginate(6);

        // LANGKAH 4: Hitung statistik berdasarkan barang yang tersedia saja
        // PERBAIKAN: Menggunakan 'barangs.id' juga di sini
        $jumlah = $barangs->total();
        $jumlahMobil = Barang::where('kategori', 'Mobil')->whereNotIn('barangs.id', $unavailableBarangIds)->count();
        $jumlahMotor = Barang::where('kategori', 'Motor')->whereNotIn('barangs.id', $unavailableBarangIds)->count();
        
        // ==========================================================
        // ===================== AKHIR PERUBAHAN LOGIKA ====================
        // ==========================================================

        return view('dashboard', compact('barangs', 'jumlah', 'jumlahMobil', 'jumlahMotor'));
    }

    // Fungsi ini tidak diubah
    public function showDetails($id)
    {
        $barang = Barang::findOrFail($id);
        $ulasans = Ulasan::where('id_produk', $id)
                            ->with('user')
                            ->latest()
                            ->paginate(5, ['*'], 'ulasan_page');
        $reviewCount = $ulasans->total();
        $averageRating = Ulasan::where('id_produk', $id)->avg('rating');
        return view('pages.detail_kendaraan', [
            'barang' => $barang,
            'ulasans' => $ulasans,
            'reviewCount' => $reviewCount,
            'averageRating' => $averageRating,
        ]);
    }
}
