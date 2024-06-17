@extends('layouts.main-pegawai')

@section('container')
<h1 class="text-primary font-open font-bold text-4xl mt-5 ml-8 text-center">
    <span>Daftar Peminjam</span>
</h1>

<livewire:alert-success />
<livewire:pengembalian-buku />
@endsection