<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ulasan extends Model
{
    use HasFactory;

    /**
     * Menentukan nama tabel yang terhubung dengan model ini.
     *
     * @var string
     */
    protected $table = 'ulasan';

    /**
     * Kolom yang dapat diisi secara massal (mass assignable).
     *
     * @var array
     */
    protected $fillable = [
        'id_user',
        'id_produk',
        'id_pesanan',
        'rating',
        'komentar',
    ];

    /**
     * Mendefinisikan relasi "belongsTo" ke model User.
     * Satu ulasan dimiliki oleh satu user.
     */
    public function user(): BelongsTo
    {
        // Pastikan foreign key 'id_user' dan primary key di tabel users 'id' sudah benar.
        return $this->belongsTo(User::class, 'id_user');
    }

    /**
     * Mendefinisikan relasi "belongsTo" ke model Produk.
     * (Asumsi Anda memiliki model bernama 'Produk')
     */
    public function produk(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'id_produk');
    }

    /**
     * Mendefinisikan relasi "belongsTo" ke model Pesanan.
     * (Asumsi Anda memiliki model bernama 'Pesanan')
     */
    public function pesanan(): BelongsTo
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan');
    }
}