<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function show()
    {
        $barangs = Barang::all();
        return view('pages.produk', compact('barangs'));
    }
}