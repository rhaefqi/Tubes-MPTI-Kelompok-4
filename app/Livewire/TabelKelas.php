<?php

namespace App\Livewire;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;

class TabelKelas extends Component
{
    use WithPagination;
    public $kelas_hapus;

    public $gagalEdit = false;
    public $gagalKelas = false;
    public $edit = false;

    public Kelas $kelas_edit;

    #[Validate(['required', 'uppercase', 'unique:'.Kelas::class])]
    public $kelas;
    #[Validate(['required'])]
    public $tingkat;
    #[Validate(['required','numeric', 'digits:18'])]
    public $wali;
    #[Validate(['required'])]
    public $nama_wali;

    #[On('kelas-created')]
    public function updateList($kelas = null){
        
    }
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

    #[Computed()]
    public function kelass(){
        return Kelas::latest()->paginate(20);
    }

    public function batalEdit(){
        $this->edit = false;
        $this->reset();
    }
    public function editKelas(Kelas $kelass){
        $this->kelas_edit = $kelass;
        $this->kelas = $kelass->kelas;
        $this->tingkat = $kelass->tingkat;
        $this->wali = $kelass->wali_kelas;
        $this->nama_wali = $kelass->wali->nama;
        $this->edit = true;
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

    #[On('tutup-gagal')]
    public function tutupGagal(){
        sleep(1);
        $this->gagalEdit = false;
    }

    public function updateKelas(){
        $kelas = Kelas::find($this->kelas_edit->kelas);
        $validated = $this->validate([
            'kelas' => 'required',
            'tingkat' => 'required',
            'wali' => 'required',
        ]);


        if ($this->nama_wali == 'nama wali tidak ditemukan') {
            $this->nama_wali = ''; 
        }

        $validated += $this->validate([
            'nama_wali' => 'required',
        ]);
        if (
            $kelas->kelas == $this->kelas && 
            $kelas->tingkat == $this->tingkat && 
            $kelas->wali_kelas == $this->wali
            ) {
                $this->gagalEdit = true;
                $this->dispatch('tutup-gagal');
                // dd("ahh");
        }else{
            DB::beginTransaction();
            try {
                $kelas->update($validated);
                DB::commit();
                $this->dispatch('close-input');
                $this->reset('kelas', 'tingkat', 'wali', 'nama_wali');
                $this->reset();
                $this->resetValidation();
                $this->edit = false;
                $this->dispatch('success', ['pesan' => 'Data kelas berhasil diubah!']);
            } catch (\Exception $e) {
                DB::rollBack();
                dd($e);
            }
        }

        
    }

    public function konfirDelete ($kelas){
        $this->kelas_hapus = $kelas;
        // dd($this->guru_nip);
        $kelas = Kelas::find($this->kelas_hapus);
        // dd($kelas);
        $this->dispatch('konfirmasi-hapus', ['nama' => $kelas->kelas, 'jenis' => 'Kelas']);
    }

    #[On('tutup-kelas')]
    public function tutupKelas(){
        // sleep(1);
        $this->gagalKelas = false;
    }
    public function deleteKelas(){
        $this->dispatch('close-hapus');
        $kelas = Kelas::find($this->kelas_hapus);

        $siswa = Siswa::where('kelas', $kelas->kelas)->get();
        // isset($siswa[0]);
        if (isset($siswa[0])) {
            $this->gagalKelas = true;
        }else{
            try {
                DB::beginTransaction();
                

                $kelas->delete();
    
                $this->dispatch('close-hapus');
                $this->dispatch('success', ['pesan' => 'Data Kelas berhasil dihapus!']);
                DB::commit();
            } catch (\Exception $e) {
                dd($e);
                DB::rollBack();
            }
        }


        
    }
    public function render()
    {
        return view('livewire.tabel-kelas');
    }
}
