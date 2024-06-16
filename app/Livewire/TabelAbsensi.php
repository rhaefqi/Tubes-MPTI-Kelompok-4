<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class TabelAbsensi extends Component
{
    public $filter_tanggal;
    // public $absens;

    use WithPagination;

    #[On('absen-created')]
    public function updateList($absen = null){
    }

    #[Computed()]
    public function absens(){
        // dd("ah");
        if($this->filter_tanggal){
            return DB::table('view_absensi')->where('tanggal', $this->filter_tanggal)->orderBy('tanggal', 'desc')->paginate(10);
        }else{
            return DB::table('view_absensi')->orderBy('tanggal', 'desc')->paginate(10);
        }
    }
    public function render()
    {
        // $this->absens = DB::table('view_absensi')->orderBy('tanggal')->paginate(10);
        if(isset(request()->components)){
            if(request()->components[0]['updates']){
                $this->resetPage();
            }
        }
        return view('livewire.tabel-absensi');
    }
}
