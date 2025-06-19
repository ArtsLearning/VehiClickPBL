<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $fillable = [
        'nama', 'email', 'pickup_method',
        'provinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'kodepos',
        'alamat_detail', 'tanggal_mulai', 'tanggal_selesai',
        'durasi', 'total_harga', 'nama_kendaraan'
    ];
    


 
}