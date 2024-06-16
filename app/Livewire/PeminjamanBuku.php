<?php

namespace App\Livewire;

use App\Models\Buku;
use Livewire\Component;

class PeminjamanBuku extends Component
{
    public $bukuId;
    public $bukus;
    public $detail;
    public $tampilDetail = false;
    public $bukuAda = false;
    public $namaBuku = false;


    public $bukuPinjam;
    public $number = [];

    public function tutupDetail(){
        $this->tampilDetail = false;
    }

    public function mount()
    {
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
        dd($this->bukuPinjam);
        $this->detail = Buku::where('id',$buku->id)->first();
        $this->tampilDetail = true;
        // $this->dispatch('tutup-detail');
    }

    public function tutupBukuAda(){
        $this->bukuAda = false;
    }

    public function tambahBuku($id){
        $buku = Buku::where('id', $id)->first();

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
    
    }

    public function hapusBuku($id){
        // $i = 1;
        foreach ($this->bukuPinjam as $key => $bukup) {
            if ($bukup->id == $id) {
                // dump($key);
                unset($this->bukuPinjam[$key]);
                $this->number[$bukup->id] = 0;
                break;
            }
            // $i++;
        }
    }

    public function pinjamBuku(){
        $kosong = true;
        foreach ($this->number as $value) {
            if ($value !== 0) {
                $kosong = false;
                break;
            }
        }
        if (count($this->bukuPinjam) == 0 || $kosong) {
            return;
        }
        dd($this->bukuPinjam);
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
