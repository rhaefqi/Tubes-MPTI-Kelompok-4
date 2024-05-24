@extends('layouts.main-admin')

@section('container')
<main class="mb-10">
    <div class="flex justify-between mt-8">
        <h1 class="text-primary font-open font-bold text-5xl mt-5 ml-8">
            Guru
        </h1>
        <div class="mx-20 mt-10">
            <x-input-modal title="Tambah Data Guru">
            </x-input-modal>

            <button x-data x-on:click="$dispatch('open-input')" class="bg-primary text-white font-semibold text-center rounded-md px-9 py-2">
                Tambah
            </button>
        </div>
    </div>
    <div class="flex justify-center mt-10">
        <table class="w-full mx-10">
            <thead>
                <tr class="text-center border-b-[3px] border-primary text-primary">
                    <th class="border-r-[3px] border-primary">NIP</th>
                    <th class="border-r-[3px] border-primary">Nama</th>
                    <th class="border-r-[3px] border-primary">L/P</th>
                    <th class="border-r-[3px] border-primary">Tingkat</th>
                    <th class="border-r-[3px] border-primary">Username</th>
                    <th class="border-primary">Action</th>
                </tr>
            </thead>
            <tbody class="">
                @for ($i = 1; $i <= 20; $i++)
                    <tr class="text-center font-semibold">
                        <td class="border-r-[3px] border-primary">221402031</td>
                        <td class="border-r-[3px] border-primary">Rifqi Jabrah Rhae</td>
                        <td class="border-r-[3px] border-primary">Laki-Laki</td>
                        <td class="border-r-[3px] border-primary">MA</td>
                        <td class="border-r-[3px] border-primary">Fortyche</td>
                        <td class="">221402031</td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</main>

@endsection