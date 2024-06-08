<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index (){
        return view('pegawai.pegawai-home');   
    }

    public function peminjaman (){
        return view('pegawai.kelola-peminjaman');   
    }
    public function absensi (){
        return view('pegawai.absensi');   
    }

    public function showBuku (){
        return view('pegawai.kelola-buku');
    }

    public function showSubjek (){  
        return view('pegawai.kelola-subjek');
    }
    public function showKelas (){  
        return view('pegawai.kelola-kelas');   
    }
    public function showRiwayat (){  
        return view('pegawai.kelola-riwayat');   
    }

    
}
