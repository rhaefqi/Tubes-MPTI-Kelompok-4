<?php

namespace App\Livewire;

use App\Models\Buku;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\PeminjamanGuru;
use App\Models\PeminjamanSiswa;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;

class PeminjamanBuku extends Component
{

    // modal pinjam start
    public $nisn_nip;
    public $status;
    public $nama;
    public $absens;
    public $konfirmasi;
    public $sudahAbsen = false;
    public $notFound = false;
    public $fix = true;
    // modal pinjam end

    public $alertGagal = false;
    public $pesanAlert;
    public $bukuId;
    public $bukus;
    public $detail;
    public $tampilDetail = false;
    public $bukuAda = false;
    public $namaBuku = false;
    public $peminjam = false;
    public $bukuPinjam;
    public $number = [];
    public $pinjam = false;

    
    //modal peminjam start
        public function updatedNama($value)
        {
            $this->fix = true;
            $this->absens = $this->getAbsens();
            $this->nisn_nip = '';
        }
        public function updatedStatus($value)
        {
            $this->fix = true;
            $this->absens = $this->getAbsens();
        }

        #[Computed()]
        public function getAbsens()
        {
            if ($this->fix) {
                if($this->status == 'siswa'){
                    $hasil = DB::table('view_guru_siswa')
                            ->where('nama', 'like', '%' . $this->nama . '%')
                            ->where('status', '=', 'siswa')
                            ->get();
                }elseif($this->status == 'guru'){
                    // dd("ahh");
                    $hasil = DB::table('view_guru_siswa')
                        ->where('nama', 'like', '%' . $this->nama . '%')
                        ->where('status', '=', 'guru')
                        ->get();
                    
                }else{
                    $hasil = DB::table('view_guru_siswa')
                            ->where('nama', 'like', '%' . $this->nama . '%')
                            ->get();
                }
                if ($hasil->isEmpty()) {
                    // $this->nama = '';
                    $this->nisn_nip = '';
                }else{
                    return $hasil;
                }    
            }

            return collect([]);
        }

        public function pilih($nisn_nip, $nama, $status){
            // dd($status);
            $this->fix = false;
            $this->absens = $this->getAbsens();
            $this->nama = $nama;
            $this->nisn_nip = $nisn_nip;
            $this->status = $status;
            // dd($nisn_nip);
        }

        public function batalCreate(){
            if ($this->status != null || 
            $this->nama != null || 
            $this->nisn_nip != null) {
                $this->konfirmasi = true;
            }else{
                // dd("ahh");
                $this->pinjam = false;
                $this->dispatch('close-input');
                $this->reset('nisn_nip', 'nama', 'status');
                $this->resetValidation();
            }   
        }
        public function afterConfirm($temp){
            // dd($temp);
            if ($temp == 'hapus') {
                $this->dispatch('close-input');
                $this->reset('nisn_nip', 'nama', 'status');
                $this->resetValidation();
                $this->konfirmasi = false;
                $this->pinjam = false;
            }else{
                $this->konfirmasi = false;
            }
        }

