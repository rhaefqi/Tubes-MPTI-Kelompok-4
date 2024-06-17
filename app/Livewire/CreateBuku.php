<?php

namespace App\Livewire;

use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\SubjekBuku;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateBuku extends Component
{
    use WithFileUploads;

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
    public $sampul;

    public $kategoris;
    public $subjeks;

    #[On('buku-created')]
    public function updateList($petugas = null){

    }

    protected function rules()
    {
        return [
            'no_seri' => 'required|string|max:12|unique:bukus,no_seri',
            'isbn' => 'required|string|max:20|unique:bukus,isbn',
            'stok' => 'required|integer|min:1',
            'judul' => 'required|string',
            'deskripsi' => 'required|string|min:10',
            'penulis' => 'required|string',
            'penerbit' => 'required|string',
            'tahun_terbit' => 'required|integer|before_or_equal:' . date('Y'),
            'kategori' => 'required|string',
            'subjek' => 'required|string',
            'kelas' => 'required|string',
            'sampul' => 'nullable|image',
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
            'isbn.unique' => 'ISBN sudah terdafatr.',
            'judul.required' => 'Judul buku harus diisi.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'penulis.required' => 'Penulis harus diisi.',
            'penerbit.required' => 'Penerbit harus diisi.',
            'tahun_terbit.required' => 'Tahun terbit harus diisi.',
            'tahun_terbit.before_or_equal' => 'Tahun terbit tidak boleh melebihi tahun sekarang.',
            'kategori.required' => 'Kategori harus diisi.',
            'subjek.required' => 'Subjek harus diisi.',
            'kelas.required' => 'Kelas harus diisi.',
            'sampul.image' => 'Sampul harus berbentuk gambar.',
        ];
    }

    public function mount()
    {
        $this->kategoris = KategoriBuku::all();
        $this->subjeks = SubjekBuku::all();
    }

    public function createBuku()
    {
        $this->validate([
            'no_seri' => 'required|string|max:12',
            'isbn' => 'required|string|max:20',
            'stok' => 'required|integer|min:1',
            'judul' => 'required|string',
            'deskripsi' => 'required|string|min:10',
            'penulis' => 'required|string',
            'penerbit' => 'required|string',
            'tahun_terbit' => 'required|integer|before_or_equal:' . date('Y'),
            'kategori' => 'required|string',
            'subjek' => 'required|string',
            'kelas' => 'required|string',
            'sampul' => 'nullable|image',
        ]);

        DB::beginTransaction();

        try {
            $buku = [
                "no_seri" => $this->no_seri,
                "isbn" => $this->isbn,
                "jumlah_tersedia" => $this->stok,
                "judul" => $this->judul,
                "deskripsi" => $this->deskripsi,
                "penulis" => $this->penulis,
                "penerbit" => $this->penerbit,
                "tahun_terbit" => $this->tahun_terbit,
                "kategori" => $this->kategori,
                "subjek" => $this->subjek,
                "kelas" => $this->kelas,
            ];

            if ($this->sampul) {
                $path = $this->sampul->store('public/assets/img');
                $buku['sampul_buku'] = 'storage/assets/img/' . basename($path);
            }

            Buku::create($buku);

            DB::commit();
            $this->reset('no_seri', 'isbn', 'stok', 'judul', 'deskripsi', 'penulis', 'penerbit', 'tahun_terbit', 'kategori', 'subjek', 'kelas', 'sampul');
            $this->dispatch('buku-created');
            session()->flash('success', 'Data Buku berhasil ditambahkan');
            return redirect()->route('buku.kelola');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            // $this->dispatchBrowserEvent('error', ['message' => 'Data Buku gagal ditambahkan']);
        }
    }

    public function render()
    {
        return view('livewire.create-buku');
    }
}