<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    // protected $connection = 'mysql';
    use HasFactory;

    // protected $table = 'bukus';

    protected $fillable = ['id', 'no_seri', 'isbn', 'judul', 'jumlah_tersedia', 'deskripsi', 'penulis', 'penerbit', 'tahun_terbit', 'kategori', 'subjek', 'kelas', 'sampul_buku'];

    public function pinjam_siswa()
    {
        return $this->hasOne(PeminjamanSiswa::class);
    }

    public function pinjam_guru()
    {
        return $this->hasOne(PeminjamanGuru::class);
    }

}
