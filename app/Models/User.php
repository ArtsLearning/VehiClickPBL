<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser 
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'telepon',
        'foto_customer',
        'google_id',
        'avatar',
        'foto_sim',
        'status_verifikasi_sim',
        'provinsi',
        'nama_provinsi',
        'kabupaten',
        'nama_kabupaten',
        'kecamatan',
        'nama_kecamatan',
        'kelurahan',
        'nama_kelurahan',
        'kodepos',
        'alamat_detail',
        'status_verifikasi_alamat',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'foto_customer',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getAlamatTerverifikasiAttribute()
    {
        return implode(', ', array_filter([
            $this->alamat_detail,
            $this->kelurahan,
            $this->kecamatan,
            $this->kabupaten,
            $this->provinsi,
            $this->kodepos
        ]));
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->role === 'admin';
    }
}
