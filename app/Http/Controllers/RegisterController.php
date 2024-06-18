<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Siswa;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function sendTestEmail()
    {
        $details = [
            'title' => 'Test Email from MyApp',
            'body' => 'This is a test email using Mailtrap.'
        ];

        Mail::to('recipient@example.com')->send(new SendMail($details));

        return response()->json(['message' => 'Test email sent successfully!']);
    }
    public function store(Request $request){
        $validated = $request->validate([
            'username' => ['required', 'min:5', 'max:15', 'unique:users', 'regex:/^[^\s]+$/'],
            'status' => ['required'],
            'nisn_nip' => ['required', 'min_digits:9', 'max_digits:10', 'numeric'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'no_hp' => ['required', 'min_digits:10', 'max_digits:13', 'numeric'],
            'password' => ['required', 'same:konpassword', 'min:8', 'max:255'],
            'konpassword' => ['required', 'same:password', 'min:8', 'max:255']
        ], ['username.regex' => 'Username tidak boleh mengandung spasi.']);

        
        // $password = Hash::make($validated['password']);
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        
        if($validated['status'] = 'siswa'){
            $siswa = Siswa::find($validated['nisn_nip']);
            $siswa->update(['user_id' => $user->id]);
        }else{
            $guru = Guru::find($validated['nisn_nip']);
            $guru->update(['user_id' => $user->id]);
        }

        try {
            event(new Registered($user));
        } catch (\Throwable $th) {
            echo $th;
        }

        return redirect('/login')->with('success', 'Registrasi akun berhasil');

        // dd($tes);
    }
}
