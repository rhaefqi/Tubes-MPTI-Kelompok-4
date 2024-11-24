@extends('layouts.main-pegawai')

@section('container')
<h1 class="text-primary font-open font-bold text-3xl mt-5 ml-8 text-start">
    <span>Edit Buku</span>
</h1>

<div class="container mx-auto">
    <div class="bg-white flex justify-start ml-8 w-11/12 shadow-md rounded-lg p-6">
      {{-- <h1 class="text-2xl font-bold mb-4 text-center">Tambah Buku</h1> --}}
      {{-- {{ $id }} --}}
      @livewire('edit-buku', ['id' => $id])
    </div>
  </div>
@endsection