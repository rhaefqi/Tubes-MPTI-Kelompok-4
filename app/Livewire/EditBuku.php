<?php

namespace App\Livewire;

use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\SubjekBuku;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditBuku extends Component
{   
    use WithFileUploads;

    public $id;
    public $kategoris;
    public $subjeks;
    public $buku;
    public $sampul;
    
    #[Validate] 
    public $no_seri;

    #[Validate] 
    public $isbn;

    #[Validate] 
    public $stok;

    #[Validate] 
    public $judul;

    #[Validate] 
    public $deskripsi;

    #[Validate] 
    public $penulis;

    #[Validate] 
    public $penerbit;

    #[Validate] 
    public $tahun_terbit;

    #[Validate] 
    public $kategori;

    #[Validate] 
    public $subjek;

    #[Validate] 
    public $kelas;

    #[Validate] 
    public $newSampul;

    protected function rules()
    {
        return [
            'no_seri' => ['required', 'string', 'max:12', Rule::unique('bukus')->ignore($this->id)],
            'isbn' => ['required', 'string', 'max:20', Rule::unique('bukus')->ignore($this->id)],
            'stok' => ['required', 'integer', 'min:1'],
            'judul' => ['required', 'string'],
            'deskripsi' => ['required', 'string', 'min:10'],
            'penulis' => ['required', 'string'],
            'penerbit' => ['required', 'string'],
            'tahun_terbit' => ['required', 'integer', 'before_or_equal:' . date('Y')],
            'kategori' => ['required', 'string'],
            'subjek' => ['required', 'string'],
            'kelas' => ['required', 'string'],
            'newSampul' => ['nullable', 'image'],
        ];
    }

    protected function messages()
    {
        return [
            'no_seri.required' => 'Nomor seri harus diisi.',
            'no_seri.max' => 'Nomor seri maksimal 12 karakter.',
            'no_seri.unique' => 'Nomor seri sudah terdaftar.',
            'isbn.required' => 'ISBN harus diisi.',
            'isbn.max' => 'ISBN maksimal 20 karakter.',
            'isbn.unique' => 'ISBN sudah terdaftar.',
            'stok.required' => 'Stok harus diisi.',
            'stok.integer' => 'Stok harus berupa angka.',
            'stok.min' => 'Stok minimal 1.',
            'judul.required' => 'Judul buku harus diisi.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'deskripsi.min' => 'Deskripsi minimal 10 karakter.',
            'penulis.required' => 'Penulis harus diisi.',
            'penerbit.required' => 'Penerbit harus diisi.',
            'tahun_terbit.required' => 'Tahun terbit harus diisi.',
            'tahun_terbit.before_or_equal' => 'Tahun terbit tidak boleh melebihi tahun sekarang.',
            'kategori.required' => 'Kategori harus diisi.',
            'subjek.required' => 'Subjek harus diisi.',
            'kelas.required' => 'Kelas harus diisi.',
            'newSampul.image' => 'Sampul harus berbentuk gambar.',
        ];
    }

    public function mount($id)
    {
        $this->kategoris = KategoriBuku::all();
        $this->subjeks = SubjekBuku::all();
        $this->id = $id;
        $buku = Buku::findOrFail($id);
        $this->no_seri = $buku->no_seri;
        $this->isbn = $buku->isbn;
        $this->stok = $buku->jumlah_tersedia;
        $this->judul = $buku->judul;
        $this->deskripsi = $buku->deskripsi;
        $this->penulis = $buku->penulis;
        $this->penerbit = $buku->penerbit;
        $this->tahun_terbit = $buku->tahun_terbit;
        $this->kategori = $buku->kategori;
        $this->subjek = $buku->subjek;
        $this->kelas = $buku->kelas;
        $this->sampul = $buku->sampul_buku;
    }

    public function editBuku()
    {
        $validated = $this->validate();
        
        DB::beginTransaction();
        try {
            $buku = Buku::find($this->id);
            // dd($buku);
            
            // Update the book fields
            $buku->update($validated);

            // If a new cover image is uploaded, handle the file upload
            if ($this->newSampul) {
                $path = $this->newSampul->store('public/assets/img');
                $buku->sampul_buku = 'storage/assets/img/' . basename($path);
                $buku->save();
            }
            
            DB::commit();
            // $this->dispatch('buku-created');
            session()->flash('success', 'Data Buku berhasil diedit');
            return redirect()->route('buku.kelola');
            // $this->dispatchBrowserEvent('success', ['message' => 'Data buku berhasil diperbarui!']);
        } catch (\Throwable $th) {
            DB::rollBack();
            // $this->dispatchBrowserEvent('error', ['message' => 'Terjadi kesalahan saat memperbarui data buku.']);
        }
        // dd("ahh");
    }

    public function render()
    {
        return view('livewire.edit-buku');
    }
}
