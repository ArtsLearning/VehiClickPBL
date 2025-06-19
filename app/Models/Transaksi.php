<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Barang;
use App\Models\User;

class Transaksi extends Model
{
    use HasFactory;

    // Nama tabel (opsional kalau nama file migration dan tabel cocok)
    protected $table = 'transaksis';

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'user_id',
        'kendaraan_id',
        'tanggal_sewa',
        'durasi_hari',
        'status',
        'total_harga',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Kendaraan
    public function barang()
    {
        return $this->belongsTo(barang::class, 'kendaraan_id');
    }
}
