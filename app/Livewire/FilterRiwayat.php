<?php

namespace App\Livewire;

use App\Models\PeminjamanGuru;
use App\Models\PeminjamanSiswa;
use Carbon\Carbon;
use Livewire\Component;

class FilterRiwayat extends Component
{
    public $from;
    public $until;
    public $riwayats;

    protected $listeners = ['filterRiwayat' => 'filterRiwayat'];

    public function mount() {
        $this->from = '';
        $this->until = Carbon::now()->toDateString();
        $this->fetchRiwayat();
    }

    public function updatedFrom() {
        $this->filterRiwayat();
    }

    public function updatedUntil() {
        $this->filterRiwayat();
    }

    public function fetchRiwayat() {
        $user = auth()->user();
        if($user->status == 'siswa'){
            $query = PeminjamanSiswa::where('nisn', $user->siswa->nisn);
        } else {
            $query = PeminjamanGuru::where('nip', $user->guru->nip);
        }
        
        if ($this->from && $this->until) {
            $query->whereBetween('tanggal_pinjam', [$this->from, $this->until]);
        }

        $this->riwayats = $query->orderBy('tanggal_pinjam')->get();
    }

    public function filterRiwayat() {
        $this->fetchRiwayat();
    }

    public function render()
    {
        return view('livewire.filter-riwayat');
    }
}
