<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use App\Models\Pemesanan; // <-- Menggunakan Pemesanan
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_produk'   => 'required|exists:barangs,id',
            'id_pesanan'  => 'required|exists:pemesanans,id',
            'rating'      => 'required|integer|min:1|max:5',
            'komentar'    => 'required|string|max:1000',
        ]);

        $pesanan = Pemesanan::find($validatedData['id_pesanan']);

        // Pastikan pesanan ini milik user yang sedang login
        if ($pesanan->user_id !== Auth::id()) {
            return back()->with('error', 'Anda tidak berhak memberikan ulasan untuk pesanan ini.');
        }

        // Menggunakan const untuk memeriksa status, ini lebih baik
        if ($pesanan->status !== Pemesanan::STATUS_COMPLETED) {
            return back()->with('error', 'Anda hanya bisa memberi ulasan untuk pesanan yang sudah selesai.');
        }

        $ulasanSudahAda = Ulasan::where('id_user', Auth::id())
                                ->where('id_produk', $validatedData['id_produk'])
                                ->where('id_pesanan', $validatedData['id_pesanan'])
                                ->exists();

        if ($ulasanSudahAda) {
            return back()->with('error', 'Anda sudah pernah memberikan ulasan untuk produk ini.');
        }

        Ulasan::create([
            'id_user'    => Auth::id(),
            'id_produk'  => $validatedData['id_produk'],
            'id_pesanan' => $validatedData['id_pesanan'],
            'rating'     => $validatedData['rating'],
            'komentar'   => $validatedData['komentar'],
        ]);

        return back()->with('success', 'Terima kasih! Ulasan Anda berhasil dikirim.');
    }
}