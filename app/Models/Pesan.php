<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;  

class Pesan extends Model
{
    use HasFactory;

    protected $table = 'pesan';
    protected $guarded = [];

    protected $fillable = ['email', 'pesan'];
}
