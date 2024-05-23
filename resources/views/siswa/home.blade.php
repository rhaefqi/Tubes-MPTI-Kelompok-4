@extends('layouts.main')

@section('content')
<div class="flex flex-col lg:flex-row w-full md:max-w-screen-lg mx-auto gap-5 my-10">
    <div class="flex flex-col lg:w-3/5 w-full px-2 lg:px-0 gap-5">
       <div class="border border-[#245237] rounded-lg lg:p-10 p-5">
            <div class="flex">
                <div class="flex flex-col gap-5">
                    <div class="flex flex-col text-[#245237]">
                        <p class="lg:text-3xl text-xl font-semibold">Halo, Andy!</p>
                        <p class="font-normal">Selamat datang di Perpustakaan Amaliyah</p>
                    </div>
                    <div class="flex lg:gap-32 gap-10">
                        <div class="flex flex-col text-[#328754]">
                            <p class="font-bold text-sm">Jumlah Peminjaman</p>
                            <div class="flex justify-center items-center gap-5">
                                <span class="mdi mdi-book-open-blank-variant-outline lg:text-6xl text-3xl"></span>
                                <p class="font-bold text-2xl">23</p>
                            </div>
                        </div>
                        <div class="flex flex-col text-[#204731]">
                            <p class="font-bold text-sm">Jumlah Buku yang Dipinjam</p>
                            <div class="flex justify-center items-center gap-5">
                                <span class="mdi mdi-bookshelf lg:text-6xl text-3xl"></span>
                                <p class="font-bold text-2xl">23</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex text-[#245237] hover:text-[#F7D914]">
                        <p class="font-normal">Ingin membaca hari ini? &nbsp;</p> 
                        <p class="font-bold">Cari Buku</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="border border-1 border-black rounded-lg p-5">
            <div class="flex flex-col lg:gap-10 gap-5">
                <div class="flex justify-between w-full">
                    <div class="flex lg:flex-row flex-col gap-2">
                        <button class="rounded-full bg-[#245237] text-white text-[10px] lg:text-[15px] font-semibold lg:py-2 py-0 lg:px-8 px-5">Dipinjam</button>
                        <a href="../siswa/home.html" class="rounded-full bg-[#F2F2F2] text-[#245237] border-[#245237] border-1 border lg:text-[15px] text-[10px] font-semibold lg:py-2 py-0 lg:px-8 px-5 hover:bg-[#245237] hover:text-white after:bg-[#245237] after:text-white">Dikembalikan</a>
                    </div>
                    <div class="flex ml-auto">
                        <form class="">
                            <select id="urutkan" class="border-1 border-[#245237] border rounded-full px-3 font-normal lg:text-[12px] text-[8px] text-[#245237] w-[100px]">
                                <option value="AZ">A-Z</option>
                                <option value="ZA">Z-A</option>
                                <option value="Dekat">Tenggat terdekat</option>
                                <option value="Jauh">Tenggat terlama</option>
                            </select>
                        </form>
                    </div>
                </div>
                <div class="flex gap-4"> 
                    <div class="bg-[#245237] flex w-1/3 lg:h-[222px] h-[150px] rounded-md"></div>
                    <div class="flex flex-col w-2/3">
                        <div class="flex">
                            <p class="bg-[#245237] text-white font-bold lg:text-[15px] text-[12px] px-2 rounded-md text-left">2 hari 8 jam 8 menit</p>
                        </div>

                        <div class="flex flex-col">
                            <p class="lg:text-[20px] text-[15px] font-medium">Lorem Ipsum</p>
                            <p class="lg:text-[15px] text-[12px] font-normal">
                                Lorem ipsum dolor sit amet constracteur. Lorem ipsum dolor sit amet constracteur. Lorem ipsum dolor sit amet constracteur. Lorem ipsum dolor sit amet constracteur. Lorem ipsum dolor sit amet constracteur.                                
                            </p>
                        </div>

                        <div class="flex flex-col gap-1">
                            <div class="flex">
                                <p class="bg-[#F0C001] lg:text-[15px] text-[12px] px-2 rounded-md text-left">Dipinjam : 23 Maret 2024</p>
                            </div>
                            <div class="flex">
                                <p class="bg-[#F7D914] lg:text-[15px] text-[12px] px-2 rounded-md text-left">Jatuh Tempo : 28 Maret 2024</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                            <p class="text-white text-xl font-semibold">Andy Septiawan Saragih</p>
                            <p class="text-white text-base font-medium">NISN</p>
                        </div>
                    </div>
                    <a href="{{ route('profile') }}" class="flex py-3 px-2">
                        <div class="bg-white rounded-full w-[100px] h-[100px]"></div>
                    </a>
                </div>
                <div class="flex flex-col gap-2">
                    <div class="flex-grow border-t border-gray-400"></div>
                    <div class="text-white underline">
                        <a href="">Log out</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="border border-[#245237] rounded-lg p-5">
            <div class="flex flex-col gap-2">
               <div class="flex">
                    <p class="text-2xl text-gray-500 font-semibold">Baru Ditambahkan</p>
               </div>
               <div class="flex gap-3"> 
                <div class="bg-[#245237] flex md:w-2/5 w-1/3 md:h-[222px] h-[150px] rounded-md"></div>
                <div class="flex flex-col md:w-3/5 w-2/3">
                    <div class="flex flex-col lg:gap-2 gap-0">
                        <p class="lg:text-[20px] text-[15px] font-medium">Lorem Ipsum</p>
                        <p class="lg:text-[15px] text-[10px] font-normal">
                            Lorem ipsum dolor sit amet constracteur. Lorem ipsum dolor sit amet constracteur. Lorem ipsum dolor sit amet constracteur. Lorem ipsum dolor sit amet constracteur. Lorem ipsum dolor sit amet constracteur.                                
                        </p>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection