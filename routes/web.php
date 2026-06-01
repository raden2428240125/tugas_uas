<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\UserObatController;

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::resource('kategori', KategoriController::class);
Route::resource('obat', ObatController::class);
Route::get('/', [HomeController::class, 'index']);
Route::resource('pelanggan', PelangganController::class);
Route::resource('resep', ResepController::class);
Route::resource('pesanan', PesananController::class);
Route::resource('pembayaran', PembayaranController::class);
Route::get('/obat-user', [UserObatController::class, 'index']);


