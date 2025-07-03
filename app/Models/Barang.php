<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    protected $fillable = [
        'nama_barang', 'kategori', 'stok', 'rating', 'deskripsi',
        'kapasitas', 'nomor_plat', 'harga_barang', 'foto_barang'
    ];
    
    use HasFactory;
    protected $table = 'barangs';
    protected $guarded = [];
}