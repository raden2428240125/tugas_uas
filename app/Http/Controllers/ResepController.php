<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    public function index()
    {
        $resep = Resep::with('pelanggan')->get();

        return view('resep.index', compact('resep'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();

        return view('resep.create', compact('pelanggan'));
    }

    public function store(Request $request)
    {
        Resep::create([
            'pelanggan_id' => $request->pelanggan_id,
            'file_resep' => $request->file_resep,
            'status' => $request->status,
            'catatan' => $request->catatan
        ]);

        return redirect('/resep')->with('success', 'Data resep berhasil ditambahkan');
    }

    public function edit($id)
    {
        $resep = Resep::findOrFail($id);

        $pelanggan = Pelanggan::all();

        return view(
            'resep.edit',
            compact(
                'resep',
                'pelanggan'
            )
        )->with('success', 'Data resep berhasil diedit');
    }

    public function update(Request $request, $id)
    {
        $resep = Resep::findOrFail($id);

        $resep->update([
            'pelanggan_id' => $request->pelanggan_id,
            'file_resep' => $request->file_resep,
            'status' => $request->status,
            'catatan' => $request->catatan
        ]);

        return redirect('/resep')->with('success', 'Data resep berhasil diupdate');
    }

    public function destroy($id)
    {
        $resep = Resep::findOrFail($id);

        $resep->delete();

        return redirect('/resep')->with('success', 'Data resep berhasil dihapus');
    }
}
