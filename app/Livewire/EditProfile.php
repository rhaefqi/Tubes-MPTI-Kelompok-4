<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfile extends Component
{
    use WithFileUploads;

    #[Validate] 
    public $username;

    #[Validate] 
    public $email;

    #[Validate] 
    public $telp;

    #[Validate] 
    public $photo;
    
    public $userId;
    public $gagalEdit = false;
    public $berhasilUpdate = false;
    public $pesan;

    #[On('tutup-gagal')]
    public function tutupGagal(){
        sleep(1);
        $this->gagalEdit = false;
        return Redirect::route('profile');
    }

    #[On('berhasil-update')]
    public function berhasilEdit(){
        sleep(1);
        $this->berhasilUpdate = false;
        return Redirect::route('profile');
    }

    protected function rules()
    {
        return [
            'username' => ['required', 'min:5', 'max:15', 'regex:/^[^\s]+$/', Rule::unique('users')->ignore($this->userId)],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($this->userId)],
            'telp' => ['required', 'numeric', 'min_digits:11', 'max_digits:13'],
            'photo' => ['nullable', 'mimes:jpeg,jpg,png,gif', 'max:10000'],
        ];
    }

    protected function messages()
    {
        return [
            'username.required' => 'Username harus diisi.',
            'username.min' => 'Username harus terdiri minimal 5 karakter.',
            'username.max' => 'Username harus terdiri maksimal 15 karakter.',
            'username.unique' => 'Username sudah pernah digunakan.',
            'username.regex' => 'Username tidak boleh mengandung spasi.',
            'email.required' => 'Email harus diisi.',
            'email.string' => 'Email harus berupa string.',
            'email.lowercase' => 'Email harus menggunakan huruf kecil.',
            'email.email' => 'Email tidak valid.',
            'email.max' => 'Email maksimal 255 karakter.',
            'email.unique' => 'Email sudah terdaftar.',
            'telp.required' => 'Nomor HP harus diisi.',
            'telp.numeric' => 'Nomor HP harus berupa angka.',
            'telp.min_digits' => 'Nomor HP harus terdiri dari minimal 11 digit.',
            'telp.max_digits' => 'Nomor HP harus terdiri dari maksimal 13 digit.',
            'photo.mimes' => 'Photo harus berformat jpeg, png, jpg, dan gif',
        ];
    }

    public function mount()
    {
        $user = Auth::user();
        $this->username = $user->username;
        $this->email = $user->email;
        $this->telp = $user->no_hp;
        $this->userId = $user->id;
    }

    public function editProfile()
    {
        $validatedData = $this->validate([
            'username' => 'required|min:5|max:15|regex:/^[^\s]+$/|unique:users,username,' . $this->userId,
            'email' => 'required|string|lowercase|email|max:255|unique:users,email,' . $this->userId,
            'telp' => 'required|numeric|min_digits:11|max_digits:13',
            'photo' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
        ], $this->messages());

        $user = User::find($this->userId);

        $changes = false;

        if ($this->username != $user->username) {
            $user->username = $validatedData['username'];
            $changes = true;
        }

        if ($this->email != $user->email) {
            $user->email = $validatedData['email'];
            $user->email_verified_at = null;
            $changes = true;
        }

        if ($this->telp != $user->no_hp) {
            $user->no_hp = $validatedData['telp'];
            $changes = true;
        }

        if ($this->photo) {
            $path = $this->photo->store('public/assets/img');
            $user->photo_profile = 'storage/assets/img/' . basename($path);
            $changes = true;
        }

        if (!$changes) {
            $this->gagalEdit = true;
            $this->dispatch('tutup-gagal');

        } else {
            $user->save();

            event(new Registered($user));
            $this->berhasilUpdate = true;
            $this->pesan = 'Data pengguna berhasil diubah';
            $this->dispatch('berhasil-update');

            // dd($this->berhasilUpdate);
            // return Redirect::route('profile');;
        }
    }

    public function render()
    {
        return view('livewire.edit-profile');
    }
}
