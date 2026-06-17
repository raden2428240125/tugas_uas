<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        
        $request->user()->name = $validated['name'];
        $request->user()->email = $validated['email'];

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        // Sync to Pelanggans table
        $pelanggan = \App\Models\Pelanggan::where('email', $request->user()->email)->first();
        if ($pelanggan) {
            $pelanggan->nama = $validated['name'];
            if (isset($validated['no_telp'])) {
                $pelanggan->no_telp = $validated['no_telp'];
            }
            if (isset($validated['alamat'])) {
                $pelanggan->alamat = $validated['alamat'];
            }
            $pelanggan->save();
        } else {
            \App\Models\Pelanggan::create([
                'nama' => $validated['name'],
                'email' => $validated['email'],
                'password' => $request->user()->password,
                'no_telp' => $validated['no_telp'] ?? '-',
                'alamat' => $validated['alamat'] ?? 'Belum ada alamat',
            ]);
        }

        // Handle Photo Upload
        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $fileName = 'user_' . $request->user()->id . '.jpg';
            
            // Create directory if not exists
            if (!file_exists(public_path('profiles'))) {
                mkdir(public_path('profiles'), 0755, true);
            }
            
            // Move file to public/profiles
            $file->move(public_path('profiles'), $fileName);
        }

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}


