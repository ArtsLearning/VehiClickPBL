<?php

namespace App\Http\Controllers;

use App\Models\TrackingStatus;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function getHistory($id)
    {
        // Ambil semua riwayat untuk pesanan_id yang diminta
        $history = TrackingStatus::where('pesanan_id', $id)
                                ->orderBy('created_at', 'desc') // Urutkan dari yang terbaru
                                ->get();

        // Kembalikan data sebagai JSON
        return response()->json($history);
    }
}