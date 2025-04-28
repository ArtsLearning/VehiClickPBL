<?php

use Illuminate\Support\Facades\Route;

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
Route::get('detail_penyewaan', function () {
    return view('pages.detail_penyewaan');
});