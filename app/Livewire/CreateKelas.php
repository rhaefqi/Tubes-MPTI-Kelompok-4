<?php

namespace App\Livewire;

use App\Models\Guru;
use App\Models\Kelas;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;

class CreateKelas extends Component
{
    #[Validate(['required', 'uppercase', 'unique:'.Kelas::class])]
    public $kelas;
    #[Validate(['required'])]
    public $tingkat;
    #[Validate(['required','numeric', 'digits:18'])]
    public $wali;
    #[Validate(['required'])]
    public $nama_wali;

    public $konfirmasi = false;
    

    // protected $rules = [
    //     'nip' => ['required', 'numeric', 'digits:18', 'unique:gurus'],
    //     'nama' => ['required', 'regex:/^[^*\/]+$/', 'max:255'],
    //     'jenis_kelamin' => 'required',
    //     'tingkat' => 'required',
    // ];

    protected $messages = [
            'kelas.uppercase' => 'Kelas harus dengan huruf besar',    
            'kelas.unique' => 'Kelas sudah ada',    
            'kelas.required' => 'Kelas harus diisi',    
            'wali.required' => 'nip Wali harus diisi',
            'wali.numeric' => 'nip Wali harus angka',
            'wali.digits' => 'nip Wali harus 18 digit',
            'nama_wali.required' => 'Nama wali tidak terdaftar',
            'tingkat.required' => 'Tingkat harus diisi',
    ];
    public function batalCreate(){
        if ($this->kelas != null || 
            $this->tingkat != null || 
            $this->wali != null) {
        
            $this->konfirmasi = true;
        }else{
            $this->dispatch('close-input');
            $this->reset('kelas', 'tingkat', 'wali', 'nama_wali');
            $this->resetValidation();
        }
    }
    public function afterConfirm($temp){
        // dd($temp);
        if ($temp == 'hapus') {
            $this->dispatch('close-input');
            $this->reset('kelas', 'tingkat', 'wali', 'nama_wali');
            $this->resetValidation();
            $this->konfirmasi = false;
        }else{
            $this->konfirmasi = false;
        }
    }

    public function updatedWali($value)
    {
        if ($value != null) {
            try {
                $this->nama_wali = Guru::find($value)->nama;
                // dd($this->nama_wali);
            } catch (\Throwable $th) {
                $this->nama_wali = 'nama wali tidak ditemukan';
            }
        } else {
            $this->nama_wali = '';
        }
    }

    public function createKelas(){
        $this->validate([
            'kelas' => 'required',
            'tingkat' => 'required',
            'wali' => 'required',
        ]);

        // dd($this->nama_wali);   
        if ($this->nama_wali == 'nama wali tidak ditemukan') {
            $this->nama_wali = '';
            $this->validate([
                'nama_wali' => 'required',
            ]);
        }

        DB::beginTransaction();
        try {
            $kelas["kelas"] = $this->kelas;
            $kelas["tingkat"] = $this->tingkat;
            $kelas["wali_kelas"] = $this->wali;

            Kelas::create($kelas);

            DB::commit();

            $this->dispatch('close-input');
            $this->reset('kelas', 'tingkat', 'wali', 'nama_wali');
            $this->resetValidation();
            $this->dispatch('kelas-created');
            $this->dispatch('success', ['pesan' => 'Data kelas berhasil ditambahkan!']);
        } catch (\Throwable $th) {

            DB::rollBack();
            dd($th);
            $this->dispatch('error', ['pesan' => 'Data kelas gagal ditambahkan!']);
        }

        
    }

    public function render()
    {
        return view('livewire.create-kelas');
    }
}
