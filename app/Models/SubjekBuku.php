<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjekBuku extends Model
{
    use HasFactory;

    protected $primaryKey = 'subjek';
    protected $keyType = 'string';

    protected $fillable = ['subjek'];

}
