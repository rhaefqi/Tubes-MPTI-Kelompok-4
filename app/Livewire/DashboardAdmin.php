<?php

namespace App\Livewire;

use App\Models\Guru;
use App\Models\Petugas;
use App\Models\Siswa;
use Livewire\Component;

class DashboardAdmin extends Component
{
    public $total_petugas;
    public $total_siswa;
    public $total_guru;

    public function mount(){
        $this->total_petugas = Petugas::count();
        $this->total_siswa = Siswa::count();
        $this->total_guru = Guru::count();
    }
    public function render()
    {
        return view('livewire.dashboard-admin');
    }
}
