<?php

namespace App\Livewire;

use App\Models\AbsensiGuru;
use App\Models\AbsensiSiswa;
use App\Models\Guru;
use App\Models\Siswa;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;

class CreateAbsensi extends Component
{
    public $nisn_nip;
    public $status;
    public $nama;
    public $absens;
    public $konfirmasi;
    public $sudahAbsen = false;
    public $notFound = false;

    public $fix = true;

    public function mount()
    {
        $this->absens = $this->getAbsens();
    }

    public function updatedNama($value)
    {
        $this->fix = true;
        $this->absens = $this->getAbsens();
        $this->nisn_nip = '';
    }
    public function updatedStatus($value)
    {
        $this->fix = true;
        $this->absens = $this->getAbsens();
    }

    #[Computed()]
    public function getAbsens()
    {
        if ($this->fix) {
            if($this->status == 'siswa'){
                $hasil = DB::table('view_guru_siswa')
                        ->where('nama', 'like', '%' . $this->nama . '%')
                        ->where('status', '=', 'siswa')
                        ->get();
            }elseif($this->status == 'guru'){
                // dd("ahh");
                $hasil = DB::table('view_guru_siswa')
                    ->where('nama', 'like', '%' . $this->nama . '%')
                    ->where('status', '=', 'guru')
                    ->get();
                
            }else{
                $hasil = DB::table('view_guru_siswa')
                        ->where('nama', 'like', '%' . $this->nama . '%')
                        ->get();
            }
            if ($hasil->isEmpty()) {
                $this->nama = '';
                $this->nisn_nip = '';
            }else{
                return $hasil;
            }    
        }

        return collect([]);
    }

    public function pilih($nisn_nip, $nama, $status){
        // dd($status);
        $this->fix = false;
        $this->absens = $this->getAbsens();
        $this->nama = $nama;
        $this->nisn_nip = $nisn_nip;
        $this->status = $status;
        // dd($nisn_nip);
    }

    #[On('tutup-not-found')]
    public function tutupNotFound(){
        sleep(1);
        $this->notFound = false;
    }
    #[On('tutup-sudah-absen')]
    public function tutupSudahAbsen(){
        sleep(1);
        $this->sudahAbsen = false;
    }

    public function createAbsensi(){
        if($this->status == 'siswa'){
            $hadir = AbsensiSiswa::where('tanggal', date('Y-m-d'))->where('nisn', $this->nisn_nip)->count();
            // dd($hadir);
            if ($hadir == 0) {
                DB::beginTransaction();
                try {
                    $siswa = Siswa::find($this->nisn_nip);
                    // dd($siswa);
                    $siswa->absen()->create([
                        'nisn' => $siswa->nisn,
                        'tanggal' => date('Y-m-d'),
                        'jam' => date('H:i:s'),
                    ]);

                    $this->dispatch('close-input');
                    $this->dispatch('success', ['pesan' => 'Absensi siswa ' . $this->nama . ' berhasil ditambahkan']);
                    $this->reset('nisn_nip', 'nama', 'status');
                    $this->resetValidation();
                    $this->fix = true;
                    $this->absens = $this->getAbsens();
                    DB::commit();
                }catch (\Throwable $e) {
                    DB::rollBack();
                    $this->dispatch('gagal', ['pesan' => 'Absensi siswa ' . $this->nama . ' gagal ditambahkan']);
                }
            }else{
                $this-> sudahAbsen = true;
                $this->dispatch('tutup-sudah-absen');
            }         
            
        }elseif($this->status == 'guru'){
            $hadir = AbsensiGuru::where('tanggal', date('Y-m-d'))->where('nip', $this->nisn_nip)->count();
            if ($hadir == 0) {
                DB::beginTransaction();
                try {
                    $guru = Guru::find($this->nisn_nip);
                    $guru->absen()->create([
                        'nip' => $guru->nip,
                        'tanggal' => date('Y-m-d'),
                        'jam' => date('H:i:s'),
                    ]);
                    $this->dispatch('close-input');
                    $this->reset('nisn_nip', 'nama', 'status');
                    $this->resetValidation();
                    $this->fix = true;
                    $this->absens = $this->getAbsens();
                    $this->dispatch('success', ['pesan' => 'Absensi guru ' . $this->nama . ' berhasil ditambahkan']);
                    DB::commit();
                }catch (\Throwable $e) {
                    dd($e);
                    DB::rollBack();
                    $this->dispatch('gagal', ['pesan' => 'Absensi guru ' . $this->nama . ' gagal ditambahkan']);
                }
            }else{
                $this-> sudahAbsen = true;
                $this->dispatch('tutup-sudah-absen');
            }
        }
    }

    public function batalCreate(){
        if ($this->status != null || 
        $this->nama != null || 
        $this->nisn_nip != null) {
            $this->konfirmasi = true;
        }else{
            $this->dispatch('close-input');
            $this->reset('nisn_nip', 'nama', 'status');
            $this->resetValidation();
        }   
    }

    public function afterConfirm($temp){
        // dd($temp);
        if ($temp == 'hapus') {
            $this->dispatch('close-input');
            $this->reset('nisn_nip', 'nama', 'status');
            $this->resetValidation();
            $this->konfirmasi = false;
        }else{
            $this->konfirmasi = false;
        }
    }

    public function render()
    {
        return view('livewire.create-absensi', ['absens' => $this->absens]);
    }
}
