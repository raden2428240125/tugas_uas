<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Penjualan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalObat = Obat::count();
        $totalPasien = Pasien::count();
        $totalDokter = Dokter::count();
        $totalTransaksi = Penjualan::count();

        $stokMenipis = Obat::where('stok', '<', 100)->get();

        return view('dashboard', compact(
            'totalObat',
            'totalPasien',
            'totalDokter',
            'totalTransaksi',
            'stokMenipis'
        ));
    }
}