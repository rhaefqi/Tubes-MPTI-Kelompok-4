@extends('layouts.main')

@section('title', 'Ubah Sandi | Perpustakaan Amaliyah')

@section('content')
<div class="flex w-full justify-center md:max-w-screen-lg mx-auto my-10">
    <div class="flex flex-col border border-1 border-[#245237] rounded-lg w-2/3 items-center p-5 md:gap-6 gap-5">
        <div class="flex flex-col">
            <div class="flex w-full justify-center">
                <span class="text-xl font-semibold text-[#245237] mdi mdi-pencil-circle"></span>
                <p class="text-lg md:text-xl font-semibold text-[#245237]">
                    Ubah Kata Sandi
                </p>
            </div>
            <div class="flex w-full justify-center">
                <p class="text-[10px] md:text-[12px] font-normal text-opacity-50 text-center">Masukan kata sandi lama dan baru anda pastikan kata sandi baru anda cukup kuat</p>
            </div>
        </div>

        <div class="flex flex-col md:flex-row md:gap-5 gap-4">
            <div class="flex flex-col w-full justify-start gap-1 md:gap-2">
                <div class="flex flex-col">
                    <label for="old-password" class="text-xs md:text-[15px] font-semibold">Kata Sandi Lama</label>
                    <div class="flex gap-2 items-center">
                        <input type="password" id="old-password" class="bg-gray-200 border border-green-800 border-opacity-75 rounded-lg text-xs lg:text-sm px-3 font-normal" value="andysept">
                        <span id="toggle-old-password" class="text-2xl mdi mdi-eye cursor-pointer"></span>
                    </div>
                </div>
                
                <div class="flex flex-col">
                    <label for="new-password" class="text-xs md:text-[15px] font-semibold">Kata Sandi Baru</label>
                    <div class="flex gap-2 items-center">
                        <input type="password" id="new-password" class="bg-gray-200 border border-green-800 border-opacity-75 rounded-lg text-xs lg:text-sm px-3 font-normal">
                        <span id="toggle-new-password" class="text-2xl mdi mdi-eye cursor-pointer"></span>
                    </div>
                </div>
                
                <div class="flex flex-col">
                    <label for="confirm-password" class="text-xs md:text-[15px] font-semibold">Konfirmasi Kata Sandi Baru</label>
                    <div class="flex gap-2 items-center">
                        <input type="password" id="confirm-password" class="bg-gray-200 border border-green-800 border-opacity-75 rounded-lg text-xs lg:text-sm px-3 font-normal">
                        <span id="toggle-confirm-password" class="text-2xl mdi mdi-eye cursor-pointer"></span>
                    </div>
                </div>
                
            </div>
        </div>
        
        <div class="flex">
            <button class="bg-[#328754] text-white text-[12px] lg:text-[15px]  font-medium px-5 py-1 rounded-md">Simpan Perubahan</button>
        </div>
    </div>
</div>
@endsection