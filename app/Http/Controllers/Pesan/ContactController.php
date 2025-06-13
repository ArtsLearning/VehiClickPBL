<?php

namespace App\Http\Controllers\Pesan;

use Illuminate\Http\Request;
use App\Models\Pesan;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'pesan' => 'required|min:5'
        ]);

        Pesan::create([
            'email' => $request->email,
            'pesan' => $request->pesan
        ]);

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }
}
?>
