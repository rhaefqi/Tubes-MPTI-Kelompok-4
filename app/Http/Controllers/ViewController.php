<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\PeminjamanGuru;
use App\Models\PeminjamanSiswa;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

class ViewController extends Controller
{   
    public function showLanding(){
        $bukus = Buku::orderBy('created_at')->limit(5)->get();

        $results = DB::table('view_absensi')
            ->select('nama', 'photo_profile', DB::raw('COUNT(nisn_nip) as jumlah'))
            ->whereMonth('tanggal', Carbon::now()->month)
            ->whereYear('tanggal', Carbon::now()->year)
            ->groupBy('nama', 'photo_profile', 'nisn_nip')
            ->orderBy('jumlah', 'desc')
            ->limit(3)
            ->get();

        return view('landingpage', compact('bukus', 'results'));
        
    }
    public function showHome(){

        if(auth()->user()->status == 'siswa'){
            // dd(auth()->user());
            $pinjam = PeminjamanSiswa::where('nisn', auth()->user()->siswa->nisn)->count();
        }elseif(auth()->user()->status == 'guru'){ 
            $pinjam = PeminjamanGuru::where('nip', auth()->user()->guru->nip)->count();
        }else{
            $pinjam = 0;
        }

        $barus = Buku::orderBy('created_at')->get();
        
        if(auth()->user()->status == 'siswa'){
            $kunjung = DB::table('view_absensi')->where('nisn_nip', auth()->user()->siswa->nisn)->count();
        } else {
            $kunjung = DB::table('view_absensi')->where('nisn_nip', auth()->user()->guru->nip)->count();
        }

        return view('siswa.home', compact('pinjam', 'barus', 'kunjung'));
    }

    public function showBuku(){

        // $bukus = Buku::select('id','judul', 'penulis', 'sampul_buku', 'jumlah_tersedia')
        //                 ->get();

        return view('siswa.buku');
    }

    public function detailBuku(Request $request, $id){
        $targetPage = '/detail-buku/' . $id;

        $wasRefreshed = Session::get('wasRefreshed', []);

        // kalo gaada dijalankan
        if (!in_array($targetPage, $wasRefreshed)) {
            $view = Buku::select('view')
                ->where('id', $id)
                ->first()
                ->view;
            $view += 1;
            Buku::where('id', $id)->update(['view' => $view]);

            $wasRefreshed[] = $targetPage;
            Session::put('wasRefreshed', $wasRefreshed);
        }

        $pinjamans = PeminjamanSiswa::select('tanggal_pinjam', 'tanggal_kembali')->where('buku_id', $id)->get();
        $buku = Buku::where('id', $id)
                        ->first();


        Carbon::setLocale('id');
        $tanggal = [];
        $tanggalKembali = [];
        foreach($pinjamans as $pinjam){
            $format = Carbon::createFromFormat('Y-m-d', $pinjam->tanggal_pinjam);
            $format->addDays(5);
            $tanggal[] = $format->translatedFormat('d F Y');
            if ($buku->status == 'dikembalikan') {
                $tanggalKembali = Carbon::createFromFormat('Y-m-d', $pinjam->tanggal_kembali);
            }
        };
        // dd($tanggal);
                        // dd($pinjaman[0]->tanggal_pinjam);

        return view('siswa.detail-buku', compact('buku', 'tanggal', 'tanggalKembali'));
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