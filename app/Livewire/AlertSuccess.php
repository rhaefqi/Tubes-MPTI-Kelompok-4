<?php

namespace App\Livewire;

use Livewire\Component;

class AlertSuccess extends Component
{
    public $pesan;

    protected $listeners = ['success'];

    public function success($message)
    {
        $this->pesan = $message['pesan'];
    }
    public function hapusSesi(){
        $this->dispatch('close-alert');
    }
    public function render()
    {
        return view('livewire.alert-success');
    }
}
