<?php

namespace App\Livewire;

use App\Models\Kelas;
use Livewire\Component;

class EditSiswa extends Component
{
    // public $kelas_siswa;
    public function render()
    {
        // $this->kelas_siswa = Kelas::all();
        return view('livewire.edit-siswa');
    }
}
