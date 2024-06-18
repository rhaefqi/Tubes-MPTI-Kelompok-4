<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kepsekController extends Controller
{
    public function index()
    {
        return view('kepsek.kepsek-home');
    }

    public function showStaff()
    {
        return view('kepsek.kelola-staff');
    }
}
