@extends('layouts.main')

@section('content')
<div class="flex flex-col md:flex-row-reverse w-full md:max-w-screen-lg mx-auto gap-1 my-10">
    <div class="flex flex-col w-full md:w-1/4 px-3 gap-5">
        <div class="flex flex-col items-center">
            <img src="{{ asset('img/pp.jpeg') }}" class="w-20 h-20 rounded-full" alt="">

            <div class="flex flex-col text-center">
                <p class="font-semibold">Andy Septiawan Saragih</p>
                <div class="flex justify-center">
                    <p class="bg-[#245237] text-sm font-semibold text-white rounded-lg px-2">Siswa</p>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <div class="flex">
                <p class="bg-[#245237] font-semibold text-white rounded-lg px-2 text-[13px]">Data Diri</p>
            </div>

            <div class="flex px-2 gap-2 font-normal text-[12px]">
                <div class="flex flex-col gap-1 w-16">
                    <p>NISN</p>
                    <p>Nama</p>
                    <p>Tingkat</p>
                    <p>Kelas</p>
                    <p>Gender</p>
                    <p>No. Hp</p>
                    <p>Email</p>
                </div>

                <div class="flex flex-col gap-1 w-2 text-start">
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                </div>

                <div class="flex flex-col gap-1 text-start">
                    <p>NISN</p>
                    <p>Nama</p>
                    <p>Tingkat</p>
                    <p>Kelas</p>
                    <p>Gender</p>
                    <p>No. Hp</p>
                    <p>Email</p>
                </div>
            </div>
        </div>

        <div class="flex justify-center gap-2">
            <a href="{{ route('edit.profile') }}" class="bg-[#f2f2f2] border-2 border-[#245237] rounded-lg text-[#245237] text-[12px] text-center font-bold px-4 py-1">
                Kelola Profile
            </a>
            <a href="{{ route('ubah.sandi') }}" class="bg-[#245237] border-2 border-[#245237] rounded-lg text-white text-[12px] text-center font-bold px-4 py-1">
                Kelola Kata Sandi
            </a>
        </div>
    </div>
    
    <div class="flex flex-col w-full md:w-3/4 px-2 gap-5">
        <div class="flex md:hidden w-full border border-1 border-opacity-50 border-black mt-4"></div>

        <div class="flex flex-col gap-2">
            <!-- Desktop -->
            <div class="flex flex-col gap-4 ">
                <div class="flex gap-4 justify-between">
                    <div class="flex">
                        <p class="bg-[#245237] font-semibold text-white rounded-lg px-2 md:text-xl text-[13px]">Riwayat Peminjaman</p>
                    </div>
                    <div class="flex">
                        <form class="">
                            <select id="urutkan" class="border-1 border-[#245237] border rounded-full px-3 font-normal lg:text-[12px] text-[8px] text-[#245237] w-[100px]">
                                <option value="AZ">Mei 2024</option>
                                <option value="ZA">April 2024</option>
                                <option value="Dekat">Maret 2024</option>
                            </select>
                        </form>
                    </div>
                </div>
                <div class="flex flex-wrap gap-3 justify-center md:justify-start md:px-5">
                    <div class="flex flex-col border border-1 border-opacity-50 border-[#245237] rounded-lg w-48 h-[18.5rem] items-center py-2 gap-1">
                        <img src="{{ asset('img/novel.jpg') }}" alt="" class="w-32 h-44 rounded-md">
        
                        <div class="flex flex-col items-start w-full px-2">
                            <div class="flex flex-col">
                                <p class="font-semibold text-[13px]">Laskar Pelangi</p>
                                <p class="font-light text-[12px]">Andrea Hirata</p>
                            </div>
                            
                            <div class="flex md:hidden w-full border border-1 border-opacity-50 border-black my-1"></div>

                            <div class="flex flex-col text-[10px] gap-1">
                                <div class="bg-[#F0C001] font-semibold rounded-md px-2">
                                    <span class="mdi mdi-calendar-text"></span>
                                    Dipinjam : 23 Maret 2024
                                </div>
                                <div class="bg-[#00A218] font-semibold rounded-md px-2 text-white">
                                    <span class="mdi mdi-bell"></span>
                                    Jatuh Tempo : 28 Maret 2024
                                </div>
                                <div class="bg-[#F7D914] font-semibold rounded-md px-2">
                                    <span class="mdi mdi-checkbox-marked"></span>
                                    Kembali : 27 Maret 2024
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col border border-1 border-opacity-50 border-[#245237] rounded-lg w-48 h-[18.5rem] items-center py-2 gap-1">
                        <img src="{{ asset('img/novel.jpg') }}" alt="" class="w-32 h-44 rounded-md">
        
                        <div class="flex flex-col items-start w-full px-2">
                            <div class="flex flex-col">
                                <p class="font-semibold text-[13px]">Laskar Pelangi</p>
                                <p class="font-light text-[12px]">Andrea Hirata</p>
                            </div>
                            
                            <div class="flex md:hidden w-full border border-1 border-opacity-50 border-black my-1"></div>

                            <div class="flex flex-col text-[10px] gap-1">
                                <div class="bg-[#F0C001] font-semibold rounded-md px-2">
                                    <span class="mdi mdi-calendar-text"></span>
                                    Dipinjam : 23 Maret 2024
                                </div>
                                <div class="bg-[#00A218] font-semibold rounded-md px-2 text-white">
                                    <span class="mdi mdi-bell"></span>
                                    Jatuh Tempo : 28 Maret 2024
                                </div>
                                <div class="bg-[#F7D914] font-semibold rounded-md px-2">
                                    <span class="mdi mdi-checkbox-marked"></span>
                                    Kembali : 27 Maret 2024
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col border border-1 border-opacity-50 border-[#245237] rounded-lg w-48 h-[18.5rem] items-center py-2 gap-1">
                        <img src="{{ asset('img/novel.jpg') }}" alt="" class="w-32 h-44 rounded-md">
        
                        <div class="flex flex-col items-start w-full px-2">
                            <div class="flex flex-col">
                                <p class="font-semibold text-[13px]">Laskar Pelangi</p>
                                <p class="font-light text-[12px]">Andrea Hirata</p>
                            </div>
                            
                            <div class="flex md:hidden w-full border border-1 border-opacity-50 border-black my-1"></div>

                            <div class="flex flex-col text-[10px] gap-1">
                                <div class="bg-[#F0C001] font-semibold rounded-md px-2">
                                    <span class="mdi mdi-calendar-text"></span>
                                    Dipinjam : 23 Maret 2024
                                </div>
                                <div class="bg-[#00A218] font-semibold rounded-md px-2 text-white">
                                    <span class="mdi mdi-bell"></span>
                                    Jatuh Tempo : 28 Maret 2024
                                </div>
                                <div class="bg-[#F7D914] font-semibold rounded-md px-2">
                                    <span class="mdi mdi-checkbox-marked"></span>
                                    Kembali : 27 Maret 2024
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection