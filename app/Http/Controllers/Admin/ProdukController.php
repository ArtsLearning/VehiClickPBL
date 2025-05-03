<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        return view('admin.pages.produk');
    }
    public function create()
    {
        return view('admin.create.tambah_produk');
    }
    public function edit()
    {
        return view('admin.edit.edit_produk');
    }
}