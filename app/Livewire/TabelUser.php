<?php

namespace App\Livewire;

use App\Models\Guru;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Petugas;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Queue\Listener;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Registered;

class TabelUser extends Component
{
    use WithPagination;
    public User $user_edit;

    public $username;
    public $email;
    
    #[Validate('numeric')]
    public $no_hp;
    public $status;
    public $idu;
    public $edit = false;
    public $konfirmasi = false;
    public $gagalEdit = false;
    public $user_id;

    // protected $listeners = ['tutup-gagal' => 'tutupGagal'];
    #[On('user-created')]
    public function updateList($user = null){

    }

    #[On('tutup-gagal')]
    public function tutupGagal(){
        sleep(1);
        $this->gagalEdit = false;
    }
    

    #[Computed()]
    public function users(){
        return User::whereIn('status', ['siswa', 'pegawai', 'guru'])
                    ->latest()
                ->paginate(20);
    }

    public function editUser(User $user){
        $this->user_edit = $user;

        $this->idu = $user->id;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->no_hp = $user->no_hp;
        $this->status = $user->status;
        
        $this->edit = true;
        // $this->gagalEdit = true;
    }

    public function updateUser(){
        // dd('ahh');
        $user = User::find($this->idu);
        $email = $user->email;
        $validated = $this->validate([
            'no_hp' => ['required', 'numeric', 'min_digits:10', 'max_digits:13'],
            ], $this->pesan());
        // dd($validated);

        if($user->email != $this->email){
            $validated["email_verified_at"] = NULL;
            $validated += $this->validate([
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            ], $this->pesan());
        }else{
            $validated["email"] = $this->email;
        }

        if($user->username != $this->username){
            $validated += $this->validate([
                'username' => ['required', 'min:5', 'max:15', 'unique:users', 'regex:/^[^\s]+$/'],
            ], $this->pesan());
        }else {
            $validated["username"] = $this->username;
        }
        // dd($validated);

        if(
            $user->username == $this->username && 
            $user->email == $this->email && 
            $user->no_hp == $this->no_hp 
            ){
                $this->gagalEdit = true;
                $this->dispatch('tutup-gagal');
        }else{
            try {
                DB::beginTransaction();
                User::where('id', $user->id)->update($validated);
                // User::find($user->id)->email_verified_at = null;
                // dd(User::find($user->id));
                if ($email != $this->email) {
                    // dd($user->email_verified_at);
                    event(new Registered(User::find($user->id)));
                }
                $this->dispatch('success', ['pesan' => 'Data user berhasil diubah!']);
                $this->edit = false;
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
            }
        }
    }

    

    public function pesan(){
        return [
            'username.required' => 'Username harus diisi.',
            'username.min' => 'Username harus terdiri dari minimal 5 karakter.',
            'username.max' => 'Username harus terdiri dari maksimal 15 karakter.',
            'username.unique' => 'Username sudah terdaftar.',
            'username.regex' => 'Username tidak boleh mengandung spasi.',
            'email.required' => 'Email harus diisi.',
            'email.string' => 'Email harus berupa string.',
            'email.lowercase' => 'Email harus menggunakan huruf kecil.',
            'email.email' => 'Email tidak valid.',
            'email.max' => 'Email maksimal 255 karakter.',
            'email.unique' => 'Email sudah terdaftar.',
            'no_hp.required' => 'Nomor HP harus diisi.',
            'no_hp.numeric' => 'Nomor HP harus berupa angka.',
            'no_hp.min_digits' => 'Nomor HP harus terdiri dari minimal 10 digit.',
            'no_hp.max_digits' => 'Nomor HP harus terdiri dari maksimal 13 digit.',
            'status.required' => 'Status harus diisi.',
        ];
    }

    public function batalCreate(){
        
            $this->edit = false;
            $this->reset('status', 'username', 'email', 'no_hp');
            $this->resetValidation();
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
