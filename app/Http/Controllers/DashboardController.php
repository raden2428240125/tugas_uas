<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pelanggan;
use App\Models\Pesanan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalObat = Obat::count();

        $totalPelanggan = Pelanggan::count();

        $totalPesanan = Pesanan::count();

        $stokMenipis = Obat::where('stok', '<', 10)->get();

        $obatKadaluarsa = Obat::orderBy(
            'tanggal_kadaluarsa',
            'asc'
        )->take(5)->get();

        return view(
            'dashboard',
            compact(
                'totalObat',
                'totalPelanggan',
                'totalPesanan',
                'stokMenipis',
                'obatKadaluarsa'
            )
        );
    }
}
