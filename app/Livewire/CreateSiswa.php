<?php

namespace App\Livewire;

use App\Models\Siswa;
use Livewire\Component;
use Livewire\Attributes\Validate;

class CreateSiswa extends Component
{
    #[Validate('required|numeric|digits:10')]
    public $nisn;

    #[Validate('required|regex:/^[^\*\'\"\-]+$/|max:255')]
    public $nama;

    #[Validate('required')]
    public $jenis_kelamin;

    #[Validate('required')]
    public $tingkat;

    #[Validate('required')]
    public $kelas;

    public $konfirmasi = false;

    protected $rules = [
        'nisn' => ['required', 'numeric', 'digits:10', 'unique:'.Siswa::class],
        'nama' => ['required', 'regex:/^[^*\/]+$/', 'max:255'],
        'jenis_kelamin' => 'required',
        'tingkat' => 'required',
    ];

    protected $messages = [
            'nisn.required' => 'NISN harus diisi',
            'nisn.numeric' => 'NISN harus berupa angka',
            'nisn.digits' => 'NISN harus 10 digit',
            'nisn.unique' => 'NISN sudah terdaftar',
            'nama.required' => 'Nama harus diisi',
            'nama.regex' => 'Nama harus berupa huruf',
            'nama.max' => 'Nama maksimal 255 karakter',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'tingkat.required' => 'Tingkat harus diisi',
    ];

    public function createSiswa(){
        $validated = $this->validate();
        $this->reset('nama');
    }
    public function batalCreate(){
        if ($this->nisn != null || 
        $this->nama != null || 
        $this->jenis_kelamin != null || 
        $this->tingkat != null ||
        $this->kelas != null) {
            
            $this->konfirmasi = true;
        }else{
            $this->dispatch('close-input');
            $this->reset('nisn', 'nama', 'jenis_kelamin', 'tingkat', 'kelas');
            $this->resetValidation();
            // $this->reset();
        }
        
    }
    public function afterConfirm($temp){
        // dd($temp);
        if ($temp == 'hapus') {
            $this->dispatch('close-input');
            $this->reset('nisn', 'nama', 'jenis_kelamin', 'tingkat', 'kelas');
            $this->resetValidation();
            $this->konfirmasi = false;
        }else{
            $this->konfirmasi = false;
        }
    }
    public function render()
    {
        return view('livewire.create-siswa');
    }
}
