@extends('layouts.main-admin')

@section('container')
    <main class="">
        {{-- {{ dd(session()->all()) }} --}}

        <div class="text-left text-primary font-open font-bold text-3xl mb-1 mt-6 mx-5">Dashboard Kepala Sekolah</div>
        <div class="text-left text-gray-600 font-open font-bold text-lg mb-1 mt-3 mx-5">"Selamat datang di Dashboard Kepala Sekolah Perpustakaan."</div>

        <livewire:dashboard-kepsek />
    </main>
@endsection
    