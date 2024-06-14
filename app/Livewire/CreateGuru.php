<?php

namespace App\Livewire;

use App\Models\Guru;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;

class CreateGuru extends Component
{
    #[Validate(['required','numeric', 'digits:18', 'unique:gurus'])]
    public $nip;
    #[Validate(['required','regex:/^[^*\/]+$/', 'max:255'])]
    public $nama;
    #[Validate(['required'])]
    public $jenis_kelamin;
    #[Validate(['required'])]
    public $tingkat;
    public $konfirmasi = false;

    protected $rules = [
        'nip' => ['required', 'numeric', 'digits:18', 'unique:gurus'],
        'nama' => ['required', 'regex:/^[^*\/]+$/', 'max:255'],
        'jenis_kelamin' => 'required',
        'tingkat' => 'required',
    ];

    protected $messages = [
            'nip.required' => 'NIP harus diisi',
            'nip.numeric' => 'NIP harus berupa angka',
            'nip.digits' => 'NIP harus 18 digit',
            'nip.unique' => 'NIP sudah ada',
            'nama.required' => 'Nama harus diisi',
            'nama.regex' => 'Nama harus berupa huruf',
            'nama.max' => 'Nama maksimal 255 karakter',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'tingkat.required' => 'Tingkat harus diisi',
    ];

    public function createGuru(){
        $this->validate([
            'nip' => ['required','numeric', 'digits:18', 'unique:gurus'],
            'nama' => ['required','regex:/^[^*\/]+$/', 'max:255'],
            'jenis_kelamin' => 'required',
            'tingkat' => 'required',
            ]);
            
        DB::beginTransaction();
        try {
            $guru["nip"] = $this->nip;
            $guru["nama"] = $this->nama;
            $guru["jenis_kelamin"] = $this->jenis_kelamin;
            $guru["tingkat"] = $this->tingkat;
            $guru["user_id"] = 1;
            // dd($guru);

            Guru::create($guru);

            DB::commit();
            $this->dispatch('close-input');
            $this->reset('nip', 'nama', 'jenis_kelamin', 'tingkat');
            $this->resetValidation();
            $this->dispatch('success', ['pesan' => 'Data Guru berhasil ditambahkan']);
            $this->dispatch('guru-created');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            $this->dispatch('gagal', ['pesan' => 'Data Guru gagal ditambahkan']);
        }
    }

    // public function pesan(){
    //     return [
            // 'nip.required' => 'NIP harus diisi',
            // 'nip.numeric' => 'NIP harus berupa angka',
            // 'nip.digits' => 'NIP harus 18 digit',
            // 'nip.unique' => 'NIP sudah ada',
            // 'nama.required' => 'Nama harus diisi',
            // 'nama.regex' => 'Nama harus berupa huruf',
            // 'nama.max' => 'Nama maksimal 255 karakter',
            // 'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            // 'tingkat.required' => 'Tingkat harus diisi',
    //     ];
    // }

    public function batalCreate(){
        if ($this->nip != null || 
        $this->nama != null || 
        $this->jenis_kelamin != null || 
        $this->tingkat != null) {
            
            // dd("ahh");
            $this->konfirmasi = true;
        }else{
            $this->dispatch('close-input');
            $this->reset('nip', 'nama', 'jenis_kelamin', 'tingkat');
            $this->resetValidation();
        }
        
    }

    public function afterConfirm($temp){
        // dd($temp);
        if ($temp == 'hapus') {
            $this->dispatch('close-input');
            $this->reset('nip', 'nama', 'jenis_kelamin', 'tingkat');
            $this->resetValidation();
            $this->konfirmasi = false;
        }else{
            $this->konfirmasi = false;
        }
    }
    public function render()
    {
        return view('livewire.create-guru');
    }
}
