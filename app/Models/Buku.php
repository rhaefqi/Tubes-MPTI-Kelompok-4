<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    // protected $connection = 'mysql';
    use HasFactory;

    // protected $table = 'bukus';

    protected $fillable = ['id'];

    public function pinjam_siswa()
    {
        return $this->hasOne(PeminjamanSiswa::class);
    }

    public function pinjam_guru()
    {
        return $this->hasOne(PeminjamanGuru::class);
    }

}
