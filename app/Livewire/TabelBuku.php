<?php

namespace App\Livewire;

use App\Models\Buku;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class TabelBuku extends Component
{   
    // public Buku $buku_detail;
    public $bukuId;
    public $bukus;
    public $detail;
    public $tampilDetail = false;

    #[Computed()]
    public function bukus(){
        return Buku::latest()->paginate(20);
    }

    #[On('berhasil-hapus')]
    public function berhasilDelete(){
        $this->bukus = Buku::all();
    }

    public function tutupDetail(){
        $this->tampilDetail = false;
    }

    public function mount()
    {
        $this->bukus = Buku::all();
        // $this->detail = Buku::all();
    }

    public function detailBuku(Buku $buku)
    {
        $this->detail = Buku::where('id',$buku->id)->first();
        $this->tampilDetail = true;
        // $this->dispatch('tutup-detail');
    }

    public function konfirDelete ($id){
        // dd($id);
        $this->bukuId = $id;

        $buku = Buku::find($this->bukuId);

        $this->dispatch('konfirmasi-hapus', ['nama' => $buku->judul, 'jenis' => 'Buku']);
    }

    public function deleteBuku(){
        try {
            DB::beginTransaction();
            $buku = Buku::findOrFail($this->bukuId);

            $buku->delete();

            $this->dispatch('close-hapus');
            $this->dispatch('success', ['pesan' => 'Data buku berhasil dihapus!']);
            DB::commit();
            $this->dispatch('berhasil-hapus');
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
        }
    }

    public function render()
    {
        return view('livewire.tabel-buku');
    }
}
