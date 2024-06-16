<?php

namespace App\Livewire;

use App\Models\Buku;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\KategoriBuku;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;

class TabelKategori extends Component
{
    use WithPagination;

    public $gagalKelas = false;
    public $edit = false;
    public $gagalEdit = false;
    public $pesanGagal;
    public $kategori_hapus;
    public KategoriBuku $kategori_edit;
    public $kategori;
    
    #[On('kategori-created')]
    public function updateList($kategori = null){

    }

    #[Computed()]
    public function kategoris(){
        return KategoriBuku::latest()->paginate(10);
    }

    public function batalEdit(){
        $this->edit = false;
        $this->reset();
    }
    public function editKategori(KategoriBuku $kategori){
        $this->kategori = $kategori->kategori;
        $this->kategori_edit = $kategori;
        $this->edit = true;
    }

    #[On('tutup-gagal')]
    public function tutupGagal(){
        sleep(1);
        $this->gagalEdit = false;
    }

    public function updateKategori(){
        // dd("ahh");
        $kategori = KategoriBuku::find($this->kategori_edit->kategori);
        $validated = $this->validate([
            'kategori' => ['required', 'max:255'],
        ]);

        if($kategori->kategori == $this->kategori){
            $this->gagalEdit = true;
            // dd("ahh");
            $this->dispatch('tutup-gagal');
        }else{
            DB::beginTransaction();
            try {
                $kategori->update($validated);
                DB::commit();
                $this->edit = false;
                $this->reset();
                $this->dispatch('success', ['pesan' => 'Data kategori berhasil diubah!']);
            } catch (\Throwable $th) {
                DB::rollBack();
                dd($th);
                $this->dispatch('gagal', ['pesan' => 'Data kategori gagal diubah!']);
            }
        }
        // $this->subjek_edit->subjek = $this->subjek;
        // $this->subjek_edit->save();
        // $this->edit = false;
    }

    public function konfirDelete ($kategori){
        $this->kategori_hapus = $kategori;
        // dd($this->guru_nip);
        $kategori = KategoriBuku::find($this->kategori_hapus);
        // dd($kategori);
        $this->dispatch('konfirmasi-hapus', ['nama' => $kategori->kategori, 'jenis' => 'Kategori']);
    }

    #[On('tutup-kelas')]
    public function tutupKelas(){
        // sleep(1);
        $this->gagalKelas = false;
    }

    public function deleteKategori(){
        $this->dispatch('close-hapus');

        $kategori = KategoriBuku::find($this->kategori_hapus);

        $buku = Buku::where('kategori', $kategori->kategori)->get();
        // isset($buku[0]);
        if (isset($buku[0])) {
            $this->gagalKelas = true;
            $this->pesanGagal = 'Kategori ini digunakan oleh buku yang ada';
        }else{
            try {
                DB::beginTransaction();
                
                $kategori->delete();
    
                $this->dispatch('close-hapus');
                $this->dispatch('success', ['pesan' => 'Data kategori berhasil dihapus!']);
                DB::commit();
            } catch (\Exception $e) {
                dd($e);
                DB::rollBack();
            }
        }


        
    }
    public function render()
    {
        return view('livewire.tabel-kategori');
    }
}
