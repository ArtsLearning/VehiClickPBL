<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UbahSandiController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DetailKendaraanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\TentangController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [IndexController::class,'show']);

Route::get('/change_password', [UbahSandiController::class,'show']);
Route::get('/daftar', [DaftarController::class,'show']);
Route::get('/detail_kendaraan', [DetailKendaraanController::class,'show']);
// Route::get('/login', [LoginController::class,'show']);
Route::get('/pembayaran', [PembayaranController::class,'show']);
Route::get('/produk', [BarangController::class,'show']);
Route::get('/profil', [ProfilController::class,'show']);
Route::get('/riwayat', [RiwayatController::class, 'show'])->name('riwayat');
Route::get('/tentang', [TentangController::class,'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';