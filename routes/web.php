<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PenjualanController;

Route::get('/', [DashboardController::class, 'index']);

Route::resource('kategori', KategoriController::class);

Route::resource('obat', ObatController::class);

Route::resource('pasien', PasienController::class);

Route::resource('dokter', DokterController::class);

Route::resource('penjualan', PenjualanController::class);

