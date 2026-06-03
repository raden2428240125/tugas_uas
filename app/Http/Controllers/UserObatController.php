<?php

namespace App\Http\Controllers;

use App\Models\Obat;

class UserObatController extends Controller
{
    public function index()
    {
        $obats = Obat::all();

        return view(
            'user.obat',
            compact('obats')
        );
    }

    public function show($id)
    {
        $obat = Obat::findOrFail($id);

        return view(
            'user.show',
            compact('obat')
        );
    }
}
