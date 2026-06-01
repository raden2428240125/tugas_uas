<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\Resep;
use App\Models\Pembayaran;

class DashboardController extends Controller
{
    public function index()
    {
        $totalObat = Obat::count();

        $totalPelanggan = Pelanggan::count();

        $totalPesanan = Pesanan::count();

        $totalResep = Resep::count();

        $totalPembayaran = Pembayaran::count();

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
                'totalResep',
                'totalPesanan',
                'totalPembayaran',
                'stokMenipis',
                'obatKadaluarsa'
            )
        );
    }
}
