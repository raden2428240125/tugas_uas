<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;



class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasiens = Pasien::all();
        return view('pasien.index', compact('pasiens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pasien::create([

            'idpasien' => $request->idpasien,
            'namapasien' => $request->namapasien,
            'alamat' => $request->alamat,
            'notelp' => $request->notelp,
            'jeniskelamin' => $request->jeniskelamin,
            'golongandarah' => $request->golongandarah,
            'alergiobat' => $request->alergiobat,
            'keluhan' => $request->keluhan,

        ]);

        return redirect('/pasien');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pasien = Pasien::find($id);
        return view('pasien.edit', compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasien $pasien)
    {
        $pasien->update([
            'namapasien' => $request->namapasien,
            'alamat' => $request->alamat,
            'notelp' => $request->notelp,
            'jeniskelamin' => $request->jeniskelamin,
            'golongandarah' => $request->golongandarah,
            'alergiobat' => $request->alergiobat,
            'keluhan' => $request->keluhan,
        ]);

        return redirect('/pasien');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();
        return redirect('/pasien');
    }
}
