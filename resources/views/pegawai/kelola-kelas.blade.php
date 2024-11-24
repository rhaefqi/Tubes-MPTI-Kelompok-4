@extends('layouts.main-pegawai')

@section('container')
<h1 class="text-primary font-open font-bold text-3xl mt-5 ml-8 text-start">
    <span>Kelola Kategori Buku</span>
</h1>
<livewire:alert-success />
<livewire:tabel-kategori />
@endsection