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
use App\Http\Controllers\Pesan\ContactController;
use App\Http\Controllers\RiwayatTransaksiController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Pesan\ContactController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [IndexController::class,'show']);

Route::get('/change_password', [UbahSandiController::class,'show']);

Route::get('/daftar', [DaftarController::class,'show']);

Route::get('/detail_kendaraan', [DetailKendaraanController::class,'show']);

// Route::get('/login', [LoginController::class,'show']);

Route::get('/pembayaran', [PembayaranController::class,'show']);

Route::get('/produk', [BarangController::class,'showProduct']);
Route::get('/produk/{id}', [BarangController::class, 'showDetails'])->name('produk.detail');

Route::get('/profil', [ProfilController::class,'show']);
Route::get('/riwayat', [RiwayatController::class, 'show'])->name('riwayat');
Route::get('/tentang', [TentangController::class,'show']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/pembayaran/proses', [PaymentController::class, 'process'])->name('payment.process');

// Pesan didalam footer
Route::post('/kontak', [ContactController::class, 'store'])->name('pesan.simpan');

Route::get('/dashboard', [BarangController::class,'showDashboard'])
->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Riwayat Transaksi
    Route::get('/riwayat-transaksi', [RiwayatTransaksiController::class, 'index'])->name('riwayat.index');
});

// Tambahkan temporary di routes/web.php untuk debug
Route::get('/test-recaptcha', function() {
    return [
        'site_key' => config('services.recaptcha.site_key'),
        'secret_key' => config('services.recaptcha.secret_key') ? 'exists' : 'null'
    ];
});

require __DIR__.'/auth.php';