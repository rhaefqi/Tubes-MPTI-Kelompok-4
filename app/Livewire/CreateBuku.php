<?php

namespace App\Livewire;

use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\SubjekBuku;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateBuku extends Component
{
    use WithFileUploads;

    public $no_seri;
    public $isbn;
    public $stok;
    public $judul;
    public $deskripsi;
    public $penulis;
    public $penerbit;
    public $tahun_terbit;
    public $kategori;
    public $subjek;
    public $kelas;
    public $sampul;

    public $kategoris;
    public $subjeks;

    public function mount()
    {
        $this->kategoris = KategoriBuku::all();
        $this->subjeks = SubjekBuku::all();
    }

    public function createBuku()
    {
        $this->validate([
            'no_seri' => 'required|string',
            'isbn' => 'required|string',
            'stok' => 'required|integer',
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'penulis' => 'required|string',
            'penerbit' => 'required|string',
            'tahun_terbit' => 'required|integer',
            'kategori' => 'required|string',
            'subjek' => 'required|string',
            'kelas' => 'required|string',
            'sampul' => 'nullable|image|max:1024', // 1MB Max
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
            // $this->dispatchBrowserEvent('success', ['message' => 'Data Buku berhasil ditambahkan']);
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