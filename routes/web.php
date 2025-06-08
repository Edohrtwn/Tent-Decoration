<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaketDekorasiController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');
Route::get('/pembayaran/{id}', [PembayaranController::class, 'detail'])->name('pembayaran.detail');



Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Contoh route tujuan
Route::middleware(['auth', 'role:user'])->get('/user/dashboard', function () {
    return view('user.dashboard');
})->name('user.dashboard');

Route::middleware(['auth', 'role:admin'])->get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// paket crud
Route::get('/paket', [PaketDekorasiController::class, 'index'])->name('paket-dekorasi.index');
Route::get('/paket/create', [PaketDekorasiController::class, 'create'])->name('paket-dekorasi.create');
Route::delete('/paket/{paket_dekorasi}', [PaketDekorasiController::class, 'destroy'])->name('paket-dekorasi.destroy');
Route::post('/paket', [PaketDekorasiController::class, 'store'])->name('paket-dekorasi.store');
Route::get('/paket/{paket_dekorasi}/edit', [PaketDekorasiController::class, 'edit'])->name('paket-dekorasi.edit');
Route::put('/paket/{paket_dekorasi}', [PaketDekorasiController::class, 'update'])->name('paket-dekorasi.update');
Route::delete('/paket/foto/{foto}', [PaketDekorasiController::class, 'deleteFoto'])->name('paket-dekorasi.delete-foto');

// Route register
Route::get('/register', function () {
    return view('auth.register'); // resources/views/auth/register.blade.php
})->name('register');
