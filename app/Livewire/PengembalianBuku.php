<?php

namespace App\Livewire;

use App\Models\Buku;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\PeminjamanGuru;
use App\Models\PeminjamanSiswa;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;

class PengembalianBuku extends Component
{
    public $filter_tanggal;
    public $filterStatus;
    public $filterTingkat;
    public $cari;
    public $pengembali;

    public $nis_nip_pinjam;
    public $buku_id_pinjam;
    public $tingkat_pinjam;

    public $status_pinjam;

    public $modalKembalikan = false;
    // public $pinjamans;

    use WithPagination;

    #[On('pinjaman-okeh')]
    public function updateList($pinjaman = null){
    }

    public function mount(){
        $this->pengembali = DB::table('view_peminjaman')->first();
    }

    #[Computed()]
    public function pinjamans(){

        $query = DB::table('view_peminjaman');

        if ($this->filter_tanggal) {
            $query->where('tanggal_pinjam', $this->filter_tanggal);
        }

        if ($this->filterStatus) {
            $query->where('status', $this->filterStatus);
        }

        if ($this->filterTingkat ) {
            $query->where('tingkat', $this->filterTingkat);
        }

        if ($this->cari) {
            $query->where('nama', 'like', '%' . $this->cari . '%');
        }

        $query->orderBy('tanggal_pinjam', 'desc');

        return $query->paginate(10);

    }

    public function kembalikanBuku($nis_nip, $buku_id, $tingkat){
        $this->pengembali = DB::table('view_peminjaman')->where('nisn_nip', $nis_nip)->where('buku_id', $buku_id)->first();
        // dd($nis_nip, $buku_id, $tingkat);
        $this->nis_nip_pinjam = $nis_nip;
        $this->buku_id_pinjam = $buku_id;
        $this->tingkat_pinjam = $tingkat;

        // $status = "guru";
        $this->modalKembalikan = true;

    }

    public function konfirmasiKembalikan($temp){
        // dd($temp);
        if($temp == 'batal'){
            // dd("ahh");
            $this->modalKembalikan = false;
            $this->reset('nis_nip_pinjam', 'buku_id_pinjam', 'tingkat_pinjam');
        }else{
            if ($this->tingkat_pinjam == 'guru') {
                DB::beginTransaction();
                try {
                    $peminjam = PeminjamanGuru::where('nip', $this->nis_nip_pinjam)->where('buku_id', $this->buku_id_pinjam)->where('status','!=', 'dikembalikan')->first();
                    $peminjam->update([
                        'status' => 'dikembalikan',
                    ]);
                    // dd($peminjam->jumlah_dipinjam);
                    $buku = Buku::find($this->buku_id_pinjam);
                    $buku->increment('jumlah_tersedia', $peminjam->jumlah_dipinjam);
                    // dd($buku);
                    $this->modalKembalikan = false;
                    $this->dispatch('success', ['pesan' => 'Buku berhasil dikembalikan!']);
                    $this->reset('nis_nip_pinjam', 'buku_id_pinjam', 'tingkat_pinjam');
                    DB::commit();
                }catch (\Throwable $e) {
                    dd($e);
                    DB::rollBack();
                }
            }else{
                DB::beginTransaction();
                try {
                    $peminjam = PeminjamanSiswa::where('nisn', $this->nis_nip_pinjam)->where('buku_id', $this->buku_id_pinjam)->where('status','!=', 'dikembalikan')->first();
                    $peminjam->update([
                        'status' => 'dikembalikan',
                    ]);
                    // dd($peminjam->jumlah_dipinjam);
                    $buku = Buku::find($this->buku_id_pinjam);
                    $buku->increment('jumlah_tersedia', $peminjam->jumlah_dipinjam);
                    // dd($buku);
                    $this->modalKembalikan = false;
                    $this->dispatch('success', ['pesan' => 'Buku berhasil dikembalikan!']);
                    $this->reset('nis_nip_pinjam', 'buku_id_pinjam', 'tingkat_pinjam');
                    DB::commit();
                }catch (\Throwable $e) {
                    dd($e);
                    DB::rollBack();
                }
            }
        }
    }
    
    public function render()
    {
        
        
        // Perbandingan
        
        //mengubah status
        $counts = DB::table('view_peminjaman')->get();
        $currentDate = Carbon::now()->toDateString();
        foreach ($counts as $count) {
            // dd(Carbon::now());
            $dateRaw = $count->tanggal_pinjam;
            $date = Carbon::parse($dateRaw)->toDateString();
            
            if ($date < $currentDate) {
                // return "Tanggal $dateFromDatabase lebih lama dari tanggal sekarang.";
                if($count->tingkat == 'guru'){
                    PeminjamanGuru::where('nip', $count->nisn_nip)->where('buku_id', $count->buku_id)->where('tanggal_pinjam', $count->tanggal_pinjam)->update([
                        'status' => 'lewat_tenggat'
                    ]);
                }else{
                    PeminjamanSiswa::where('nisn', $count->nisn_nip)->where('buku_id', $count->buku_id)->where('tanggal_pinjam', $count->tanggal_pinjam)->update([
                        'status' => 'lewat_tenggat'
                    ]);
                }
                // dd('sebelum');
            }

        }
        $this->status_pinjam = auth()->user()->status;

        if(isset(request()->components)){
            if(request()->components[0]['updates']){
                $this->resetPage();
            }
        }
        return view('livewire.pengembalian-buku');
    }
}
