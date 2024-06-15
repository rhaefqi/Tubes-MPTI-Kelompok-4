<?php

namespace App\Livewire;

use App\Models\Buku;
use App\Models\PeminjamanGuru;
use App\Models\PeminjamanSiswa;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FilterPinjam extends Component
{
    public $sortOrder;
    public $daftarPinjams;

    protected $listeners = ['filterPinjam' => 'filterPinjam'];

    public function mount() {
        $this->sortOrder = 'asc';
        $this->fetchPinjams();
    }

    public function fetchPinjams() {
        if (auth()->user()->status == 'siswa') {
            $this->daftarPinjams = Buku::join('peminjaman_siswas', 'peminjaman_siswas.buku_id', '=', 'bukus.id')
                ->where('peminjaman_siswas.nisn', auth()->user()->siswa->nisn)
                ->whereNull('peminjaman_siswas.tanggal_kembali')
                ->orderBy('bukus.judul', $this->sortOrder)
                ->select('peminjaman_siswas.*', 'bukus.*')
                ->get();
        } else {
            $this->daftarPinjams = Buku::join('peminjaman_gurus', 'peminjaman_gurus.buku_id', '=', 'bukus.id')
                ->where('peminjaman_gurus.nip', auth()->user()->guru->nip)
                ->whereNull('peminjaman_gurus.tanggal_kembali')
                ->orderBy('bukus.judul', $this->sortOrder)
                ->select('peminjaman_gurus.*', 'bukus.*')
                ->get();
        }

        // dd($this->daftarPinjams);
    }

    public function filterPinjam() {
        $now = Carbon::now();

        if ($this->sortOrder == 'desc') {
            if (auth()->user()->status == 'siswa') {
                $this->daftarPinjams = Buku::join('peminjaman_siswas', 'peminjaman_siswas.buku_id', '=', 'bukus.id')
                    ->where('peminjaman_siswas.nisn', auth()->user()->siswa->nisn)
                    ->whereNull('peminjaman_siswas.tanggal_kembali')
                    ->orderBy('bukus.judul', 'desc')
                    ->select('peminjaman_siswas.*', 'bukus.*')
                    ->get();
            } else {
                $this->daftarPinjams = PeminjamanGuru::join('bukus', 'peminjaman_gurus.buku_id', '=', 'bukus.id')
                    ->where('peminjaman_gurus.nip', auth()->user()->guru->nip)
                    ->whereNull('peminjaman_gurus.tanggal_kembali')
                    ->orderBy('bukus.judul', 'desc')
                    ->select('peminjaman_gurus', 'bukus.*')
                    ->get();
            }
        } elseif ($this->sortOrder == 'Dekat') {
            if (auth()->user()->status == 'siswa') {
                $this->daftarPinjams = Buku::join('peminjaman_siswas', 'peminjaman_siswas.buku_id', '=', 'bukus.id')
                    ->where('peminjaman_siswas.nisn', auth()->user()->siswa->nisn)
                    ->whereNull('peminjaman_siswas.tanggal_kembali')
                    ->orderBy(DB::raw('DATE_ADD(peminjaman_siswas.tanggal_pinjam, INTERVAL 5 DAY)'), 'asc')
                    ->select('peminjaman_siswas.*', 'bukus.*')
                    ->get();
            } else {
                $this->daftarPinjams = PeminjamanGuru::join('bukus', 'peminjaman_gurus.buku_id', '=', 'bukus.id')
                    ->where('peminjaman_gurus.nip', auth()->user()->guru->nip)
                    ->whereNull('peminjaman_gurus.tanggal_kembali')
                    ->orderBy(DB::raw('DATE_ADD(peminjaman_gurus.tanggal_pinjam, INTERVAL 5 DAY)'), 'asc')
                    ->select('peminjaman_gurus.*', 'bukus.*')
                    ->get();
            }
        } elseif ($this->sortOrder == 'Jauh') {
            if (auth()->user()->status == 'siswa') {
                $this->daftarPinjams = Buku::join('peminjaman_siswas', 'peminjaman_siswas.buku_id', '=', 'bukus.id')
                    ->where('peminjaman_siswas.nisn', auth()->user()->siswa->nisn)
                    ->whereNull('peminjaman_siswas.tanggal_kembali')
                    ->orderBy(DB::raw('DATE_ADD(peminjaman_siswas.tanggal_pinjam, INTERVAL 5 DAY)'), 'desc')
                    ->select('peminjaman_siswas.*', 'bukus.*')
                    ->get();
            } else {
                $this->daftarPinjams = PeminjamanGuru::join('bukus', 'peminjaman_gurus.buku_id', '=', 'bukus.id')
                    ->where('peminjaman_gurus.nip', auth()->user()->guru->nip)
                    ->whereNull('peminjaman_gurus.tanggal_kembali')
                    ->orderBy(DB::raw('DATE_ADD(peminjaman_gurus.tanggal_pinjam, INTERVAL 5 DAY)'), 'desc')
                    ->select('peminjaman_gurus.*', 'bukus.*')
                    ->get();
            }
        } else {
            if (auth()->user()->status == 'siswa') {
                $this->daftarPinjams = Buku::join('peminjaman_siswas', 'peminjaman_siswas.buku_id', '=', 'bukus.id')
                    ->where('peminjaman_siswas.nisn', auth()->user()->siswa->nisn)
                    ->whereNull('peminjaman_siswas.tanggal_kembali')
                    ->orderBy('bukus.judul', 'asc')
                    ->select('peminjaman_siswas.*', 'bukus.*')
                    ->get();
            } else {
                $this->daftarPinjams = PeminjamanGuru::join('bukus', 'peminjaman_gurus.buku_id', '=', 'bukus.id')
                    ->where('peminjaman_gurus.nip', auth()->user()->guru->nip)
                    ->whereNull('peminjaman_gurus.tanggal_kembali')
                    ->orderBy('bukus.judul', 'asc')
                    ->select('peminjaman_gurus.*', 'bukus.*')
                    ->get();
            }
        }
    }

    public function render() {
        return view('livewire.filter-pinjam', [
            'daftarPinjams' => $this->daftarPinjams,
        ]);
    }
}
