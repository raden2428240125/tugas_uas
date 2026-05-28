<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obats = Obat::all();
        return view('obat.index', compact('obats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('obat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Obat::create([
            'idobat' => $request->idobat,
            'namaobat' => $request->namaobat,
            'jenisobat' => $request->jenisobat,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
            'stok' => $request->stok
        ]);

        return redirect('/obat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obat $obat)
    {
        $obat = Obat::find($obat->idobat);
        return view('obat.edit', compact('obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obat $obat)
    {
        $obat = Obat::findOrFail($obat->idobat);

        $obat->update([
            'namaobat' => $request->namaobat,
            'jenisobat' => $request->jenisobat,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
            'stok' => $request->stok,
        ]);

        return redirect('/obat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obat $obat)
    {
        $obat = Obat::findOrFail($obat->idobat);
        $obat->delete();
        return redirect('/obat');
    }
}
