<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.admin-home');   
    }
    public function showUser()
    {
        return view('admin.kelola-user');   
    }
    public function showGuru()
    {
        return view('admin.kelola-guru');   
    }
    public function showSiswa()
    {
        return view('admin.kelola-siswa');   
    }
    public function showPetugas()
    {
        return view('admin.kelola-petugas');   
    }
    public function showkelas()
    {
        return view('admin.kelola-kelas');   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
