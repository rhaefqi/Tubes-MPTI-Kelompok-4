<?php

namespace App\Livewire;

use App\Models\Petugas;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;

class EditPetugas extends Component
{
    public $idp_edit;
    protected $listeners = ['edit-petugas' => 'dataPetugas'];

    #[Computed()]
    public function petugasE(){
        return Petugas::find($this->idp_edit);
    }
    // #[On('edit-petugas')]
    public function dataPetugas($data){
        // $this->idp_edit = $data['id'];
        
        // dd($tes);
    }
    
    public function render()
    {
        return view('livewire.edit-petugas');
    }
}
