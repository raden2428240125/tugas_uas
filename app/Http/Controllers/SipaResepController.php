<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class SipaResepController extends Controller
{
    public function create()
    {
        return view('upload-resep');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file_resep' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'catatan' => 'nullable|string|max:1000',
        ]);

        // Simpan file resep
        $filePath = $request->file('file_resep')->store('resep', 'public');

        // Cari atau buat pelanggan (gunakan pelanggan pertama sebagai demo)
        $pelanggan = Pelanggan::first();

        if (!$pelanggan) {
            // Jika tidak ada pelanggan, buat satu sebagai demo
            $pelanggan = Pelanggan::create([
                'nama' => 'Pelanggan Demo',
                'email' => 'demo@sipa.co.id',
                'password' => bcrypt('password'),
                'no_telp' => '081234567890',
                'alamat' => 'Jakarta Selatan',
            ]);
        }

        Resep::create([
            'pelanggan_id' => $pelanggan->id,
            'file_resep' => $filePath,
            'status' => 'Menunggu Verifikasi',
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('upload-resep')->with('success', 'Resep berhasil diunggah! Tim apoteker kami akan memverifikasi dalam 15-30 menit.');
    }
}
