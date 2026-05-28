<?php
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

Route::resource('kategori', KategoriController::class);

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('kategori', KategoriController::class);