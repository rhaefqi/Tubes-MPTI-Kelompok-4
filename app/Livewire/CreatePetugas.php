<?php

namespace App\Livewire;

use App\Models\Petugas;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Log;

class CreatePetugas extends Component
{
    use WithPagination;

    #[Validate('required|regex:/^[^\*\'\"\-]+$/|max:255')]
    public $nama_petugas;

    #[Validate('required')]
    public $jenis_kelamin_petugas;


    public function createPetugas(){
        // $this->validateOnly('nama', 'jenisKelamin');
        $validated = $this->validate();
        $petugas['nama'] = $validated['nama_petugas'];
        $petugas['jenis_kelamin'] = $validated['jenis_kelamin_petugas'];
        $petugas['user_id'] = 1;
        // dd($validated);
        Petugas::create($petugas);

        $this->reset('nama_petugas', 'jenis_kelamin_petugas');
        $this->dispatch('success', ['pesan' => 'Data petugas berhasil ditambahkan']);
        $this->dispatch('close-input');
        $this->dispatch('petugas-created');

        // return redirect()->route('petugas.kelola');

        
        // dd(Log::info('Reset method called')); 
        
        // session()->flash('success', 'Data petugas berhasil ditambahkan!');    

    }
    public function render()
    {
        return view('livewire.create-petugas');
    }
}
