<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $table = 'pemesanans';
    
    protected $fillable = ['user_id', 'kode_order', 'total', 'status'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getAlamatAttribute(): string
    {
        $parts = array_filter([
            $this->alamat_detail,
            $this->kelurahan,
            $this->kecamatan,
            $this->kabupaten,
            $this->provinsi,
            $this->kodepos,
        ]);

        return implode(', ', $parts);
    }
}
