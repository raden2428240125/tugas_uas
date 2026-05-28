<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokters = Dokter::all();
        return view('dokter.index', compact('dokters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dokter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Dokter::create([
            'iddokter' => $request->iddokter,
            'namadokter' => $request->namadokter,
            'spesialis' => $request->spesialis,
            'jadwalpraktik' => $request->jadwalpraktik,
        ]);

        return redirect('/dokter');
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
        $dokter = Dokter::find($id);
        return view('dokter.edit', compact('dokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokter $dokter)
    {
        $dokter->update([
            'namadokter' => $request->namadokter,
            'spesialis' => $request->spesialis,
            'notelp' => $request->notelp,
        ]);

        return redirect('/dokter');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokter $dokter)
    {
        $dokter->delete();
        return redirect('/dokter');
    }
}
