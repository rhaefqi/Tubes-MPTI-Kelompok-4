@extends('layouts.main-pegawai')

@section('container')

<div class="container mx-auto py-6">
    
  <div class="flex justify-center">
      {{-- <h1 class="text-2xl font-bold mb-4 text-center">Tambah Buku</h1> --}}
      @livewire('create-buku')
  </div>
    
</div>
@endsection
