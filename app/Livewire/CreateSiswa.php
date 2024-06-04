<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;

class CreateSiswa extends Component
{
    #[Validate('required|numeric|digits:10')]
    public $nisn = '';

    #[Validate('required|regex:/^[^\*\'\"\-]+$/|max:255')]
    public $nama = '';

    #[Validate('required')]
    public $jenisKelamin = '';

    #[Validate('required')]
    public $tingkat = '';

    #[Validate('required')]
    public $kelas = '';

    public function createSiswa(){
        $validated = $this->validate();
        $this->reset('nama');
    }
    public function render()
    {
        return view('livewire.create-siswa');
    }
}
