<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiGuru extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['nip','tanggal','jam'];

    public function absen()
    {
        return $this->belongsTo(Guru::class, 'nip', 'nip');
    }
}
