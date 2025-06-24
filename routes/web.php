<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DetailKendaraanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\Pesan\ContactController;
use App\Http\Controllers\RiwayatTransaksiController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UbahSandiController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UlasanController;

// Landing Page
Route::get('/', [IndexController::class, 'show'])->name('home');

// Kendaraan
Route::get('/detail_kendaraan', [DetailKendaraanController::class, 'show']);

// Produk
Route::get('/produk', [BarangController::class, 'showProduct']);
Route::get('/produk/{id}', [BarangController::class, 'showDetails'])->name('produk.detail');

// Riwayat

Route::get('/riwayat', [PaymentController::class, 'riwayat'])->name('riwayat');
Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store')->middleware('auth');
Route::post('/midtrans/webhook', [PaymentController::class, 'handleWebhook']);



// Pembayaran


//midtrans
Route::post('/payment/process', [PaymentController::class, 'prosesPemesanan'])->name('payment.process');
Route::get('/payment/{id}', [PaymentController::class, 'show'])->name('payment.show');
Route::post('/payment/snap/{id}', [PaymentController::class, 'createSnap'])->name('payment.snap');


// Google Auth
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

// Kontak/Pesan Footer
Route::post('/kontak', [ContactController::class, 'store'])->name('pesan.simpan');

// Dashboard (hanya untuk user terverifikasi)
Route::get('/dashboard', [BarangController::class, 'showDashboard'])
    ->middleware(['auth', 'verified'])->name('dashboard');

// Group route yang membutuhkan autentikasi
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile/delete-photo', [ProfileController::class, 'deletePhoto'])->name('profile.delete-photo');
    Route::post('/profile/verifikasi-ktp', [ProfileController::class, 'verifikasiKtp'])->name('profile.verifikasi-ktp');

    // Riwayat Transaksi
    Route::get('/riwayat-transaksi', [RiwayatTransaksiController::class, 'index'])->name('riwayat.index');
});

// Debug/Testing Recaptcha (sementara)
Route::get('/test-recaptcha', function() {
    return [
        'site_key' => config('services.recaptcha.site_key'),
        'secret_key' => config('services.recaptcha.secret_key') ? 'exists' : 'null'
    ];
});

// Auth routes bawaan Laravel
require __DIR__.'/auth.php';