<?php

use Illuminate\Support\Facades\Route;

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

Route::get('change_password', function () {
    return view('pages.change_password');
});
Route::get('daftar', function () {
    return view('pages.daftar');
});
Route::get('detail_kendaraan', function () {
    return view('pages.detail_kendaraan');
});
Route::get('index', function () {
    return view('pages.index');
});
Route::get('login', function () {
    return view('pages.login');
});
Route::get('pembayaran', function () {
    return view('pages.pembayaran');
});
Route::get('produk', function () {
    return view('pages.produk');
});
Route::get('profil', function () {
    return view('pages.profil');
});
Route::get('riwayat_pemesanan', function () {
    return view('pages.riwayat_pemesanan');
});
Route::get('tentang', function () {
    return view('pages.tentang');
});

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