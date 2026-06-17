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
        return view('admin.obat.index', compact('obats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();

        return view(
            'admin.obat.create',
            compact('kategoris')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_obat' => 'required|string|max:255',
            'jenis_obat' => 'required|string|max:255',
            'tanggal_kadaluarsa' => 'required|date',
            'harga' => 'required|numeric',
            'satuan' => 'required|string|max:100',
            'stok' => 'required|integer',
            'kategori_id' => 'required|exists:kategoris,id',
            'deskripsi' => 'nullable|string'
        ]);

        Obat::create($validatedData);

        return redirect('/admin/obat')
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
            'admin.obat.edit',
            compact('obat', 'kategoris')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obat $obat)
    {
        $validatedData = $request->validate([
            'nama_obat' => 'required|string|max:255',
            'jenis_obat' => 'required|string|max:255',
            'tanggal_kadaluarsa' => 'required|date',
            'harga' => 'required|numeric',
            'satuan' => 'required|string|max:100',
            'stok' => 'required|integer',
            'kategori_id' => 'required|exists:kategoris,id',
            'deskripsi' => 'nullable|string'
        ]);

        $obat->update($validatedData);

        return redirect('/admin/obat')
            ->with('success', 'Data obat berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obat $obat)
    {
        $obat->delete();

        return redirect('/admin/obat')
            ->with(
                'success',
                'Data obat berhasil dihapus'
            );
    }
}


