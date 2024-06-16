<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiSiswa extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['nisn','tanggal','jam'];

    public function absen()
    {
        return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
    }
}
