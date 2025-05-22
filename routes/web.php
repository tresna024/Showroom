<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
});

// admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/tambah-mobil', [AdminController::class, 'tambah'])->name('tambah');
Route::get('/edit-lihat/{id}', [AdminController::class, 'edit'])->name('edit');
Route::put('/edit_mobil/{id}', [AdminController::class, 'edit_mobil'])->name('edit_mobil');
Route::get('/lihat-mobil/{id}', [AdminController::class, 'lihat_detail'])->name('lihat_detail');
Route::post('/simpan-mobil', [AdminController::class, 'simpan_mobil'])->name('simpan_mobil');
Route::delete('/mobil/{id}', [AdminController::class, 'hapus_mobil'])->name('hapus_mobil');

// user
Route::get('/home', [UserController::class, 'home'])->name('home');
Route::get('/contact', [UserController::class, 'contact'])->name('kontak');
Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/show-mobil/{id}', [UserController::class, 'show_mobil'])->name('show_mobil');
Route::get('/booking/{id}', [UserController::class, 'booking'])->name('booking_user');
Route::post('/checkout/{id}', [UserController::class, 'checkout'])->name('checkout');
Route::post('/simpan_booking', [BookingController::class, 'simpan_booking'])->name('simpan_booking');


// owner
Route::get('/home-owner', [OwnerController::class, 'home'])->name('home_owner');
Route::get('/tambah_mobil_owner', [OwnerController::class, 'tambah'])->name('tambah_owner');
Route::post('/simpan-mobil-owner', [OwnerController::class, 'simpan_mobil'])->name('simpan_mobil_owner');
Route::get('/lihat-mobil-owner/{id}', [OwnerController::class, 'lihat_detail'])->name('lihat_detail_owner');
Route::get('/edit-owner/{id}', [OwnerController::class, 'edit'])->name('edit_owner');
Route::put('/edit-owner/{id}', [OwnerController::class, 'edit_mobil'])->name('edit_mobil_owner');
Route::delete('/mobil-owner/{id}', [OwnerController::class, 'hapus_mobil'])->name('hapus_mobil_owner');
Route::get('/tambah_laporan', [OwnerController::class, 'laporan'])->name('tambah_laporan');
Route::post('/simpan_laporan', [OwnerController::class, 'simpan_laporan'])->name('simpan_laporan');
Route::put('/edit/{id}', [OwnerController::class, 'edit_laporan'])->name('edit_laporan');
Route::delete('/laporan/{id}/hapus', [OwnerController::class, 'hapus_laporan'])->name('laporan_hapus');
Route::get('/data_booking', [OwnerController::class, 'data_booking'])->name('booking');
Route::delete('/data_booking/{id}/hapus', [OwnerController::class, 'hapus_booking'])->name('hapus_booking');

// auth
Route::get('/login-showroom', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/submit_login', [AuthController::class, 'submit_login'])->name('submit_login');
Route::post('/log-out', [AuthController::class, 'logout'])->name('logout');
