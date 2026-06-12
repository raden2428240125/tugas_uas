<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\Pelanggan;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalObat = Obat::count();
        $totalKategori = Kategori::count();
        $totalPesanan = Pesanan::count();
        $totalPelanggan = Pelanggan::count();

        // Get recent orders
        $recentOrders = Pesanan::with('pelanggan')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalObat', 
            'totalKategori', 
            'totalPesanan', 
            'totalPelanggan',
            'recentOrders'
        ));
    }
}
