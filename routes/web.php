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
use App\Http\Controllers\TentangController;
use App\Http\Controllers\Pesan\ContactController;
use App\Http\Controllers\RiwayatTransaksiController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class,'show']);
Route::get('/change_password', [UbahSandiController::class,'show']);
Route::get('/daftar', [DaftarController::class,'show']);
Route::get('/detail_kendaraan', [DetailKendaraanController::class,'show']);
Route::get('/pembayaran', [PembayaranController::class,'show']);
Route::get('/produk', [BarangController::class,'showProduct']);
Route::get('/produk/{id}', [BarangController::class, 'showDetails'])->name('produk.detail');
Route::get('/profil', [ProfilController::class,'show']);
Route::get('/tentang', [TentangController::class,'show']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/pembayaran/proses', [PaymentController::class, 'process'])->name('payment.process');

// Route untuk Riwayat Transaksi yang benar
Route::get('/riwayat', [RiwayatTransaksiController::class, 'index'])->middleware('auth')->name('riwayat.index');

// Pesan didalam footer
Route::post('/kontak', [ContactController::class, 'store'])->name('pesan.simpan');

Route::get('/dashboard', [BarangController::class,'showDashboard'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Tambahkan temporary di routes/web.php untuk debug
Route::get('/test-recaptcha', function() {
    return [
        'site_key' => config('services.recaptcha.site_key'),
        'secret_key' => config('services.recaptcha.secret_key') ? 'exists' : 'null'
    ];
});

require __DIR__.'/auth.php';