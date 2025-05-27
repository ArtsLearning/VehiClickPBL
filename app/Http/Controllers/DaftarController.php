<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function show()
    {
        return view('pages.daftar');
    }
}
