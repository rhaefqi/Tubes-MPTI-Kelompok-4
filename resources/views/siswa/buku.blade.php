@extends('layouts.main')

@section('title', 'Buku | Perpustakaan Amaliyah')

@section('content')
<div class="flex flex-col w-full md:max-w-screen-lg mx-auto gap-7 my-10">
    @include('layouts.search')
    <div class="flex justify-end items-center gap-3 px-3">
        <p class="font-bold italic text-[#245237] hidden md:flex">Filter</p>
        <form class="">
            <select id="urutkan" class="border-1 border-[#245237] border rounded-full font-bold italic lg:text-[12px] text-[10px] text-[#245237] py-0 h-[30px] w-[100px]">
                <option value="ZA" class="font-bold italic text-[#245237]">Z-A</option>
                <option value="Dekat" class="font-bold italic text-[#245237]">Tenggat terdekat</option>
                <option value="Jauh" class="font-bold italic text-[#245237]">Tenggat terjauh</option>
            </select>
        </form>
    </div>
    <div class="flex flex-wrap px-11 gap-3 justify-center md:justify-start">

        {{-- Buku --}}
        @foreach ($bukus as $buku)    
        <a href="{{ route('detail.buku', $buku->id) }}" class="flex flex-col border border-1 border-opacity-50 border-[#245237] rounded-lg w-28 md:w-32 h-52 md:h-60 items-center py-2">
            <img src="{{ asset('assets/img/'.$buku->sampul_buku) }}" alt="" class="w-24 md:w-28 h-36 md:h-40 rounded-md">

            <div class="flex flex-col justify-start w-full px-2">
                <div class="flex flex-col text-[10px] md:text-[14px] truncate overflow-hidden">
                    <p class="font-semibold">{{ $buku->judul }}</p>
                    <p>{{ $buku->penulis }}</p>
                </div>
                <div class="bg-[#F0C001] font-bold text-[10px] md:text-[14px] text-center rounded-md">{{ $buku->jumlah_tersedia == 0 ? 'Tidak Tersedia' : 'Tersedia' }}</div>
            </div>
        </a>
        @endforeach

    </div>
</div>
@endsection

