<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class ViewController extends Controller
{
    public function showHome(){
        return view('siswa.home');
    }

    public function showBuku(){
        return view('siswa.buku');
    }

    public function showDetailBuku(){
        return view('siswa.detail-buku');
    }

    public function showProfile(){
        return view('siswa.profile');
    }

    public function showEditProfile(){
        return view('siswa.edit-profile');
    }

    public function showKelolaSandi(){
        return view('siswa.ubah-sandi');
    }
}