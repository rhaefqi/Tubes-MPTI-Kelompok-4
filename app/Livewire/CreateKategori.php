<?php

namespace App\Livewire;

use App\Models\KategoriBuku;
use Throwable;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;

class CreateKategori extends Component
{
    #[Validate('required|unique:kategori_bukus')]
    public $kategori;

    public $konfirmasi;

    protected $messages = [
        'kategori.required' => 'Kategori buku harus diisi.',
        'kategori.unique' => 'Kategori buku sudah ada. Silahkan tambahkan kategori buku yang lain.',
    ];

    public function createKategori(){
        $validated = $this->validate();
        DB::beginTransaction();
        try {
            KategoriBuku::create($validated);
            DB::commit();
            $this->dispatch('kategori-created');
            $this->dispatch('success', ['pesan' => 'Data kategori buku berhasil ditambahkan!']);
            $this->dispatch('close-input');
            $this->reset();
        } catch (Throwable $e) {
            dd($e);
            DB::rollback();
        }
    }
    
    public function batalCreate(){
        if ($this->kategori != null) {
            $this->konfirmasi = true;
        }else{
            $this->dispatch('close-input');
            $this->reset('kategori');
            $this->resetValidation();
        }
    }

    public function afterConfirm($temp){
        if ($temp == 'hapus') {
            $this->dispatch('close-input');
            $this->reset();
            $this->resetValidation();
            $this->konfirmasi = false;
        }else{
            $this->konfirmasi = false;
        }
    }
    public function render()
    {
        return view('livewire.create-kategori');
    }
}
