<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Pelanggan;
use App\Models\Resep;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::with([
            'pelanggan',
            'resep'
        ])->get();

        return view(
            'pesanan.index',
            compact('pesanan')
        );
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();

        $resep = Resep::all();

        return view(
            'pesanan.create',
            compact(
                'pelanggan',
                'resep'
            ))->with('success', 'Data pesanan berhasil ditambahkan');
    }

    public function store(Request $request)
    {
        Pesanan::create([

            'pelanggan_id' => $request->pelanggan_id,

            'resep_id' => $request->resep_id,

            'tanggal_pesanan' => $request->tanggal_pesanan,

            'total_harga' => $request->total_harga,

            'status' => $request->status

        ]);

        return redirect('/pesanan')->with('success', 'Data pesanan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        $pelanggan = Pelanggan::all();

        $resep = Resep::all();

        return view(
            'pesanan.edit',
            compact(
                'pesanan',
                'pelanggan',
                'resep'
            )
        )->with('success', 'Data pesanan berhasil diedit');
    }

    public function update(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);

        $pesanan->update([

            'pelanggan_id' => $request->pelanggan_id,

            'resep_id' => $request->resep_id,

            'tanggal_pesanan' => $request->tanggal_pesanan,

            'total_harga' => $request->total_harga,

            'status' => $request->status

        ]);

        return redirect('/pesanan')->with('success', 'Data pesanan berhasil diupdate');
    }

    public function destroy($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        $pesanan->delete();

        return redirect('/pesanan')->with('success', 'Data pesanan berhasil dihapus');
    }
}
