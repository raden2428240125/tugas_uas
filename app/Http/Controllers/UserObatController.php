<?php

namespace App\Http\Controllers;

use App\Models\Obat;

class UserObatController extends Controller
{
    public function index()
    {
        $obats = Obat::with('kategori')->get();

        return view(
            'user.obat',
            compact('obats')
        );
    }
}
