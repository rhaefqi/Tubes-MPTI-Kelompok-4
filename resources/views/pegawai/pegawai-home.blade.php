@extends('layouts.main-pegawai')

@section('container')
    <main class="">
        {{-- {{ dd(session()->all()) }} --}}

        <div class="text-left text-primary font-open font-bold text-3xl mb-1 mt-3 mx-5">Dashboard Pegawai</div>
        <div class="text-left text-gray-600 font-open font-bold text-lg mb-1 mt-3 mx-5">"Selamat datang di Dashboard Pegawai Perpustakaan. Di sini Anda dapat memantau jumlah total buku, aktivitas peminjaman, dan data pengunjung perpustakaan dengan mudah."</div>

        <livewire:dashboard-pegawai />
        
    </main>
@endsection
