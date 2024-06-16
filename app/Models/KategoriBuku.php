<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBuku extends Model
{
    use HasFactory;

    protected $primaryKey = 'kategori';
    protected $keyType = 'string';
    protected $fillable = ['kategori'];
}
