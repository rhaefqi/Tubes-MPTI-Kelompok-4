@extends('layouts.main-admin')

@section('title', 'Kelola User | Perpustakaan Amaliyah')

@section('container')
<main class="mb-10">
    <div class="flex justify-between mt-8">
        <h1 class="text-primary font-open font-bold text-5xl mt-5 ml-8">
            <i class="fa-solid fa-user"></i>
            <span>User</span>
        </h1>
        <div class="mx-20 mt-10">
            <x-input-modal title="Tambah Data User">
                <x-slot:body>
                    <livewire:CreateUser/>
                </x-slot>
            </x-input-modal>
            <button x-data x-on:click="$dispatch('open-input')" class="bg-primary text-white font-semibold text-center rounded-md px-9 py-2">
                Tambah
            </button>
        </div>
    </div>
    <livewire:alert-success />
    <livewire:tabelUser />
</main>

@endsection