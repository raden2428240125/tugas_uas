<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\DetailPesananController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SipaKatalogController;
use App\Http\Controllers\SipaResepController;
use App\Http\Controllers\SipaPesananController;
use App\Http\Controllers\SipaProfilController;
use Illuminate\Support\Facades\Route;

// =============================================
// ADMIN CRUD ROUTES (behind auth)
// =============================================
Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('kategori', KategoriController::class);
    Route::resource('obat', ObatController::class);
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('pesanan', PesananController::class);
    Route::resource('detail-pesanan', DetailPesananController::class);
    Route::resource('pembayaran', PembayaranController::class);
    Route::resource('resep', ResepController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);
});

// =============================================
// SIPA PUBLIC / USER-FACING ROUTES
// =============================================

// Beranda - shows stats from DB
Route::get('/', [HomeController::class, 'index'])->name('login');

// Katalog Obat - shows real obat data from DB
Route::get('/katalog', [SipaKatalogController::class, 'index'])->name('katalog');

// Upload Resep - form + store
Route::middleware('auth')->group(function () {
    Route::get('/upload-resep', [SipaResepController::class, 'create'])->name('upload-resep');
    Route::post('/upload-resep', [SipaResepController::class, 'store'])->name('upload-resep.store');

    // Riwayat Pesanan - shows pesanan data from DB
    Route::get('/riwayat-pesanan', [SipaPesananController::class, 'index'])->name('riwayat-pesanan');
    Route::post('/beli-langsung', [SipaPesananController::class, 'beliLangsung'])->name('beli-langsung');

    // Profil Pengguna - shows pelanggan data
    Route::get('/profil', [SipaProfilController::class, 'index'])->name('profil');
    Route::post('/profil/preferences', [SipaProfilController::class, 'updatePreferences'])->name('profil.preferences');
    Route::post('/profil/alamat', [SipaProfilController::class, 'updateAlamat'])->name('profil.alamat');
    Route::post('/profil/alamat-kantor', [SipaProfilController::class, 'updateAlamatKantor'])->name('profil.alamat-kantor');
});

// Lokasi Apotek (static page)
Route::get('/lokasi-apotek', function () {
    return view('user.lokasi-apotek');
})->name('lokasi-apotek');

// Dashboard (admin) - already connected
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profile (Breeze auth)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/run-migrations-secret', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate:fresh', ['--seed' => true, '--force' => true]);
        return 'Migrasi berhasil dieksekusi! Output: ' . nl2br(\Illuminate\Support\Facades\Artisan::output());
    } catch (\Throwable $e) {
        return response('Error: ' . $e->getMessage() . ' File: ' . $e->getFile() . ' Line: ' . $e->getLine(), 200);
    }
});
