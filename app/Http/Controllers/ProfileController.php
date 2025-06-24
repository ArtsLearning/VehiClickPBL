<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
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
     * Update the user's profile information including photo.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $validated = $request->validated();

        // Isi data dasar
        $user->fill($validated);

        // Reset verifikasi email jika email berubah
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Proses upload foto jika ada
        if ($request->hasFile('foto_customer')) {
            $foto = $request->file('foto_customer');
            $namaFile = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('foto_user', $namaFile, 'public');

            // Hapus foto lama jika ada
            if ($user->foto_customer) {
                Storage::delete('public/foto_user/' . $user->foto_customer);
            }

            // Simpan nama file ke database
            $user->foto_customer = $namaFile;
        }

        // Simpan ke database
        $user->save();

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

    /* Delete Foto Profil */
    public function deletePhoto(Request $request)
    {
        $user = Auth::user();

        if ($user->foto_customer) {
            Storage::disk('public')->delete('foto_user/' . $user->foto_customer);
            $user->foto_customer = null;
            $user->save();
        }

        return redirect()->route('profile.edit')->with('status', 'photo-deleted');
    }

    /* Verifikasi KTP */
    public function verifikasiKtp(Request $request): RedirectResponse
    {
        $request->validate([
            'foto_ktp' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'foto_selfie_ktp' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = $request->user();

        // Upload foto
        if ($request->hasFile('foto_ktp')) {
            $ktpPath = $request->file('foto_ktp')->store('verifikasi/ktp', 'public');
            $user->foto_ktp = $ktpPath;
        }

        if ($request->hasFile('foto_selfie_ktp')) {
            $selfiePath = $request->file('foto_selfie_ktp')->store('verifikasi/selfie_ktp', 'public');
            $user->foto_selfie_ktp = $selfiePath;
        }

        // Set status ke "menunggu"
        $user->status_verifikasi_ktp = 'menunggu';
        $user->save();

        return back()->with('status', 'verifikasi-ktp-success');
    }

}


?>