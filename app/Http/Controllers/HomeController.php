<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Kategori;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\Resep;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            if (str_contains(strtolower(auth()->user()->email), 'admin')) {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }
}


