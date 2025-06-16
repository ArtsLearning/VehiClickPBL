<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function showProduct()
    {
        $barangs = Barang::all();
        return view('pages.produk', compact('barangs'));
    }
    public function showDashboard()
    {
        $barangs = Barang::all();
        return view('dashboard', compact('barangs'));
    }
    public function showDetails($id)
    {
        $barangs = Barang::findOrFail($id);
        return view('pages.detail_kendaraan', compact('barangs'));
    }
}