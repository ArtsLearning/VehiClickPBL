<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Ulasan;
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
        $ulasanTableName = (new Ulasan())->getTable();

        $barangs = Barang::leftJoin($ulasanTableName, 'barangs.id', '=', $ulasanTableName . '.id_produk')
            ->select(
                'barangs.id',
                'barangs.nama_barang',
                'barangs.deskripsi', // <-- [DIPERBAIKI] Sesuai nama kolom di database Anda
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
                'barangs.deskripsi', // <-- [DIPERBAIKI] Sesuai nama kolom di database Anda
                'barangs.harga_barang',
                'barangs.foto_barang',
                'barangs.kategori',
                'barangs.stok'
            )
            ->paginate(6);

        $jumlah = Barang::count();
        $jumlahMobil = Barang::where('kategori', 'Mobil')->count();
        $jumlahMotor = Barang::where('kategori', 'Motor')->count();

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