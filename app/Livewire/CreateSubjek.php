<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SubjekBuku;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Throwable;

class CreateSubjek extends Component
{
    #[Validate('required|unique:subjek_bukus')]
    public $subjek;

    public $konfirmasi;

    protected $messages = [
        'subjek.required' => 'Subjek buku harus diisi.',
        'subjek.unique' => 'Subjek buku sudah ada. Silahkan tambahkan subjek buku yang lain.',
    ];

    public function createSubjek(){
        $validated = $this->validate();
        DB::beginTransaction();
        try {
            SubjekBuku::create($validated);
            DB::commit();
            $this->dispatch('subjek-created');
            $this->dispatch('success', ['pesan' => 'Data subjek buku berhasil ditambahkan!']);
            $this->dispatch('close-input');
            $this->reset();
        } catch (Throwable $e) {
            dd($e);
            DB::rollback();
        }
    }

    public function batalCreate(){
        if ($this->subjek != null) {
            $this->konfirmasi = true;
        }else{
            $this->dispatch('close-input');
            $this->reset('subjek');
            $this->resetValidation();
            // $this->reset();
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
        return view('livewire.create-subjek');
    }
}
