<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

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

    /* Verifikasi SIM */
    public function verifikasiSim(Request $request): RedirectResponse
    {
        $request->validate([
            'foto_sim' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = $request->user();

        // Upload foto SIM
        if ($request->hasFile('foto_sim')) {
            $simPath = $request->file('foto_sim')->store('verifikasi/sim', 'public');
            $user->foto_sim = $simPath;
        }

        // Set status ke "menunggu"
        $user->status_verifikasi_sim = 'menunggu';
        $user->save();

        return back()->with('status', 'verifikasi-sim-success');
    }

    /* ✅ Verifikasi Alamat */
    public function verifikasiAlamat(Request $request): RedirectResponse
    {
        $request->validate([
            'provinsi' => 'required|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'kodepos' => 'required|string',
            'alamat_detail' => 'required|string',
            'nama_provinsi' => 'required|string',
            'nama_kabupaten' => 'required|string',
            'nama_kecamatan' => 'required|string',
            'nama_kelurahan' => 'required|string',
        ]);

        $user = $request->user();

        // Simpan ID wilayah
        $user->provinsi = $request->provinsi;
        $user->kabupaten = $request->kabupaten;
        $user->kecamatan = $request->kecamatan;
        $user->kelurahan = $request->kelurahan;
        $user->kodepos = $request->kodepos;
        $user->alamat_detail = $request->alamat_detail;

        // Simpan nama wilayah dari input hidden (BUKAN ambil ulang dari API)
        $user->nama_provinsi = $request->nama_provinsi;
        $user->nama_kabupaten = $request->nama_kabupaten;
        $user->nama_kecamatan = $request->nama_kecamatan;
        $user->nama_kelurahan = $request->nama_kelurahan;

        // Set status verifikasi
        $user->status_verifikasi_alamat = 'menunggu';
        $user->save();

        return back()->with('status', 'verifikasi-alamat-success');
    }

}
