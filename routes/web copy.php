<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UbahSandiController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DetailKendaraanController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\TentangController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\UlasanController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/change_password', [UbahSandiController::class,'show']);
Route::get('/daftar', [DaftarController::class,'show']);
Route::get('/detail_kendaraan', [DetailKendaraanController::class,'show']);
Route::get('/login', [LoginController::class,'show']);
Route::get('/pembayaran', [PembayaranController::class,'show']);
Route::get('/produk', [BarangController::class,'show']);
Route::get('/profil', [ProfilController::class,'show']);
Route::get('/riwayat', [RiwayatController::class,'show']);
Route::get('/tentang', [TentangController::class,'show']);

Route::get('/admin/index', [AdminController::class,'index']);
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('kategori');
Route::get('/admin/kategori/create', [KategoriController::class, 'create'])->name('admin.kategori.create');
Route::get('/admin/kategori/edit', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
Route::get('/admin/produk', [ProdukController::class, 'index'])->name('produk');
Route::get('/admin/produk/create', [ProdukController::class, 'create'])->name('admin.produk.create');
Route::get('/admin/produk/edit', [ProdukController::class, 'edit'])->name('admin.produk.edit');
Route::get('/admin/user', [UserController::class, 'index'])->name('user');
Route::get('/admin/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/admin/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::get('/admin/ulasan', [UlasanController::class, 'index'])->name('ulasan');