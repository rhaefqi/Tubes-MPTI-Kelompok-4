<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    // protected $table = 'gurus';

    protected $fillable = ['nip', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
