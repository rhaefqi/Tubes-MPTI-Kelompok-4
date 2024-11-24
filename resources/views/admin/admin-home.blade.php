@extends('layouts.main-admin')

@section('container')
    <main class="">


        <div class="text-left text-primary font-open font-bold text-4xl mb-1 mt-6 mx-5">Dashboard Administrator</div>
        <div class="text-left text-gray-600 font-open font-bold text-lg mb-3 mt-3 mx-5">"Selamat datang di Dashboard Administrator."</div>

        <livewire:dashboard-admin />
    </main>
@endsection
