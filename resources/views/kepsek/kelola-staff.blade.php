@extends('layouts.main-admin')

@section('title', 'Kelola Staff | Perpustakaan Amaliyah')

@section('container')
<main class="mb-10">
    <div class="flex justify-between mt-8">
        <h1 class="text-primary font-open font-bold text-4xl mt-5 ml-8">
            <i class="fa-solid fa-user-gear"></i>
            <span>Staff</span>
        </h1>
        <div class="mx-20 mt-10">
            <x-input-modal title="Tambah Data Staff">
                <x-slot:body>
                    <livewire:create-staff />
                </x-slot>
            </x-input-modal>
            {{-- <livewire:edit-petugas /> --}}

            <button x-data x-on:click="$dispatch('open-input')" class="bg-primary text-white font-semibold text-center rounded-md px-9 py-2">
                Tambah
            </button>
        </div>
    </div>
    <livewire:alert-success />
    <livewire:tabelstaff />
</main>

@endsection