<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $fillable = [
        'user_id', 'kendaraan_id', 'tanggal_mulai', 'tanggal_selesai', 
        'total_harga', 'status', 'catatan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(DetailPemesanan::class);
    }
}