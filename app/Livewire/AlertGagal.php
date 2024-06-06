<?php

namespace App\Livewire;

use Livewire\Component;

class AlertGagal extends Component
{
    public $pesan;

    protected $listeners = ['gagal'];

    public function gagal($message)
    {
        $this->pesan = $message['pesan'];
    }
    public function hapusSesi(){
        $this->dispatch('close-alert');
    }
    public function render()
    {
        return view('livewire.alert-gagal');
    }
}
