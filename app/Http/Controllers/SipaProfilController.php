<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Resep;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class SipaProfilController extends Controller
{
    public function index()
    {
        // Ambil data user yang sedang login
        $user = \Illuminate\Support\Facades\Auth::user();
        
        // Coba cari pelanggan berdasarkan email user, atau gunakan user langsung untuk profil dasar
        $pelanggan = null;
        if ($user) {
            $pelanggan = Pelanggan::where('email', $user->email)->first();
            
            // Jika belum ada di tabel pelanggan, kita buat object dummy berisi data dari User
            if (!$pelanggan) {
                $pelanggan = new Pelanggan();
                $pelanggan->nama = $user->name;
                $pelanggan->email = $user->email;
                $pelanggan->no_telp = '-';
                $pelanggan->alamat = 'Belum ada alamat';
                $pelanggan->created_at = $user->created_at;
            } else {
                // Update nama agar tersinkron jika user baru mengubah namanya di auth
                $pelanggan->nama = $user->name;
            }
        } else {
            // Fallback jika belum login (mode public)
            $pelanggan = Pelanggan::first();
        }

        $totalResepAktif = Resep::where('status', 'Menunggu Verifikasi')->count();
        $totalPesanan = Pesanan::count();

        // Load preferences
        $userId = $user ? $user->id : 1;
        $prefsFile = storage_path('app/preferences_user_' . $userId . '.json');
        $preferences = ['notif_pesanan' => true, 'notif_obat' => false]; // default
        
        if (file_exists($prefsFile)) {
            $preferences = json_decode(file_get_contents($prefsFile), true);
        }

        return view('user.profil', compact('pelanggan', 'totalResepAktif', 'totalPesanan', 'preferences'));
    }

    public function updatePreferences(Request $request)
    {
        $userId = auth()->id() ?? 1;
        $prefsFile = storage_path('app/preferences_user_' . $userId . '.json');
        
        $currentPrefs = ['notif_pesanan' => true, 'notif_obat' => false];
        if (file_exists($prefsFile)) {
            $currentPrefs = json_decode(file_get_contents($prefsFile), true);
        }

        if ($request->has('notif_pesanan')) {
            $currentPrefs['notif_pesanan'] = filter_var($request->notif_pesanan, FILTER_VALIDATE_BOOLEAN);
        }
        
        if ($request->has('notif_obat')) {
            $currentPrefs['notif_obat'] = filter_var($request->notif_obat, FILTER_VALIDATE_BOOLEAN);
        }

        file_put_contents($prefsFile, json_encode($currentPrefs));

        return response()->json(['success' => true, 'preferences' => $currentPrefs]);
    }

    public function updateAlamat(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string',
        ]);

        $user = auth()->user();
        if ($user) {
            $pelanggan = Pelanggan::where('email', $user->email)->first();
            if ($pelanggan) {
                $pelanggan->alamat = $request->alamat;
                $pelanggan->save();
            } else {
                Pelanggan::create([
                    'nama' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'no_telp' => '-',
                    'alamat' => $request->alamat,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Alamat berhasil diperbarui!');
    }
}


