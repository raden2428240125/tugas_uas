<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class SipaPesananController extends Controller
{
    public function index()
    {
        // Cari pelanggan berdasarkan user yang login
        $user = auth()->user();
        $pelanggan = \App\Models\Pelanggan::where('email', $user->email)->first();
        $pelangganId = $pelanggan ? $pelanggan->id : 0;

        // Ambil pesanan aktif milik user ini
        $pesananAktif = Pesanan::with(['pelanggan', 'detailPesanans.obat', 'pembayaran'])
            ->where('pelanggan_id', $pelangganId)
            ->whereIn('status', ['Menunggu Pembayaran', 'Diproses', 'Siap Diambil'])
            ->latest()
            ->first();

        // Ambil riwayat pesanan selesai milik user ini
        $pesananSelesai = Pesanan::with(['pelanggan', 'detailPesanans.obat', 'pembayaran'])
            ->where('pelanggan_id', $pelangganId)
            ->whereIn('status', ['Selesai', 'Dibatalkan'])
            ->latest()
            ->paginate(5);

        $totalPesanan = Pesanan::where('pelanggan_id', $pelangganId)->count();

        return view('user.riwayat-pesanan', compact('pesananAktif', 'pesananSelesai', 'totalPesanan'));
    }

    public function beliLangsung(Request $request)
    {
        $request->validate([
            'obat_id' => 'required|exists:obats,id',
            'jumlah' => 'required|integer|min:1'
        ]);

        $obat = \App\Models\Obat::findOrFail($request->obat_id);
        
        $pelanggan = Pelanggan::where('email', auth()->user()->email ?? 'demo@example.com')->first();
        if (!$pelanggan) {
            $user = auth()->user();
            $pelanggan = Pelanggan::create([
                'nama' => $user->name ?? 'Pelanggan Demo',
                'email' => $user->email ?? 'demo@example.com',
                'password' => bcrypt('password'),
                'no_telp' => '081234567890',
                'alamat' => 'Alamat Default',
            ]);
        }

        // Buat pesanan baru
        $pesanan = Pesanan::create([
            'pelanggan_id' => $pelanggan->id,
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

        return redirect()->route('user.riwayat-pesanan')->with('success', 'Pesanan berhasil dibuat!');
    }
}


