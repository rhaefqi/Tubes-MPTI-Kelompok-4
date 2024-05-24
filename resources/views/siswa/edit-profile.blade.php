@extends('layouts.main')

@section('title', 'Edit Profile | Perpustakaan Amaliyah')


@section('content')
<div class="flex w-full justify-center md:max-w-screen-lg mx-auto my-10">
    <div class="flex flex-col border border-1 border-[#245237] rounded-lg w-2/3 items-center p-5 md:gap-6 gap-5">
        <div class="flex gap-1 w-full justify-start">
            <span class="text-xl font-semibold text-[#245237] mdi mdi-account-edit"></span>
            <p class="text-lg font-semibold text-[#245237]">
                Ubah Profile
            </p>
        </div>

        <div class="flex relative">
            <img src="{{ asset('img/pp.jpeg') }}" class="w-20 lg:w-28 h-20 lg:h-28 rounded-full" alt="">
            <button class="flex absolute -bottom-2 -right-2 drop-shadow-lg p-1 rounded-full w-8 h-8 bg-white items-center justify-center">
                <span class="text-xl mdi mdi-image-edit text-[#245237]"></span>
            </button>
        </div>

        <div class="flex flex-col md:flex-row md:gap-5 gap-4">
            <div class="flex flex-col w-full justify-start gap-3">
                <div class="flex flex-col">
                    <div class="flex">
                        <div class="text-white font-semibold text-[12px] lg:text-[15px] bg-[#245237] px-2 rounded-xl">Data Akun</div>
                    </div>
                    <div class="text-[7.5px] lg:text-[10px] font-normal italic">*Data yang dapat anda rubah untuk tampilan di website</div>
                </div>

                <div class="flex flex-col gap-2">
                    <div class="flex flex-col">
                        <label for="" class="text-[12px] lg:text-[15px] font-semibold">Username</label>
                        <input type="text" class="bg-[#F2F2F2] border border-1 border-[#245237] border-opacity-75 rounded-lg text-[12px] lg:text-[15px]  px-3 font-normal" value="andysept">
                    </div>

                    <div class="flex flex-col">
                        <label for="" class="text-[12px] lg:text-[15px]  font-semibold">Email</label>
                        <input type="email" class="bg-[#F2F2F2] border border-1 border-[#245237] border-opacity-75 rounded-lg text-[12px] lg:text-[15px]  px-3 font-normal" value="andyseptiawan@students.usu.ac.id">
                    </div>

                    <div class="flex flex-col">
                        <label for="" class="text-[12px] lg:text-[15px]  font-semibold">Nomor Telepon</label>
                        <input type="text" class="bg-[#F2F2F2] border border-1 border-[#245237] border-opacity-75 rounded-lg text-[12px] lg:text-[15px]  px-3 font-normal" value="081361775757">
                    </div>
                </div>
            </div>

            <div class="flex flex-col w-full justify-start gap-3">
                <div class="flex flex-col">
                    <div class="flex">
                        <div class="text-white font-semibold text-[12px] lg:text-[15px]  bg-[#245237] px-2 rounded-xl">Data Akun</div>
                    </div>
                    <div class="text-[7.5px] lg:text-[10px]  font-normal italic">*Data dari sekolah tidak dapat anda rubah</div>
                </div>

                <div class="flex flex-col gap-2">
                    <div class="flex flex-col">
                        <label for="" class="text-[12px] lg:text-[15px]  font-semibold">NISN</label>
                        <input type="text" class="bg-[#D9D9D9] border border-1 border-[#245237] border-opacity-75 rounded-lg text-[12px] lg:text-[15px]  px-3 font-normal" value="20040309" readonly>
                    </div>

                    <div class="flex flex-col">
                        <label for="" class="text-[12px] lg:text-[15px]  font-semibold">Nama</label>
                        <input type="email" class="bg-[#D9D9D9] border border-1 border-[#245237] border-opacity-75 rounded-lg text-[12px] lg:text-[15px]  px-3 font-normal" value="Andy Septiawan Saragih" readonly>
                    </div>

                    <div class="flex flex-col">
                        <label for="" class="text-[12px] lg:text-[15px]  font-semibold">Tingkat</label>
                        <input type="text" class="bg-[#D9D9D9] border border-1 border-[#245237] border-opacity-75 rounded-lg text-[12px] lg:text-[15px]  px-3 font-normal" value="MTs" readonly>
                    </div>

                    <div class="flex flex-col">
                        <label for="" class="text-[12px] lg:text-[15px]  font-semibold">Kelas</label>
                        <input type="text" class="bg-[#D9D9D9] border border-1 border-[#245237] border-opacity-75 rounded-lg text-[12px] lg:text-[15px]  px-3 font-normal" value="XII MIPA-1" readonly>
                    </div>

                    <div class="flex flex-col">
                        <label for="" class="text-[12px] lg:text-[15px]  font-semibold">Jenis Kelamin</label>
                        <input type="text" class="bg-[#D9D9D9] border border-1 border-[#245237] border-opacity-75 rounded-lg text-[12px] lg:text-[15px]  px-3 font-normal" value="Laki-Laki" readonly>
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