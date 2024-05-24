@extends('layouts.main-admin')

@section('container')
<main class="mb-10">
    <div class="flex justify-between mt-8">
        <h1 class="text-primary font-open font-bold text-5xl mt-5 ml-8">
            User
        </h1>
        <div class="mx-20 mt-10">
            <x-input-modal title="Tambah Data User">
            </x-input-modal>
            <button x-data x-on:click="$dispatch('open-input')" class="bg-primary text-white font-semibold text-center rounded-md px-9 py-2">
                Tambah
            </button>
        </div>
    </div>
    <div class="flex justify-center mt-10">
        <table class="w-full mx-10">
            <thead>
                <tr class="text-center text-primary">
                    <th class="border-r-[3px] border-b-[3px] border-primary">Username</th>
                    <th class="border-r-[3px] border-b-[3px] border-primary">Email</th>
                    <th class="border-r-[3px] border-b-[3px] border-primary">No HP</th>
                    <th class="border-r-[3px] border-b-[3px] border-primary">Status</th>
                    <th class="border-b-[3px] border-primary">Action</th>
                </tr>
            </thead>
            <tbody class="">
                @for ($i = 1; $i <= 20; $i++)
                    <tr class="text-center font-semibold">
                        <td class="border-r-[3px] border-primary">Fortyche</td>
                        <td class="border-r-[3px] border-primary">fortyche@gmail.com</td>
                        <td class="border-r-[3px] border-primary">083167409073</td>
                        <td class="border-r-[3px] border-primary">Siswa</td>
                        <td class=""></td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</main>

@endsection