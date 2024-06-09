<?php

namespace App\Livewire;

use App\Models\Guru;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Petugas;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class CreateUser extends Component
{
    public $username;
    public $email;
    public $no_hp;
    public $password;
    public $konfirmasi_password;
    public $status;
    public $nama;
    public $jenis_kelamin_petugas;
    public $nis_nip;
    public $disabled;
    public $proses = false;

    public $konfirmasi = false;

    public function mount()
    {
        $this->disabled = 0;
    }

    public function batalCreate(){
        if ($this->status != null || 
            $this->username != null || 
            $this->email != null || 
            $this->no_hp != null || 
            $this->password != null || 
            $this->konfirmasi_password != null) {
        
            $this->konfirmasi = true;
        }else{
            $this->dispatch('close-input');
            $this->reset('status', 'username', 'email', 'no_hp', 'password', 'konfirmasi_password', 'nama', 'nis_nip', 'jenis_kelamin_petugas');
            $this->resetValidation();
            $this->disabled = 0;
        }
    }
    public function afterConfirm($temp){
        // dd($temp);
        if ($temp == 'hapus') {
            $this->dispatch('close-input');
            $this->reset('status', 'username', 'email', 'no_hp', 'password', 'konfirmasi_password', 'nama', 'nis_nip', 'jenis_kelamin_petugas');
            $this->resetValidation();
            $this->disabled = 0;
            $this->konfirmasi = false;
        }else{
            $this->konfirmasi = false;
        }
    }

    public function createUser()
    {
        // dd('ahh');
        
        // die();
        $validated = $this->validate([
            'username' => ['required', 'min:5', 'max:15', 'unique:users', 'regex:/^[^\s]+$/'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'no_hp' => ['required', 'numeric', 'min_digits:10', 'max_digits:13'],
            'password' => ['required', 'same:konfirmasi_password', 'min:8', 'max:255'],
            'konfirmasi_password' => ['required', 'same:password', 'min:8', 'max:255'],
            'status' => 'required',
        ], $this->pesan());


        if ($this->disabled == 1) {
            $this->validate([
                'nama' => 'required',
                'jenis_kelamin_petugas' => 'required',
            ]);
        }else if($this->disabled == 2) {
            $this->validate([
                'nis_nip' => ['required', 'numeric'],
            ]);
        }

        $this->proses = true;

        DB::beginTransaction();
        try {
            $user['username'] = $this->username;
            $user['email'] = $this->email;
            $user['no_hp'] = $this->no_hp;
            $user['password'] = Hash::make($this->password);
            $user['status'] = $this->status;
            
            $userOk = User::create($user);
            // dd($userOk);
            $userId = $userOk->id;


            // dd($userId);
            if ($this->disabled == 1) {
                $petugas['nama'] = $this->nama;
                $petugas['jenis_kelamin'] = $this->jenis_kelamin_petugas;
                $petugas['user_id'] = $userId;

                Petugas::create($petugas);
            }else if($this->disabled == 2) {
                if ($this->status == 'siswa') {
                    Siswa::find($this->nis_nip)->update(['user_id' => $userId]);
                }else{
                    Guru::find($this->nis_nip)->update(['user_id' => $userId]);
                }
            } 


            event(new Registered($userOk));
            // throw new Exception('Gagal');
            DB::commit();


            $this->reset('status', 'username', 'email', 'no_hp', 'password', 'konfirmasi_password', 'nama', 'nis_nip', 'jenis_kelamin_petugas');
            $this->resetValidation();
            $this->disabled = 0;

            $this->dispatch('success', ['pesan' => 'Data User berhasil ditambahkan']);
            $this->dispatch('close-input');
            $this->dispatch('user-created');
        } catch (\Exception $e) {
            DB::rollback();
        }

        $this->proses = false;

        
        // dd($user, $petugas);


        // dd($this);
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
            'password.required' => 'Password harus diisi.',
            'password.same' => 'Password dan konfirmasi password tidak cocok.',
            'password.min' => 'Password harus terdiri dari minimal 8 karakter.',
            'password.max' => 'Password maksimal 255 karakter.',
            'konfirmasi_password.required' => 'Konfirmasi Password harus diisi.',
            'konfirmasi_password.same' => 'Konfirmasi Password harus sama dengan Password.',
            'konfirmasi_password.min' => 'Konfirmasi Password harus terdiri dari minimal 8 karakter.',
            'konfirmasi_password.max' => 'Konfirmasi Password maksimal 255 karakter.',
            'status.required' => 'Status harus diisi.',
        ];
    }

    public function checkStatus()
    {
        if ($this->status == 'pegawai') {
            $this->disabled = 1;
        }else if($this->status == 'guru' || $this->status == 'siswa') {
            $this->disabled = 2;
        }else{
            $this->disabled = 0;
        }
        // dd($this->status);
    }
    public function render()
    {
        return view('livewire.create-user');
    }
}
