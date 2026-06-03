<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Kategori;

class HomeController extends Controller
{
    public function index()
    {
        $totalObat = Obat::count();
        $totalKategori = Kategori::count();
        return view('home', compact('totalObat', 'totalKategori'));
    }
}
