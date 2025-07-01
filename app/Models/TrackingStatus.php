<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackingStatus extends Model
{
    use HasFactory;
    
    /**
     * Nama tabel yang terhubung dengan model ini.
     */
    protected $table = 'tracking_status';

    /**
     * Menonaktifkan kolom updated_at bawaan Laravel karena kita tidak membutuhkannya.
     */
    public $timestamps = false;
    
    /**
     * Kolom yang boleh diisi secara massal.
     */
    protected $fillable = [
        'pesanan_id',
        'deskripsi',
    ];
}