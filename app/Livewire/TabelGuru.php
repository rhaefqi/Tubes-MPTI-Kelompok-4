<?php

namespace App\Livewire;

use App\Models\Guru;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;

class TabelGuru extends Component
{
    use WithPagination;
    public Guru $guru_edit;
    #[Validate(['required','numeric', 'digits:18'])]
    public $nip;
    #[Validate(['required','regex:/^[^*\/]+$/', 'max:255'])]
    public $nama;
    #[Validate(['required'])]
    public $jenis_kelamin;
    #[Validate(['required'])]
    public $tingkat;
    public $edit = false;
    public $gagalEdit = false;
    public $konfirmasi = false;
    public $guru_nip;

    protected $rules = [
        'nip' => ['required', 'numeric', 'digits:18'],
        'nama' => ['required', 'regex:/^[^*\/]+$/', 'max:255'],
        'jenis_kelamin' => 'required',
        'tingkat' => 'required',
    ];

    protected $messages = [
            'nip.required' => 'NIP harus diisi',
            'nip.numeric' => 'NIP harus berupa angka',
            'nip.digits' => 'NIP harus 18 digit',
            'nip.unique' => 'NIP sudah terdaftar',
            'nama.required' => 'Nama harus diisi',
            'nama.regex' => 'Nama harus berupa huruf',
            'nama.max' => 'Nama maksimal 255 karakter',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'tingkat.required' => 'Tingkat harus diisi',
    ];

    #[On('guru-created')]
    public function updateList($petugas = null){

    }

    #[Computed()]
    public function gurus(){
        return Guru::latest()->where('nip', '!=', '111111111111111111')->paginate(20);
    }

    public function editGuru(Guru $guru){
        // dd($nip);
        // $guru = Guru::find($nip);
        // dd($guru);
        $this->guru_edit = $guru;
        $this->nip = $guru->nip;
        // dd($this->nip);
        $this->nama = $guru->nama;
        $this->jenis_kelamin = $guru->jenis_kelamin;
        $this->tingkat = $guru->tingkat;
        $this->edit = true;
    }

    #[On('tutup-gagal')]
    public function tutupGagal(){
        sleep(1);
        $this->gagalEdit = false;
    }

    public function updateGuru(){
        $guru = Guru::find($this->guru_edit->nip);
        $validated = $this->validate([
            'nama' => ['required', 'regex:/^[^*\/]+$/', 'max:255'],
            'jenis_kelamin' => 'required',
            'tingkat' => 'required',
        ], $this->messages);

        if ($guru->nip != $this->nip) {
            $validated += $this->validate([
                'nip' => ['required', 'numeric', 'digits:18', 'unique:gurus'],
            ], $this->messages);
        }else{
            $validated["nip"] = $this->nip;
        }
        if (
            $guru->nip == $this->nip && 
            $guru->nama == $this->nama && 
            $guru->jenis_kelamin == $this->jenis_kelamin && 
            $guru->tingkat == $this->tingkat) 
            {
                $this->gagalEdit = true;
                $this->dispatch('tutup-gagal');
        }else{
            try {
                DB::beginTransaction();
                // dd($guru);
                $guru->update($validated);
                
                // dd($validated);
    
                $this->dispatch('success', ['pesan' => 'Data guru berhasil diperbarui!']);
                $this->reset('nip', 'nama', 'jenis_kelamin', 'tingkat');
                // $this->resetValidation();
                // $this->dispatch('close-edit');
                $this->edit = false;
                $this->reset();
                DB::commit();
            } catch (\Throwable $th) {
                dd($th);
                DB::rollBack();
            }
        }
    }

    public function batalEdit(){
        $this->edit = false;
        $this->reset('nip', 'nama', 'jenis_kelamin', 'tingkat');
        $this->resetValidation();
    }

    public function konfirDelete ($nip){
        $this->guru_nip = $nip;
        // dd($this->guru_nip);
        $guru = Guru::find($this->guru_nip);
        // dd($guru);
        $this->dispatch('konfirmasi-hapus', ['nama' => $guru->nama, 'jenis' => 'Guru']);
    }

    public function deleteGuru(){
        try {
            DB::beginTransaction();
            $guru = Guru::find($this->guru_nip);
            $id_temp = $guru->user_id;

            $guru->delete();

            if ($id_temp != 1) {
                $user = User::find($guru->user_id);
                $user->delete();
            }

            $this->dispatch('close-hapus');
            $this->dispatch('success', ['pesan' => 'Data guru berhasil dihapus!']);
            DB::commit();
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
        }
    }
    
    public function render()
    {
        return view('livewire.tabel-guru');
    }
}
