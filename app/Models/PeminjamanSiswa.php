<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanSiswa extends Model
{
    use HasFactory;
    
    protected $fillable = ['nisn','buku_id','jumlah_dipinjam','status','tanggal_pinjam','tanggal_kembali'];

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
