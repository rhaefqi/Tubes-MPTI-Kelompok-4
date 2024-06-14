<?php

namespace App\Livewire;

use App\Models\Siswa;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;

class TabelSiswa extends Component
{
    #[On('siswa-created')]
    public function updateList($petugas = null){

    }

    #[Computed()]
    public function siswas(){
        return Siswa::latest()->paginate(20);
    }
    public function render()
    {
        return view('livewire.tabel-siswa');
    }
}
