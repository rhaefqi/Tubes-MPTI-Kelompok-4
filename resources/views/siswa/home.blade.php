@extends('layouts.main')

@section('title', 'Perpustakaan Amaliyah | Beranda')

@section('content')
<div class="flex flex-col lg:flex-row w-full md:max-w-screen-lg mx-auto gap-5 my-10">
    <div class="flex flex-col lg:w-3/5 w-full px-2 lg:px-0 gap-5">
       <div class="border border-[#245237] rounded-lg lg:p-10 p-5">
            <div class="flex justify-between">
                <div class="flex flex-col gap-5">
                    <div class="flex flex-col text-[#245237]">
                        <p class="lg:text-3xl text-xl font-semibold">Halo, {{ auth()->user()->status == 'siswa' ? auth()->user()->siswa->nama : auth()->user()->guru->nama }} !</p>
                        <p class="font-semibold">Selamat datang di Perpustakaan Amaliyah</p>
                    </div>
                    <div class="flex lg:gap-32 gap-10">
                        <div class="flex flex-col text-[#328754]">
                            <p class="font-bold text-sm">Jumlah Peminjaman</p>
                            <div class="flex justify-center items-center gap-5">
                                <span class="mdi mdi-book-open-blank-variant-outline lg:text-6xl text-3xl"></span>
                                <p class="font-bold text-2xl">{{ $pinjam }}</p>
                                <p></p>
                            </div>
                        </div>
                        <div class="flex flex-col text-[#204731]">
                            <p class="font-bold text-sm">Jumlah Kunjungan</p>
                            <div class="flex justify-center items-center gap-5">
                                <span class="mdi mdi-library-outline lg:text-6xl text-3xl"></span>
                                <p class="font-bold text-2xl">{{ $kunjung }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex text-[#245237] hover:text-[#F7D914]">
                        <p class="font-normal">Ingin membaca hari ini? &nbsp;</p> 
                        <a href="{{ route('perpus') }}" class="font-bold">Cari Buku</a>
                    </div>
                </div>
                <div class="lg:hidden hidden md:flex">
                    <img src="{{ asset('assets/img/cari.jpg') }}" class="brightness-50 h-44 rounded-lg" alt="">
                </div>
            </div>
        </div>
        <div class="border border-1 border-black rounded-lg p-5">
            @livewire('filter-pinjam')     
        </div>
    </div>
    <div class="flex flex-col lg:w-2/5 w-full px-2 lg:px-0 gap-5">
        <div class="hidden lg:flex border bg-[#245237] rounded-lg py-3 px-5">
            <div class="flex flex-col gap-2">
                <div class="flex gap-10">
                    <div class="flex flex-col gap-4">
                        <div class="flex">
                            <div class="bg-white rounded-full text-[#245237] text-sm font-bold px-10 py-1">Siswa</div>
                        </div>
                        <div class="flex flex-col">
                            <p class="text-white text-xl font-semibold">
                                {{ auth()->user()->status == 'siswa' ? auth()->user()->siswa->nama : auth()->user()->guru->nama }}
                            </p>
                            <p class="text-white text-base font-medium">
                                {{ auth()->user()->status == 'siswa' ? auth()->user()->siswa->nisn : auth()->user()->guru->nip }}
                            </p>
                        </div>
                    </div>
                    <a href="{{ route('profile') }}" class="flex py-3 px-2">
                        <img class="rounded-full w-[100px] h-[100px]" src="{{ auth()->user()->photo_profile == null ? asset('assets/img/fadillah.jpg') : asset(auth()->user()->photo_profile) }}">
                    </a>
                </div>
                <div class="flex flex-col gap-2">
                    <div class="flex-grow border-t border-gray-400"></div>
                    <div class="text-white hover:underline">
                        <a href="{{route('profile')}}"><span class="mdi mdi-book-open-blank-variant-outline"></span> Lihat Riwayat Peminjaman</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="border border-[#245237] rounded-lg p-5">
            <div class="flex flex-col gap-2">
               <div class="flex">
                    <p class="text-2xl text-gray-500 font-semibold">Baru Ditambahkan</p>
               </div>
               @foreach ($barus as $baru)
               <div class="flex gap-2">
                <div class="flex w-2/5 md:w-28">
                    <img src="{{ asset($baru->sampul_buku) }}" class="w-24 h-36 rounded-md">
                </div>
                <div class="flex flex-col w-3/5">
                        {{-- Baru ditambahkan  --}}
                    <div class="flex flex-col lg:gap-2 gap-0">
                        <p class="md:text-[20px] text-[15px] font-medium">{{ $baru->judul }}</p>
                        <p class="md:text-[15px] text-[10px] font-normal">
                            {{ $baru->deskripsi }}
                        </p>
                    </div>
                </div>
               </div>
                @endforeach
            </div>
            </div>
        </div>
    </div>
</div>
@endsection