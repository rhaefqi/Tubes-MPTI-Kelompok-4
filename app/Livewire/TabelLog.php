<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LogPeminjaman;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class TabelLog extends Component
{
    use WithPagination;
    // public $logs;

    // public function mount(){
    //     // $this->logs = LogPeminjaman::all();
    // }

    #[Computed()]
    public function logs(){
        return LogPeminjaman::paginate(10);
    }
    public function render()
    {
        return view('livewire.tabel-log');
    }
}
