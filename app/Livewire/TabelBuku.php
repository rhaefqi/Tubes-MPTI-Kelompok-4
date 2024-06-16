<?php

namespace App\Livewire;

use App\Models\Buku;
use Livewire\Attributes\On;
use Livewire\Component;

class TabelBuku extends Component
{   
    // public Buku $buku_detail;
    public $bukuId;
    public $bukus;
    public $detail;
    public $tampilDetail = false;

    public function tutupDetail(){
        $this->tampilDetail = false;
    }

    public function mount()
    {
        $this->bukus = Buku::all();
        // $this->detail = Buku::all();
    }

    public function detailBuku(Buku $buku)
    {
        $this->detail = Buku::where('id',$buku->id)->first();
        $this->tampilDetail = true;
        // $this->dispatch('tutup-detail');
    }

    public function render()
    {
        return view('livewire.tabel-buku');
    }
}
