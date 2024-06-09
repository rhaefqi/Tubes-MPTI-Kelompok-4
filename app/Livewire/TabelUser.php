<?php

namespace App\Livewire;

use App\Models\Guru;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Petugas;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;

class TabelUser extends Component
{
    public User $user_edit;

    public $usernameu;
    public $emailu;
    public $no_hpu;
    public $statusu;
    public $idu;
    public $edit = false;

    public $user_id;
    #[On('user-created')]
    public function updateList($user = null){

    }

    #[Computed()]
    public function users(){
        return User::where('id', '!=', 1)
                    ->whereIn('status', ['siswa', 'pegawai', 'guru'])
                    ->latest()
                ->paginate(20);
    }

    public function editUser(User $user){
        $this->user_edit = $user;

        $this->idu = $user->id;
        $this->usernameu = $user->username;
        $this->emailu = $user->email;
        $this->no_hpu = $user->no_hp;
        $this->statusu = $user->status;
        
        $this->edit = true;
    }

    public function konfirDelete ($id){
        $this->user_id = $id;
        $user = User::find($id);
        $this->dispatch('konfirmasi-hapus', ['nama' => $user->username, 'jenis' => 'User']);
    }

    public function deleteUser(){
        try {
            DB::beginTransaction();
            $user = User::find($this->user_id);
            
            if($user->status == 'siswa'){
                $siswa = Siswa::where('user_id', $user->id)->first();
                $siswa->user_id = 1;
                $siswa->save();
            }elseif ($user->status == 'guru') {
                $guru = Guru::where('user_id', $user->id)->first();
                $guru->user_id = 1;
                $guru->save();
            }else{
                $pegawai = Petugas::where('user_id', $user->id)->first();
                $pegawai->user_id = 1;
                $pegawai->save();
            }

            $user->delete();

            $this->dispatch('close-hapus');
            $this->dispatch('success', ['pesan' => 'Data user berhasil dihapus!']);
            DB::commit();
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
        }
    }
    public function render()
    {
        return view('livewire.tabel-user');
    }
}
