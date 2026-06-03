<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use App\Models\Kategori;

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
        $kategoris = Kategori::all();

        return view(
            'obat.create',
            compact('kategoris')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Obat::create([
            'nama_obat' => $request->nama_obat,
            'jenis_obat' => $request->jenis_obat,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
            'stok' => $request->stok,
            'kategori_id' => $request->kategori_id,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect('/obat')
            ->with(
                'success',
                'Data obat berhasil ditambahkan'
            );
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
        $kategoris = Kategori::all();

        return view(
            'obat.edit',
            compact('obat', 'kategoris')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obat $obat)
    {
        $obat->update([
            'nama_obat' => $request->nama_obat,
            'jenis_obat' => $request->jenis_obat,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
            'stok' => $request->stok,
            'kategori_id' => $request->kategori_id,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect('/obat')
            ->with('success', 'Data obat berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obat $obat)
    {
        $obat->delete();

        return redirect('/obat')
            ->with(
                'success',
                'Data obat berhasil dihapus'
            );
    }
}