        public function createPinjaman(){
            if ($this->status == 'siswa') {
                $buku_ids = array_keys($this->number);
                $pesan = [];
                $dataPinjaman = PeminjamanSiswa::where('nisn', $this->nisn_nip)->where('status', 'dipinjam')->whereIn('buku_id', $buku_ids)->get();
                foreach($dataPinjaman as $pinjam){
                    $buku = Buku::where('id', $pinjam->buku_id)->first();
                    // $buku->decrement('jumlah_tersedia', 1);
                    // $buku->decrement('jumlah_tersedia', $this->number[$pinjam->buku_id]);
                    $pesan[] = $buku->judul;
                }
                $pesanString = implode(', ', $pesan);
                
                if($dataPinjaman->count() > 0){
                    $this->alertGagal = true;
                    $this->pesanAlert = "Buku " . $pesanString . " sudah dipinjam oleh peminjam";
                    return;
                }
                DB::beginTransaction();
                try {
                    foreach($this->number as $buku_ids => $value){
                        // dd($buku_ids, $value);
                        PeminjamanSiswa::create([
                            'nisn' => $this->nisn_nip,
                            'buku_id' => $buku_ids,
                            'jumlah_dipinjam' => $value,
                            'status' => 'dipinjam',
                            'tanggal_pinjam' => date('Y-m-d')
                        ]);
                        $buku = Buku::where('id', $buku_ids)->first();
                        $buku->decrement('jumlah_tersedia', $value);
                    }
                    DB::commit();
                    $this->reset( 'pinjam', 'nisn_nip', 'nama', 'status');
                    $this->bukuPinjam = [];
                    $this->number = [];
                    $this->pinjam = false;
                    $this->dispatch('berhasil-pinjam');

                }catch (\Throwable $e) {
                    dd($e);
                    DB::rollBack();
                }
                

                // $this->emit('createPinjaman', $this->nisn_nip, $this->nama, $this->status);
                // $this->emit('createPinjaman', $this->nisn_nip, $this->nama, $this->status);
            }elseif($this->status == 'guru'){
                $buku_ids = array_keys($this->number);
                $pesan = [];
                $dataPinjaman = PeminjamanGuru::where('nip', $this->nisn_nip)->where('status', 'dipinjam')->whereIn('buku_id', $buku_ids)->get();
                foreach($dataPinjaman as $pinjam){
                    $buku = Buku::where('id', $pinjam->buku_id)->first();
                    // $buku->decrement('jumlah_tersedia', $this->number[$pinjam->buku_id]);
                    $pesan[] = $buku->judul;
                }
                $pesanString = implode(', ', $pesan);
                
                if($dataPinjaman->count() > 0){
                    $this->alertGagal = true;
                    $this->pesanAlert = "Buku " . $pesanString . " sudah dipinjam oleh peminjam";
                    return;
                }

                DB::beginTransaction();
                try {
                    foreach($this->number as $buku_ids => $value){
                        // dd($buku_ids, $value);
                        PeminjamanGuru::create([
                            'nip' => $this->nisn_nip,
                            'buku_id' => $buku_ids,
                            'jumlah_dipinjam' => $value,
                            'status' => 'dipinjam',
                            'tanggal_pinjam' => date('Y-m-d')
                        ]);
                        $buku = Buku::where('id', $buku_ids)->first();
                        $buku->decrement('jumlah_tersedia', $value);
                    }
                    DB::commit();
                    $this->reset( 'pinjam', 'nisn_nip', 'nama', 'status');
                    $this->bukuPinjam = [];
                    $this->number = [];
                    $this->pinjam = false;
                    $this->dispatch('berhasil-pinjam');
                }catch (\Throwable $e) {
                    dd($e);
                    DB::rollBack();
                }
                // $this->reset( 'pinjam', 'nisn_nip', 'nama', 'status');
                // $this->bukuPinjam = [];
                // $this->number = [];
                // $this->pinjam = false;
                // $this->dispatch('berhasil-pinjam');
            }
        }
    //modal peminjam end

    public function tutupAlert(){
        $this->alertGagal = false;
    }
    
    public function tutupDetail(){
        $this->tampilDetail = false;
    }

    #[On('berhasil-pinjam')]
    public function berhasilPinjam(){
        $this->dispatch('success', ['pesan' => 'Buku berhasil dipinjam!']);
        $this->bukus = Buku::all();
    }


    public function mount()
    {
        $this->absens = $this->getAbsens();
        $this->bukuPinjam = [];
        $this->bukus = Buku::all();
        // $this->detail = Buku::all();
        // for ($i=1; $i <= 5; $i++) { 

        //     $this->number[$i] = 0;
        //     // if (!isset($this->number[$i])) {
        //     // }
        //     // $this->number[$i] += $i;
        // }
    }

    public function detailBuku(Buku $buku)
    {
        // dd($this->bukuPinjam);
        $this->detail = Buku::where('id',$buku->id)->first();
        $this->tampilDetail = true;
        // $this->dispatch('tutup-detail');
    }

    public function tutupBukuAda(){
        $this->bukuAda = false;
    }

    public function tambahBuku($id){
        $buku = Buku::where('id', $id)->first();
        
        if (count($this->number) >= 5) {
            return;
        }

        if (!$buku) {
            return;
        }
    
        foreach ($this->bukuPinjam as $bukup) {
            if ($bukup->id == $buku->id) {
                $this->bukuAda = true;
                break;
            }
        }

        if (!$this->bukuAda) {
            $this->bukuPinjam[] = $buku;
            $this->number[$buku->id] = 0;
        }
        
        // dump();
    }

    public function hapusBuku($id){
        // $i = 1;
        foreach ($this->bukuPinjam as $key => $bukup) {
            if ($bukup->id == $id) {
                // dump($key);
                unset($this->bukuPinjam[$key]);
                unset($this->number[$bukup->id]);
                break;
            }
            // $i++;
        }
    }

    public function pinjamBuku(){
        $kosong = true;
        foreach ($this->number as $value) {
            if ($value == 0) {
                // dd("kosong");
                // dd("ahh");
                $kosong = false;
                break;
            }
        }
        
        if (count($this->bukuPinjam) == 0) {
            return;
        }
        if (!$kosong) {
            return;
        }

        // dd('masuk');
        $this->pinjam = true;

        // dd($this->bukuPinjam);
    }

    public function counter($status, $buku_id){
        $buku = Buku::where('id', $buku_id)->first();
        if ($status == 'tambah') {
            if (!($buku->jumlah_tersedia <= $this->number[$buku_id])) {
                $this->number[$buku_id] += 1;
            }
        } else {
            if (!$this->number[$buku_id] == 0) {
                $this->number[$buku_id] -= 1;
            }
        }
        // dd($status, $urutan, $this->number);
    }
    public function render()
    {
        return view('livewire.peminjaman-buku');
    }
}
