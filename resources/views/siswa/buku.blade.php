@extends('layouts.main')

@section('content')
<div class="flex flex-col w-full md:max-w-screen-lg mx-auto gap-10 my-10">
    @include('layouts.search')
    <div class="flex flex-wrap px-11 gap-2 justify-start">
        <a href="{{ route('detail.buku') }}" class="flex flex-col border border-1 border-opacity-50 border-[#245237] rounded-lg w-28 md:w-32 h-52 md:h-60 items-center py-2">
            <img src="{{ asset('img/novel.jpg') }}" alt="" class="w-24 md:w-28 h-36 md:h-40 rounded-md">

            <div class="flex justify-start w-full px-2">
                <div class="flex flex-col text-[10px] md:text-[14px]">
                    <p class="font-semibold">Laskar Pelangi</p>
                    <p>Andrea Hirata</p>
                    <div class="bg-[#F0C001] font-bold text-center rounded-md">Tersedia: 2</div>
                </div>
            </div>
        </a>

        <a href="{{ route('detail.buku') }}" class="flex flex-col border border-1 border-opacity-50 border-[#245237] rounded-lg w-28 md:w-32 h-52 md:h-60 items-center py-2">
            <img src="{{ asset('img/novel.jpg') }}" alt="" class="w-24 md:w-28 h-36 md:h-40 rounded-md">

            <div class="flex justify-start w-full px-2">
                <div class="flex flex-col text-[10px] md:text-[14px]">
                    <p class="font-semibold">Laskar Pelangi</p>
                    <p>Andrea Hirata</p>
                    <div class="bg-[#F0C001] font-bold text-center rounded-md">Tersedia: 2</div>
                </div>
            </div>
        </a>

        <a href="{{ route('detail.buku') }}" class="flex flex-col border border-1 border-opacity-50 border-[#245237] rounded-lg w-28 md:w-32 h-52 md:h-60 items-center py-2">
            <img src="{{ asset('img/novel.jpg') }}" alt="" class="w-24 md:w-28 h-36 md:h-40 rounded-md">

            <div class="flex justify-start w-full px-2">
                <div class="flex flex-col text-[10px] md:text-[14px]">
                    <p class="font-semibold">Laskar Pelangi</p>
                    <p>Andrea Hirata</p>
                    <div class="bg-[#F0C001] font-bold text-center rounded-md">Tersedia: 2</div>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection

