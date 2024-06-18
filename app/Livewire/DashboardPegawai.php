<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DashboardPegawai extends Component
{
    public $total_buku;
    public $total_pinjam;
    public $total_pengunjung;
    public function mount()
    {
       $this->total_buku = Buku::count(); 
       $bulan = Carbon::now()->month;
       $this->total_pinjam = DB::table('view_peminjaman')->whereMonth('tanggal_pinjam', $bulan)->count();
       $this->total_pengunjung = DB::table('view_absensi')->whereMonth('tanggal', $bulan)->count(); 
    //    dd(  $this->total_buku, $this->total_pinjam, $this->total_pengunjung);
    }
    public function render()
    {
        return view('livewire.dashboard-pegawai');
    }
}
