<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\Pesanan;
use App\Models\Obat;
use Illuminate\Http\Request;

class DetailPesananController extends Controller
{
    public function index()
    {
        $detailPesanans = DetailPesanan::with([
            'pesanan',
            'obat'
        ])->get();

        return view(
            'detail-pesanan.index',
            compact('detailPesanans')
        );
    }

    public function create()
    {
        $pesanans = Pesanan::all();
        $obats = Obat::all();

        return view(
            'detail-pesanan.create',
            compact(
                'pesanans',
                'obats'
            )
        );
    }

    public function store(Request $request)
    {
        $obat = Obat::findOrFail(
            $request->obat_id
        );

        $subtotal =
            $obat->harga *
            $request->jumlah;

        DetailPesanan::create([
            'pesanan_id' => $request->pesanan_id,
            'obat_id' => $request->obat_id,
            'jumlah' => $request->jumlah,
            'subtotal' => $subtotal
        ]);

        return redirect()
            ->route('detail-pesanan.index');
    }

    public function show(DetailPesanan $detailPesanan)
    {
        //
    }

    public function edit(DetailPesanan $detailPesanan)
    {
        $pesanans = Pesanan::all();
        $obats = Obat::all();

        return view(
            'detail-pesanan.edit',
            compact(
                'detailPesanan',
                'pesanans',
                'obats'
            )
        );
    }

    public function update(
        Request $request,
        DetailPesanan $detailPesanan
    ) {
        $obat = Obat::findOrFail(
            $request->obat_id
        );

        $subtotal =
            $obat->harga *
            $request->jumlah;

        $detailPesanan->update([
            'pesanan_id' => $request->pesanan_id,
            'obat_id' => $request->obat_id,
            'jumlah' => $request->jumlah,
            'subtotal' => $subtotal
        ]);

        return redirect()
            ->route('detail-pesanan.index');
    }

    public function destroy(
        DetailPesanan $detailPesanan
    ) {
        $detailPesanan->delete();

        return redirect()
            ->route('detail-pesanan.index');
    }
}
