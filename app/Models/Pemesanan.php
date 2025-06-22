<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $fillable = [
        'nama', 'email', 'pickup_method',
        'provinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'kodepos',
        'alamat_detail', 'tanggal_mulai', 'tanggal_selesai',
        'durasi', 'total_harga', 'nama_kendaraan', 'status'
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    const STATUS_PENDING = 'pending';
    const STATUS_PROCESS = 'process';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELED = 'canceled';
    

 
}