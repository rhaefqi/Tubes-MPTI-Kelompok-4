@extends('layouts.main-pegawai')

@section('container')
<h1 class="text-primary font-open font-bold text-5xl mt-5 ml-8">
    <i class="fa-solid fa-chalkboard-user"></i>
    <span>Absensi</span>
</h1>

<livewire:tabel-absensi />

{{-- <div class="flex flex-col grid-rows-3 justify-between h-full m-7 shadow-2xl bg-[#e2f6ea] border-[#245237] border-2 relative">
    <div class="flex flex-col mt-5 mb items-center h-full">
        <div class="w-full flex flex-col items-center">
            <div class="text-primary font-open font-bold text-xl m-4 text-left w-3/4">Nama :</div>
            <input type="text" id="name" class="flex w-3/4 h-9 bg-white border-[#245237] border-2 rounded-sm p-2 font-medium">
            <div id="name-warning" class="hidden text-sm text-yellow-600 mt-1">Silakan isi nama</div>
        </div>

        <div class="w-full flex flex-col items-center mt-4">
            <div class="text-primary font-open font-bold text-xl m-4 text-left w-3/4">Kategori :</div>
            <select id="category" class="flex w-3/4 h-9 bg-white border-[#245237] border-2 rounded-sm">
                <option value="">Pilih Kategori</option>
                <option value="siswa">Siswa</option>
                <option value="guru">Guru</option>
            </select>
            <div id="category-warning" class="hidden text-sm text-yellow-600 mt-1">Silakan pilih kategori</div>
        </div>

        <div class="w-full flex flex-col items-center mt-4">
            <div class="text-primary font-open font-bold text-xl m-4 text-left w-3/4">Nisn/NIP :</div>
            <input type="text" id="idNumber" class="flex w-3/4 h-9 bg-white border-[#245237] border-2 rounded-sm p-2 font-medium">
            <div id="idNumber-warning" class="hidden text-sm text-yellow-600 mt-1">Silakan isi NISN/NIP</div>
        </div>
    </div>
    
    <div class="flex flex-row items-center justify-self-end space-x-4 ml-3 mt-5">
        <button class="w-32 h-12 rounded-lg text-center ml-36 mb-8 p-2 bg-[#01CD09] border-none text-white font-bold ">
            SIMPAN
        </button>
        <button class="w-32 h-12 rounded-lg text-center mb-8 p-2 bg-[#ff4545] border-none text-white font-bold ">
            BATAL
        </button>
    </div>
</div> --}}
@endsection