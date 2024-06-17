<?php

namespace App\Livewire;

use App\Models\PeminjamanSiswa;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;

class ModalPeminjam extends Component
{
    // public $pinjam = false;
    // public $nisn_nip;
    // public $status;
    // public $nama;
    // public $absens;
    // public $konfirmasi;
    // public $sudahAbsen = false;
    // public $notFound = false;

    // public $fix = true;
    // public function mount()
    // {
    //     $this->absens = $this->getAbsens();
    // }

    // public function updatedNama($value)
    // {
    //     $this->fix = true;
    //     $this->absens = $this->getAbsens();
    //     $this->nisn_nip = '';
    // }
    // public function updatedStatus($value)
    // {
    //     $this->fix = true;
    //     $this->absens = $this->getAbsens();
    // }

    // #[Computed()]
    // public function getAbsens()
    // {
    //     if ($this->fix) {
    //         if($this->status == 'siswa'){
    //             $hasil = DB::table('view_guru_siswa')
    //                     ->where('nama', 'like', '%' . $this->nama . '%')
    //                     ->where('status', '=', 'siswa')
    //                     ->get();
    //         }elseif($this->status == 'guru'){
    //             // dd("ahh");
    //             $hasil = DB::table('view_guru_siswa')
    //                 ->where('nama', 'like', '%' . $this->nama . '%')
    //                 ->where('status', '=', 'guru')
    //                 ->get();
                
    //         }else{
    //             $hasil = DB::table('view_guru_siswa')
    //                     ->where('nama', 'like', '%' . $this->nama . '%')
    //                     ->get();
    //         }
    //         if ($hasil->isEmpty()) {
    //             // $this->nama = '';
    //             $this->nisn_nip = '';
    //         }else{
    //             return $hasil;
    //         }    
    //     }

    //     return collect([]);
    // }

    // public function pilih($nisn_nip, $nama, $status){
    //     // dd($status);
    //     $this->fix = false;
    //     $this->absens = $this->getAbsens();
    //     $this->nama = $nama;
    //     $this->nisn_nip = $nisn_nip;
    //     $this->status = $status;
    //     // dd($nisn_nip);
    // }

    // public function batalCreate(){
    //     if ($this->status != null || 
    //     $this->nama != null || 
    //     $this->nisn_nip != null) {
    //         $this->konfirmasi = true;
    //     }else{
    //         $this->dispatch('close-input');
    //         $this->reset('nisn_nip', 'nama', 'status');
    //         $this->resetValidation();
    //     }   
    // }
    // public function afterConfirm($temp){
    //     // dd($temp);
    //     if ($temp == 'hapus') {
    //         $this->dispatch('close-input');
    //         $this->reset('nisn_nip', 'nama', 'status');
    //         $this->resetValidation();
    //         $this->konfirmasi = false;
    //     }else{
    //         $this->konfirmasi = false;
    //     }
    // }

    // public function createPinjaman(){
    //     if ($this->status == 'siswa') {
    //         $dataPinjaman = PeminjamanSiswa::where('nisn', $this->nisn_nip)->where('')->get();
    //         dd($dataPinjaman);
    //         // $this->emit('createPinjaman', $this->nisn_nip, $this->nama, $this->status);
    //     }elseif($this->status == 'guru'){
    //         // $this->emit('createPinjaman', $this->nisn_nip, $this->nama, $this->status);
    //     }
    // }
    public function render()
    {
        return view('livewire.modal-peminjam');
    }
}
