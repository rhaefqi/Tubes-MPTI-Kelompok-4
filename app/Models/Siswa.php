<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // protected $table = 'siswas';

    protected $primaryKey = 'nisn';
    protected $keyType = 'string';
    protected $fillable = ['nisn', 'user_id', 'nama', 'jenis_kelamin', 'tingkat', 'kelas'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function absen()
    {
        return $this->hasMany(AbsensiSiswa::class, 'nisn', 'nisn');
    }
}
