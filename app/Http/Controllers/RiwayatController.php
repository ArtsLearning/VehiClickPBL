<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function show()
    {
        return view('pages.riwayat_pemesanan');
    }
}
