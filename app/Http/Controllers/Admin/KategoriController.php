<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return view('admin.pages.kategori');
    }
    public function create()
    {
        return view('admin.create.tambah_kategori');
    }
    public function edit()
    {
        return view('admin.edit.edit_kategori');
    }
}