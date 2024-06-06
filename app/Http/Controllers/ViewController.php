<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\PeminjamanGuru;
use App\Models\PeminjamanSiswa;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDO;

class ViewController extends Controller
{
    public function showHome(){

        if(auth()->user()->status == 'siswa'){
            $pinjam = PeminjamanSiswa::where('nisn', auth()->user()->siswa->nisn)->count();
            $daftarPinjams = PeminjamanSiswa::where('nisn', auth()->user()->siswa->nisn)
                ->whereNull('tanggal_kembali')
                ->get();

        } else {
            $pinjam = PeminjamanGuru::where('nip', auth()->user()->guru->nip)->count();
            $daftarPinjams = PeminjamanGuru::where('nip', auth()->user()->guru->nip)
                ->whereNull('tanggal_kembali')
                ->get();
        }

        $barus = Buku::orderBy('created_at')->get(); 

        return view('siswa.home', compact('pinjam', 'daftarPinjams', 'barus'));
    }

    public function showBuku(){

        $bukus = Buku::select('id','judul', 'penulis', 'sampul_buku', 'jumlah_tersedia')
                        ->get();

        return view('siswa.buku', compact('bukus'));
    }

    public function detailBuku(Request $request, $id){


        $pinjamans = PeminjamanSiswa::select('tanggal_pinjam')->where('buku_id', $id)->get();
        $buku = Buku::where('id', $id)
                        ->first();


        Carbon::setLocale('id');
        $tanggal = [];
        foreach($pinjamans as $pinjam){
            $format = Carbon::createFromFormat('Y-m-d', $pinjam->tanggal_pinjam);
            $format->addDays(5);
            $tanggal[] = $format->translatedFormat('d F Y');
        };
        // dd($tanggal);
                        // dd($pinjaman[0]->tanggal_pinjam);

        return view('siswa.detail-buku', compact('buku', 'tanggal'));
    }

    public function showProfile(){
        
        if(auth()->user()->status == 'siswa'){
            $riwayats = PeminjamanSiswa::where('nisn', auth()->user()->siswa->nisn)->orderBy('tanggal_pinjam')->get();
        } else {
            $riwayats = PeminjamanGuru::where('nip', auth()->user()->guru->nip)->orderBy('tanggal_pinjam')->get();
        }

        return view('siswa.profile', compact('riwayats'));
    }

    public function showEditProfile(){
        return view('siswa.edit-profile');
    }

    public function showKelolaSandi(){
        return view('siswa.ubah-sandi');
    }
}