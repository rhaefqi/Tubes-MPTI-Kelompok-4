<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class CreateStaff extends Component
{

    public $konfirmasi = false;

    #[Validate('required|min:5|max:15|unique:users|regex:/^[^\s]+$/')]
    public $username;

    #[Validate('required|string|lowercase|email|max:255|unique:'.User::class)]
    public $email;

    #[Validate('required|numeric|min_digits:10|max_digits:13')]
    public $no_hp;

    #[Validate('required|same:konfirmasi_password|min:8|max:255')]
    public $password;

    #[Validate('required|same:password|min:8|max:255')]
    public $konfirmasi_password;

    public $proses = false;

    protected $messages = [
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

    public function createStaff()
    {
        // dd('ahh');
        
        // die();
        $validated = $this->validate([
            'username' => ['required', 'min:5', 'max:15', 'unique:users', 'regex:/^[^\s]+$/'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'no_hp' => ['required', 'numeric', 'min_digits:10', 'max_digits:13'],
            'password' => ['required', 'same:konfirmasi_password', 'min:8', 'max:255'],
            'konfirmasi_password' => ['required', 'same:password', 'min:8', 'max:255'],
        ], $this->messages);


        // $this->proses = true;

        DB::beginTransaction();
        try {
            $user['username'] = $this->username;
            $user['email'] = $this->email;
            $user['status'] = 'staff';
            $user['no_hp'] = $this->no_hp;
            $user['password'] = Hash::make($this->password);
            
            $userOk = User::create($user);

            event(new Registered($userOk));
            DB::commit();


            $this->reset('username', 'email', 'no_hp', 'password', 'konfirmasi_password');
            $this->resetValidation();

            $this->dispatch('success', ['pesan' => 'Data Staff berhasil ditambahkan']);
            $this->dispatch('close-input');
            $this->dispatch('staff-created');
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
        }

        $this->proses = false;
    }

    public function batalCreate(){
        if (
            $this->username != null || 
            $this->email != null || 
            $this->no_hp != null || 
            $this->password != null || 
            $this->konfirmasi_password != null) {
        
            $this->konfirmasi = true;
        }else{
            $this->dispatch('close-input');
            $this->reset('username', 'email', 'no_hp', 'password', 'konfirmasi_password');
            $this->resetValidation();
        }
    }
    public function afterConfirm($temp){
        // dd($temp);
        if ($temp == 'hapus') {
            $this->dispatch('close-input');
            $this->reset('username', 'email', 'no_hp', 'password', 'konfirmasi_password');
            $this->resetValidation();
            $this->konfirmasi = false;
        }else{
            $this->konfirmasi = false;
        }
    }
    public function render()
    {
        return view('livewire.create-staff');
    }
}
