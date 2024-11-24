<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;

class TabelSiswa extends Component
{
    use WithPagination;
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
    public $siswa_nisn;
    public Siswa $siswa_edit;
    public $edit = false;
    public $gagalEdit = false;
    public $konfirmasi = false;
    public $kelas_siswa;

    #[On('siswa-created')]
    public function updateList($petugas = null){

    }

    #[Computed()]
    public function siswas(){
        return Siswa::latest()->paginate(20);
    }

    public function editSiswa(Siswa $siswa){
        $this->siswa_edit = $siswa;
        $this->nisn = $siswa->nisn;
        // dd($this->nip);
        $this->nama = $siswa->nama;
        $this->jenis_kelamin = $siswa->jenis_kelamin;
        $this->tingkat = $siswa->tingkat;
        $this->kelas = $siswa->kelas;
        $this->edit = true;
    }

    #[On('tutup-gagal')]
    public function tutupGagal(){
        sleep(1);
        $this->gagalEdit = false;
    }

    public function updateSiswa(){
        $siswa = Siswa::find($this->siswa_edit->nisn);
        $validated = $this->validate([
            'nama' => ['required', 'regex:/^[^*\'\"\-]+$/','max:255'],
            'jenis_kelamin' => 'required',
            'tingkat' => 'required',
            'kelas' => 'required',
        ]);

        if($this->nisn != $siswa->nisn){
            $validated += $this->validate([
                'nisn' => 'required|numeric|digits:10|unique:'.Siswa::class,
            ]);
        }else{
            $validated["nisn"] = $this->nisn;
        }
        
        // dd($validated);
        if (
            $this->nisn == $siswa->nisn && 
            $this->nama == $siswa->nama && 
            $this->jenis_kelamin == $siswa->jenis_kelamin && 
            $this->tingkat == $siswa->tingkat && 
            $this->kelas == $siswa->kelas
            ) {
                $this->gagalEdit = true;
                $this->dispatch('tutup-gagal');
        }else{
            try {
                DB::beginTransaction();
                $siswa->update($validated);
                $this->dispatch('close-edit');
                $this->reset();
                $this->resetValidation();
                $this->edit = false;
                $this->dispatch('success', ['pesan' => 'Data siswa berhasil diubah!']);
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                dd($th);
            }
        }
        
    }

    public function batalEdit(){
        $this->edit = false;
        $this->reset('nisn', 'nama', 'jenis_kelamin', 'tingkat', 'kelas');
        $this->resetValidation();
    }

    public function konfirDelete ($nisn){
        // dd("ahh");
        try {
            $this->siswa_nisn = $nisn;
            $siswa = Siswa::find($this->siswa_nisn);
            $this->dispatch('konfirmasi-hapus', ['nama' => $siswa->nama, 'jenis' => 'Siswa']);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function deleteSiswa(){
        try {
            DB::beginTransaction();
            $siswa = Siswa::find($this->siswa_nisn);
            $id_temp = $siswa->user_id;

            $siswa->delete();

            if ($id_temp != 1) {
                $user = User::find($siswa->user_id);
                $user->delete();
            }

            $this->dispatch('close-hapus');
            $this->dispatch('success', ['pesan' => 'Data siswa berhasil dihapus!']);
            DB::commit();
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
        }
    }
    public function render()
    {
        return view('livewire.tabel-siswa');
    }
}
