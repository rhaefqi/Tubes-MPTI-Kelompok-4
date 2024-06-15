<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $primaryKey = 'kelas';
    protected $keyType = 'string';
    protected $fillable = ['kelas', 'tingkat', 'wali_kelas'];

    public function wali()
    {
        return $this->belongsTo(Guru::class, 'wali_kelas', 'nip');
    }
}
