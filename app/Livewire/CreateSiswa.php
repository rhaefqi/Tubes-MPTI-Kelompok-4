<?php

namespace App\Livewire;

use App\Models\Kelas;
use App\Models\Siswa;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;

class CreateSiswa extends Component
{
    #[Validate('required|numeric|digits:10|unique:'.Siswa::class)]
    public $nisn;

    #[Validate('required|regex:/^[^\*\'\"\-]+$/|max:255')]
    public $nama;

    #[Validate('required')]
    public $jenis_kelamin;

    #[Validate('required')]
    public $tingkat;

    #[Validate('required')]
    public $kelas;
    public $kelas_siswa;

    public $konfirmasi = false;
    // public $pilihan;

    public function mount()
    {
        // $this->kelas_siswa = Kelas::all();
    }

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

    // public function updatedTingkat($value)
    // {
    //     $this->pilihan = $this->tingkat;
    //     // $this->validateOnly($value);
    // }


    public function createSiswa(){
        $validated = $this->validate();

        DB::beginTransaction();
        try {
            $siswa["nisn"] = $this->nisn;
            $siswa["nama"] = $this->nama;
            $siswa["jenis_kelamin"] = $this->jenis_kelamin;
            $siswa["tingkat"] = $this->tingkat;
            $siswa["kelas"] = $this->kelas;
            $siswa["user_id"] = 1;
            // dd($guru);

            Siswa::create($siswa);

            DB::commit();
            $this->dispatch('close-input');
            $this->reset();
            $this->resetValidation();
            $this->dispatch('success', ['pesan' => 'Data Siswa berhasil ditambahkan']);
            $this->dispatch('siswa-created');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            $this->dispatch('gagal', ['pesan' => 'Data siswa gagal ditambahkan']);
        }
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
        $this->kelas_siswa = Kelas::all();
        // $this->kelas_siswa = 'agah';
        // dd($kelas);
        return view('livewire.create-siswa');
    }
}
