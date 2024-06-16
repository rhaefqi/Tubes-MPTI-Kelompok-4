<?php

namespace App\Livewire;

use App\Models\Petugas;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;

class TabelPetugas extends Component
{
    use WithPagination;
    #[Validate('required|regex:/^[^\*\'\"\-]+$/|max:255')]
    public $namap;
    #[Validate('required')]
    public $jkp;
    #[Validate('required')]
    public $idp;

    public $petugas_id = '';
    public Petugas $petugas_edit;
    public $edit = '';

    #[On('petugas-created')]
    public function updateList($petugas = null){

    }

    #[Computed()]
    public function petugass(){
        return Petugas::latest()->paginate(20);
    }

    public function editPetugas(Petugas $petugas){
        $this->petugas_edit = $petugas;
        // dd($petugas->nama);
        $this->idp = $petugas->id;
        $this->namap = $petugas->nama;
        $this->jkp = $petugas->jenis_kelamin;
        $this->edit = true;
    }

    public function updatePetugas(){
        $validated = $this->validate();
        // dd('ahh');
        $petugas = Petugas::find($this->idp);
        // dd($petugas);
        if(
            $validated['namap'] == $petugas->nama &&
            $validated['jkp'] == $petugas->jenis_kelamin
        ){
            $this->dispatch('gagal', ['pesan' => 'Data petugas Tidak ada Diubah']);  
        }else{
            $petugas->nama = $validated['namap'];
            $petugas->jenis_kelamin = $validated['jkp'];
            $petugas->save();
            $this->edit = false;
            $this->dispatch('success', ['pesan' => 'Data petugas Berhasil Diubah']);  
        }
    }

    public function batalEdit(){
        $this->edit = false;
    }

    public function konfirDelete ($id){
        $this->petugas_id = $id;
        $petugas = Petugas::find($id);
        // dd($petugas->nama);
        $this->dispatch('konfirmasi-hapus', ['nama' => $petugas->nama, 'jenis' => 'Petugas']);
    }

    public function deletePetugas(){
        try {
            DB::beginTransaction();
            $petugas = Petugas::find($this->petugas_id);
            
            $petugas->delete();
            $this->dispatch('close-hapus');
            $this->dispatch('success', ['pesan' => 'Data petugas berhasil dihapus!']);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function render()
    {
        return view('livewire.tabel-petugas');
    }
}
