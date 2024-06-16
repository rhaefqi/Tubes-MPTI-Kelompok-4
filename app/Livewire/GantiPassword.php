<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class GantiPassword extends Component
{   
    #[Validate]
    public $old_password;

    #[Validate]
    public $new_password;

    #[Validate]

    public $confirm_password;
    public $userId;
    public $berhasilUpdate;
    public $pesan;

    #[On('berhasil-update')]
    public function berhasilEdit(){
        sleep(1);
        $this->berhasilUpdate = false;
        return Redirect::route('profile');
    }

    protected function rules()
    {
        return [
            'old_password' => ['required'],
            'new_password' => ['required','min:8','regex:/[0-9]/'],
            'confirm_password' => ['required','min:8','same:new_password','regex:/[0-9]/']
        ];
    }

    protected function messages()
    {
        return [
            'old_password.required' => 'Kolom password harus diisi.',
            'new_password.required' => 'Kolom password baru Anda harus diisi.',
            'new_password.min' => 'Password harus minimal 8 karakter.',
            'new_password.regex' => 'Password harus terdiri minimal satu angka.',
            'confirm_password.required' => 'Kolom konfirmasi password harus diisi.',
            'confirm_password.min' => 'Password harus minimal 8 karakter.',
            'confirm_password.same' => 'Konfirmasi password Anda tidak sama dengan password baru.',
            'confirm_password.regex' => 'Password harus terdiri minimal satu angka.'
        ];
    }

    public function mount()
    {    
        // $andy;
        $user = Auth::user();
        $this->userId = $user->id;
    }

    public function gantiPassword()
    {
        $this->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|regex:/[0-9]/',
            'confirm_password' => 'required|min:8|same:new_password|regex:/[0-9]/',
        ]);

        $user = User::find($this->userId);
        
        if (Hash::check($this->old_password, $user->password)) {
            $user->password = Hash::make($this->new_password);
            $user->save();

            event(new Registered($user));

            $this->berhasilUpdate = true;
            $this->pesan = 'Password berhasil diubah';
            $this->dispatch('berhasil-update');

        } else {
            session()->flash('error', 'Old password is incorrect.');
        }
    }

    public function render()
    {
        return view('livewire.ganti-password');
    }
}
