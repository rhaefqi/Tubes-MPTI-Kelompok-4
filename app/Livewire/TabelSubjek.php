<?php

namespace App\Livewire;

use App\Models\Buku;
use Livewire\Component;
use App\Models\SubjekBuku;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;

class TabelSubjek extends Component
{
    use WithPagination;

    public $gagalKelas = false;
    public $edit = false;
    public $gagalEdit = false;
    public $pesanGagal;
    public $subjek_hapus;
    public SubjekBuku $subjek_edit;
    public $subjek;
    
    #[On('subjek-created')]
    public function updateList($subjek = null){

    }
    #[Computed()]
    public function subjeks(){
        return SubjekBuku::latest()->paginate(10);
    }

    public function batalEdit(){
        $this->edit = false;
        $this->reset();
    }
    public function editSubjek(SubjekBuku $subjek){
        $this->subjek = $subjek->subjek;
        $this->subjek_edit = $subjek;
        $this->edit = true;
    }

    #[On('tutup-gagal')]
    public function tutupGagal(){
        sleep(1);
        $this->gagalEdit = false;
    }

    public function updateSubjek(){
        // dd("ahh");
        $subjek = SubjekBuku::find($this->subjek_edit->subjek);
        $validated = $this->validate([
            'subjek' => ['required', 'max:255'],
        ]);

        if($subjek->subjek == $this->subjek){
            $this->gagalEdit = true;
            // dd("ahh");
            $this->dispatch('tutup-gagal');
        }else{
            DB::beginTransaction();
            try {
                $subjek->update($validated);
                DB::commit();
                $this->edit = false;
                $this->reset();
                $this->dispatch('success', ['pesan' => 'Data subjek berhasil diubah!']);
            } catch (\Throwable $th) {
                DB::rollBack();
                dd($th);
                $this->dispatch('gagal', ['pesan' => 'Data subjek gagal diubah!']);
            }
        }
        // $this->subjek_edit->subjek = $this->subjek;
        // $this->subjek_edit->save();
        // $this->edit = false;
    }

    public function konfirDelete ($subjek){
        $this->subjek_hapus = $subjek;
        // dd($this->guru_nip);
        $subjek = SubjekBuku::find($this->subjek_hapus);
        // dd($subjek);
        $this->dispatch('konfirmasi-hapus', ['nama' => $subjek->subjek, 'jenis' => 'Subjek']);
    }

    #[On('tutup-kelas')]
    public function tutupKelas(){
        // sleep(1);
        $this->gagalKelas = false;
    }

    public function deleteSubjek(){
        $this->dispatch('close-hapus');

        $subjek = SubjekBuku::find($this->subjek_hapus);

        $buku = Buku::where('subjek', $subjek->subjek)->get();
        // isset($buku[0]);
        if (isset($buku[0])) {
            $this->gagalKelas = true;
            $this->pesanGagal = 'Subjek ini digunakan oleh buku yang ada';
        }else{
            try {
                DB::beginTransaction();
                
                $subjek->delete();
    
                $this->dispatch('close-hapus');
                $this->dispatch('success', ['pesan' => 'Data subjek berhasil dihapus!']);
                DB::commit();
            } catch (\Exception $e) {
                dd($e);
                DB::rollBack();
            }
        }


        
    }
    public function render()
    {
        return view('livewire.tabel-subjek');
    }

    
}
