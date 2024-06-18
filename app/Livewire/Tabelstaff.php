<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Registered;

class Tabelstaff extends Component
{
    use WithPagination;

    public $edit = false;
    public $konfirmasi = false;
    public $user_id;

    public User $user_edit;

    public $username;
    public $email;
    
    #[Validate('numeric')]
    public $no_hp;
    public $idu;

    public $gagalEdit = false;


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

    #[On('staff-created')]
    public function updateList($staff = null){

    }

    #[Computed()]
    public function staffs(){
        return User::where('status', 'staff')->paginate(20);
    }

    public function editStaff(User $user){
        $this->user_edit = $user;

        $this->idu = $user->id;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->no_hp = $user->no_hp;
        
        $this->edit = true;
        // $this->gagalEdit = true;
    }

    public function updateStaff(){
        // dd('ahh');
        $user = User::find($this->idu);
        $email = $user->email;
        $validated = $this->validate([
            'no_hp' => ['required', 'numeric', 'min_digits:10', 'max_digits:13'],
            ], $this->messages);
        // dd($validated);

        if($user->email != $this->email){
            $validated["email_verified_at"] = NULL;
            $validated += $this->validate([
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            ], $this->messages);
        }else{
            $validated["email"] = $this->email;
        }

        if($user->username != $this->username){
            $validated += $this->validate([
                'username' => ['required', 'min:5', 'max:15', 'unique:users', 'regex:/^[^\s]+$/'],
            ], $this->messages);
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
                if ($email != $this->email) {
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

    public function batalEdit(){
        
        $this->edit = false;
        $this->reset( 'username', 'email', 'no_hp');
        $this->resetValidation();
}

    public function konfirDelete ($id){
        $this->user_id = $id;
        $user = User::find($id);
        $this->dispatch('konfirmasi-hapus', ['nama' => $user->username, 'jenis' => 'User']);
    }

    public function deleteStaff(){
        try {
            DB::beginTransaction();
            $user = User::find($this->user_id);

            $user->delete();

            $this->dispatch('close-hapus');
            $this->dispatch('success', ['pesan' => 'Data staff berhasil dihapus!']);
            DB::commit();
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
        }
    }
    public function render()
    {
        return view('livewire.tabelstaff');
    }
}
