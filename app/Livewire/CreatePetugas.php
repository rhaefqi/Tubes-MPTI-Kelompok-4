<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Petugas;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Registered;

class CreatePetugas extends Component
{
    use WithPagination;

    #[Validate('required|regex:/^[^\*\'\"\-]+$/|max:255')]
    public $nama_petugas;

    #[Validate('required')]
    public $jenis_kelamin_petugas;

    public $username;
    public $email;
    public $no_hp;
    public $password;
    public $konfirmasi_password;


    public function createPetugas(){
        // $this->validateOnly('nama', 'jenisKelamin');
        DB::beginTransaction();
        try {
            $validated = $this->validate();
            $validated += $this->validate([
                'username' => ['required', 'min:5', 'max:15', 'unique:users', 'regex:/^[^\s]+$/'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'no_hp' => ['required', 'numeric', 'min_digits:10', 'max_digits:13'],
                'password' => ['required', 'same:konfirmasi_password', 'min:8', 'max:255'],
                'konfirmasi_password' => ['required', 'same:password', 'min:8', 'max:255'],
            ], $this->pesan());
            // dd($validated);

            //user
            $user['username'] = $validated['username'];
            $user['email'] = $validated['email'];
            $user['no_hp'] = $validated['no_hp'];
            $user['password'] = bcrypt($validated['password']);
            $userOk = User::create($user);
            $userId = $userOk->id;

            //petugas
            $petugas['nama'] = $validated['nama_petugas'];
            $petugas['jenis_kelamin'] = $validated['jenis_kelamin_petugas'];
            $petugas['user_id'] = $userId;
            Petugas::create($petugas);

            event(new Registered($userOk));

            $this->reset('nama_petugas', 'jenis_kelamin_petugas');
            $this->dispatch('success', ['pesan' => 'Data petugas berhasil ditambahkan']);
            $this->dispatch('close-input');
            $this->dispatch('petugas-created');
            DB::commit();
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
        }
        

        // return redirect()->route('petugas.kelola');

        
        // dd(Log::info('Reset method called')); 
        
        // session()->flash('success', 'Data petugas berhasil ditambahkan!');    

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
    public function render()
    {
        return view('livewire.create-petugas');
    }
}
