<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    // protected $table = 'gurus';
    protected $primaryKey = 'nip';
    protected $keyType = 'string';
    protected $fillable = ['nip', 'user_id', 'nama', 'tingkat', 'jenis_kelamin'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function wali()
    {
        return $this->hasOne(Kelas::class);
    }

    public function absen()
    {
        return $this->hasMany(AbsensiGuru::class, 'nip', 'nip');
    }
}
