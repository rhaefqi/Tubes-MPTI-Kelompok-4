<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;

class CreateAbsensi extends Component
{
    public $nisn_nip;
    public $status;
    public $nama;
    public $absens;
    public $fix = true;

    public function mount()
    {
        $this->absens = $this->getAbsens();
    }

    public function updatedNama($value)
    {
        $this->fix = true;
        $this->absens = $this->getAbsens();
    }

    #[Computed()]
    public function getAbsens()
    {
        if ($this->fix) {
            if ($this->nama) {
                return DB::table('view_absensi')
                    ->where('nama', 'like', '%' . $this->nama . '%')
                    ->orderBy('tanggal')
                    ->get();
            } else {
                return DB::table('view_absensi')->orderBy('tanggal')->get();
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

    public function render()
    {
        return view('livewire.create-absensi', ['absens' => $this->absens]);
    }
}
