<?php

use App\Http\Controllers\AdminPemesananController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardAdmin;
use App\Http\Controllers\DashboardUser;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PaketDekorasiController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/produk/{id}', [ProdukController::class, 'show'])->middleware('auth')->name('produk.show');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route register
Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Contoh route tujuan
Route::middleware(['auth', 'role:user'])->get('/user/dashboard', [DashboardUser::class, 'index'])->name('user.dashboard');



// paket crud
Route::get('/paket', [PaketDekorasiController::class, 'index'])->name('paket-dekorasi.index');
Route::get('/paket/create', [PaketDekorasiController::class, 'create'])->name('paket-dekorasi.create');
Route::delete('/paket/{paket_dekorasi}', [PaketDekorasiController::class, 'destroy'])->name('paket-dekorasi.destroy');
Route::post('/paket', [PaketDekorasiController::class, 'store'])->name('paket-dekorasi.store');
Route::get('/paket/{paket_dekorasi}/edit', [PaketDekorasiController::class, 'edit'])->name('paket-dekorasi.edit');
Route::put('/paket/{paket_dekorasi}', [PaketDekorasiController::class, 'update'])->name('paket-dekorasi.update');
Route::delete('/paket/foto/{foto}', [PaketDekorasiController::class, 'deleteFoto'])->name('paket-dekorasi.delete-foto');

// route pemesanan
Route::post('/pemesanan', [PemesananController::class, 'store'])->name('pemesanan.store');

Route::get('/pembayaran/{id}', [PembayaranController::class, 'detail'])->name('pembayaran.detail');
Route::get('/berhasil/{id}', [PembayaranController::class, 'berhasil'])->name('pembayaran.berhasil');
Route::post('/pembayaran/upload', [PembayaranController::class, 'uploadBukti'])->name('pembayaran.upload');

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardAdmin::class, 'index'])->name('admin.dashboard.home');
    Route::get('/pemesanans', [AdminPemesananController::class, 'index'])->name('admin.pemesanans.index');
    Route::get('/pemesanans/{id}', [AdminPemesananController::class, 'show'])->name('admin.pemesanans.show');
    Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
    Route::get('/kontak/{id}/edit', [KontakController::class, 'edit'])->name('kontak.edit');
    Route::put('/kontak/{id}', [KontakController::class, 'update'])->name('kontak.update');
    Route::get('/ubah-password', [PasswordController::class, 'edit'])->name('admin.dashboard.password.edit');
    Route::post('/ubah-password', [PasswordController::class, 'update'])->name('password.update');
});
    Route::put('/admin/pemesanan/{id}/status', [AdminPemesananController::class, 'updateStatus'])->name('admin.pemesanan.updateStatus');


Route::post('/produk/{id}/review', [ProdukController::class, 'storeReview'])
    ->middleware('auth')
    ->name('produk.review.store');

    

