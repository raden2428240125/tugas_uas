<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class SipaPesananController extends Controller
{
    public function index()
    {
        // Ambil semua pesanan beserta relasi
        $pesananAktif = Pesanan::with(['pelanggan', 'detailPesanans.obat', 'pembayaran'])
            ->whereIn('status', ['Menunggu Pembayaran', 'Diproses', 'Siap Diambil'])
            ->latest()
            ->first();

        $pesananSelesai = Pesanan::with(['pelanggan', 'detailPesanans.obat', 'pembayaran'])
            ->whereIn('status', ['Selesai', 'Dibatalkan'])
            ->latest()
            ->paginate(5);

        $totalPesanan = Pesanan::count();

        return view('riwayat-pesanan', compact('pesananAktif', 'pesananSelesai', 'totalPesanan'));
    }

    public function beliLangsung(Request $request)
    {
        $request->validate([
            'obat_id' => 'required|exists:obats,id',
            'jumlah' => 'required|integer|min:1'
        ]);

        $obat = \App\Models\Obat::findOrFail($request->obat_id);
        
        // Buat pesanan baru
        $pesanan = Pesanan::create([
            'pelanggan_id' => Pelanggan::first()->id ?? 1, // Gunakan pelanggan demo
            'tanggal_pesanan' => now(),
            'total_harga' => $obat->harga * $request->jumlah,
            'status' => 'Menunggu Pembayaran'
        ]);

        // Buat detail pesanan
        \App\Models\DetailPesanan::create([
            'pesanan_id' => $pesanan->id,
            'obat_id' => $obat->id,
            'jumlah' => $request->jumlah,
            'subtotal' => $obat->harga * $request->jumlah
        ]);

        // Update stok obat
        if ($obat->stok >= $request->jumlah) {
            $obat->decrement('stok', $request->jumlah);
        }

        return redirect()->route('riwayat-pesanan')->with('success', 'Pesanan berhasil dibuat!');
    }
}
