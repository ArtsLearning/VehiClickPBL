<?php

namespace App\Http\Controllers;

use App\Models\Barang;
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
    public function showDetails($id)
    {
        $barangs = Barang::findOrFail($id);
        return view('pages.detail_kendaraan', compact('barangs'));
    }
}