<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailKendaraanController extends Controller
{
    public function show()
    {
        return view('pages.detail_kendaraan');
    }
}
