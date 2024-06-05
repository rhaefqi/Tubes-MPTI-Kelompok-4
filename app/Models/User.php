<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $connection = 'mysql';
    
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'no_hp',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function petugas(){
        return $this->hasOne(Petugas::class);
    }
    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }

    public function guru()
    {
        return $this->hasOne(Guru::class);
    }

    public function pinjam_siswa()
    {
        return $this->hasMany(PeminjamanSiswa::class);
    }

    public function pinjam_guru()
    {
        return $this->hasMany(PeminjamanGuru::class);
    }
}
