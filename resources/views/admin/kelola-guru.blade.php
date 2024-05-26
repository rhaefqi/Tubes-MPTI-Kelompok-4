@extends('layouts.main-admin')

@section('container')
<main class="mb-10">
    <div class="flex justify-between mt-8">
        <h1 class="text-primary font-open font-bold text-5xl mt-5 ml-8">
            <i class="fa-solid fa-chalkboard-user"></i>
            <span>Guru</span>
        </h1>
        <div class="mx-20 mt-10">
            <x-input-modal title="Tambah Data Guru">
                <x-slot:body>
                    <livewire:create-guru/>
                </x-slot>
            </x-input-modal>

            <button x-data x-on:click="$dispatch('open-input')" class="bg-primary text-white font-semibold text-center rounded-md px-9 py-2">
                Tambah
            </button>
        </div>
    </div>
    <div class="flex justify-center mt-10">
        <div class="mx-10 w-full border-secondary border-[3px] rounded-lg overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="text-center bg-primary text-white text-base">
                    <th class="border-r-[3px] border-secondary py-1">NIP</th>
                    <th class="border-r-[3px] border-secondary">Nama</th>
                    <th class="border-r-[3px] border-secondary">L/P</th>
                    <th class="border-r-[3px] border-secondary">Tingkat</th>
                    <th class="border-r-[3px] border-secondary">Username</th>
                    <th class="border-secondary">Action</th>
                </tr>
            </thead>
            <tbody class="">
                @for ($i = 1; $i <= 20; $i++)
                    <tr class="text-center font-semibold {{ $i % 2 == 0 ? 'bg-[#F5f5f5]' : 'bg-gray-200' }}">
                        <td class="border-r-[3px] border-secondary py-[3px]">221402031</td>
                        <td class="border-r-[3px] border-secondary">Rifqi Jabrah Rhae</td>
                        <td class="border-r-[3px] border-secondary">Laki-Laki</td>
                        <td class="border-r-[3px] border-secondary">MA</td>
                        <td class="border-r-[3px] border-secondary">Fortyche</td>
                        <td class="">
                            <i class="fa-solid fa-pen-to-square scale-125 text-green-500 mr-3"></i>
                                <a href="">
                                    <i class="fa-solid fa-trash-can scale-125 text-red-500"></i>
                                </a>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</main>

@endsection