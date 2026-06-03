<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with('pesanan')->get();

        return view(
            'pembayaran.index',
            compact('pembayaran')
        );
    }

    public function create()
    {
        $pesanan = Pesanan::all();

        return view(
            'pembayaran.create',
            compact('pesanan')
        );
    }

    public function store(Request $request)
    {
        Pembayaran::create([

            'pesanan_id' => $request->pesanan_id,

            'metode_pembayaran' => $request->metode_pembayaran,

            'jumlah_bayar' => $request->jumlah_bayar,

            'status_pembayaran' => $request->status_pembayaran,

            'tanggal_pembayaran' => $request->tanggal_pembayaran

        ]);

        return redirect('/pembayaran')->with('success', 'Data pembayaran berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $pesanan = Pesanan::all();

        return view(
            'pembayaran.edit',
            compact(
                'pembayaran',
                'pesanan'
            ))->with('success', 'Data pembayaran berhasil diedit');
    }

    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->update([

            'pesanan_id' => $request->pesanan_id,

            'metode_pembayaran' => $request->metode_pembayaran,

            'jumlah_bayar' => $request->jumlah_bayar,

            'status_pembayaran' => $request->status_pembayaran,

            'tanggal_pembayaran' => $request->tanggal_pembayaran

        ]);

        return redirect('/pembayaran')->with('success', 'Data pembayaran berhasil diupdate');
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->delete();

        return redirect('/pembayaran')->with('success', 'Data pembayaran berhasil dihapus') ;
    }
}
