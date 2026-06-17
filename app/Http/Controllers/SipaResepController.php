<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class SipaResepController extends Controller
{
    public function create()
    {
        return view('user.upload-resep');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file_resep' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'catatan' => 'nullable|string|max:1000',
        ]);

        // Simpan file resep
        $filePath = $request->file('file_resep')->store('resep', 'public');

        // Cari pelanggan berdasarkan user yang login
        $user = auth()->user();
        $pelanggan = Pelanggan::where('email', $user->email)->first();

        if (!$pelanggan) {
            // Jika belum ada di tabel pelanggan, buat otomatis
            $pelanggan = Pelanggan::create([
                'nama' => $user->name,
                'email' => $user->email,
                'password' => $user->password,
                'no_telp' => '-',
                'alamat' => 'Belum ada alamat',
            ]);
        }

        Resep::create([
            'pelanggan_id' => $pelanggan->id,
            'file_resep' => $filePath,
            'status' => 'Menunggu Verifikasi',
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('user.upload-resep')->with('success', 'Resep berhasil diunggah! Tim apoteker kami akan memverifikasi dalam 15-30 menit.');
    }
}


