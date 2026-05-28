<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualans = Penjualan::all();
        return view('penjualan.index', compact('penjualans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penjualan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Penjualan::create([
            'idpenjualan' => $request->idpenjualan,
            'idresep' => $request->idresep,
            'idkasir' => $request->idkasir,
            'idapoteker' => $request->idapoteker,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal, 
            'totalharga' => $request->totalharga,
        ]);

        return redirect('/penjualan');
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
        $penjualan = Penjualan::find($id);
        return view('penjualan.edit', compact('penjualan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Penjualan $penjualan)
    {
        $penjualan->update([
            'idresep' => $request->idresep,
            'idkasir' => $request->idkasir,
            'idapoteker' => $request->idapoteker,
            'tanggal' => $request->tanggal, 
            'totalharga' => $request->totalharga,
        ]);

        return redirect('/penjualan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();
        return redirect('/penjualan');
    }
}
