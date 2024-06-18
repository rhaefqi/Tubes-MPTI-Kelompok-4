<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\User;
use App\Models\Petugas;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DashboardKepsek extends Component
{
    public $total_buku;
    public $total_user;
    public $total_petugas;
    public $total_staff;
    public $buku_best;
    public $pengunjung_best;

    public function mount(){
        $this->total_buku = Buku::count(); 
        $this->total_user = User::where('id', '!=', '1')->whereIn('status', ['guru','siswa'])->count();
        $this->total_petugas = Petugas::count();
        $this->total_staff = User::where('id', '!=', '1')->where('status', 'staff')->count();
        $this->buku_best = Buku::orderBy('view', 'desc')->take(3)->get();
        $this->pengunjung_best = DB::table('view_absensi')
                                ->select('nama', 'photo_profile', DB::raw('COUNT(nisn_nip) as jumlah'))
                                ->whereMonth('tanggal', Carbon::now()->month)
                                ->whereYear('tanggal', Carbon::now()->year)
                                ->groupBy('nama', 'photo_profile', 'nisn_nip')
                                ->orderBy('jumlah', 'desc')
                                ->limit(3)
                                ->get();

    }
    public function render()
    {
        return view('livewire.dashboard-kepsek');
    }
}
