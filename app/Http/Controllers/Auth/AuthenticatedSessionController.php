<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('login');
    }


    /**
     * Handle an incoming authentication request.
     */

    public function store(LoginRequest $request): RedirectResponse
    {
        // dd(ctype_digit($request->email));
        // if (ctype_digit($request->email) && strlen($request->email) > 10) {
        //     $user = 
        //     // dd('guru');
        // }elseif (ctype_digit($request->email) && strlen($request->email) <= 10) {
        //     // dd('siswa');
        // }else{

        // }
        $request->authenticate();

        $request->session()->regenerate();

        $role = auth()->user()->status;
        // dd($role);
        switch($role){
            case "kepala_sekolah":
                return redirect()->intended('/kepsek-home');
                break;
            case "pegawai":
                return redirect()->intended('/pegawai-home');
                break;
            case "staff":
                return redirect()->intended('/admin-home');
                break;
            default:
                return redirect()->intended(RouteServiceProvider::HOME);
                break;
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
