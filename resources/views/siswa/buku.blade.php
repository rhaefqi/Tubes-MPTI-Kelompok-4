@extends('layouts.main')

@section('title', 'Buku | Perpustakaan Amaliyah')

@section('content')
<div class="flex flex-col w-full md:max-w-screen-lg mx-auto gap-10 my-10">
    @include('layouts.search')
    <div class="flex flex-wrap px-11 gap-2 justify-start">

        {{-- Buku --}}
        @foreach ($bukus as $buku)    
        <a href="{{ route('detail.buku', $buku->id) }}" class="flex flex-col border border-1 border-opacity-50 border-[#245237] rounded-lg w-28 md:w-32 h-52 md:h-60 items-center py-2">
            <img src="{{ asset('assets/img/'.$buku->sampul_buku) }}" alt="" class="w-24 md:w-28 h-36 md:h-40 rounded-md">

            <div class="flex flex-col justify-start w-full px-2">
                <div class="flex flex-col text-[10px] md:text-[14px] truncate overflow-hidden">
                    <p class="font-semibold">{{ $buku->judul }}</p>
                    <p>{{ $buku->penulis }}</p>
                </div>
                <div class="bg-[#F0C001] font-bold text-center rounded-md">{{ $buku->jumlah_tersedia == 0 ? 'Tidak Tersedia' : 'Tersedia' }}</div>
            </div>
        </a>
        @endforeach

    </div>
</div>
@endsection

