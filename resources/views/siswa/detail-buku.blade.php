@extends('layouts.main')

@section('title', 'Detail Buku | Perpustakaan Amaliyah')


@section('content')
<div class="flex flex-col w-full md:max-w-screen-lg mx-auto gap-10 my-10">

    @include('layouts.search')
    
    <div class="flex flex-col lg:flex-row px-11 gap-2 md:gap-4">
        <div class="flex w-full justify-center items-start">
            <img src="{{ asset($buku->sampul_buku) }}" alt="" class="w-36 lg:w-64 rounded-md">
        </div>
        <div class="flex flex-col gap-4 text-start">
            <div class="flex flex-col gap-0">
                <div class="flex gap-2 items-center">
                    <p class="text-[20px] lg:text-[30px] font-bold">{{ $buku->judul }}</p>
                    <p class="bg-[#245237] rounded-full px-2 text-white text-sm">{{ $buku->view }} views</p>
                    
                </div>
                <div class="flex gap-2">
                    <span class="mdi mdi-pencil-circle text-lg"></span>
                    <p>{{ $buku->penulis }}</p>
                </div>
            </div>

            <div class="flex flex-col gap-1">
                <p class="text-[15px] md:text-[20px] font-semibold">Ketersediaan</p>
                <table class="w-full table-auto border border-[#245237]">
                    <tbody class="text-center px-2 text-[12px] md:text-[15px] font-normal">
                        @for($i = 0; $i < $buku->jumlah_tersedia; $i++)
                            <tr class="text-center px-2 text-[8px] md:text-[15px] font-normal">
                                <td class="px-5">{{ $buku->no_seri }}</td>
                                <td class="px-2 w-full items-center flex justify-center">
                                    <p class="text-white px-5 rounded-full
                                    @if (isset($tanggal[$i]) && $tanggalKembali == NULL)
                                        bg-red-500
                                    @else
                                        bg-green-500 w-1/2
                                    @endif
                                    ">
                                    @if (isset($tanggal[$i]) && $tanggalKembali == NULL)
                                        Tidak Tersedia Sampai {{ $tanggal[$i] }}
                                    @else
                                        Tersedia
                                    @endif
                                    </p>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                    
                </table>
            </div>

            <div class="flex flex-col gap-1">
                <p class="text-[15px] md:text-[20px] font-semibold">Deskripsi</p>
                <div class="w-full flex">
                    <p class="text-[12px] md:text-[15px] font-normal">
                        {{ $buku->deskripsi }}
                    </p>
                </div>
            </div>

            <div class="flex flex-col gap-1 w-full lg:w-1/2">
                <p class="text-[15px] md:text-[20px] font-semibold">Informasi Buku</p>
                <table class="w-full">
                    <tbody class="text-center text-[12px] md:text-[15px] font-normal">
                        <tr>
                            <td class="text-left">No. Seri</td>
                            <td class="text-end">:</td>
                            <td class="text-left">{{ $buku->no_seri }}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Penerbit</td>
                            <td class="text-end">:</td>
                            <td class="text-left">{{ $buku->penerbit }}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Tahun Terbit</td>
                            <td class="text-end">:</td>
                            <td class="text-left">{{ $buku->tahun_terbit }}</td>
                        </tr>
                        <tr>
                            <td class="text-left">ISBN</td>
                            <td class="text-end">:</td>
                            <td class="text-left">{{ $buku->isbn }}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Kelas</td>
                            <td class="text-end">:</td>
                            <td class="text-left">{{ $buku->kelas }}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Kategori</td>
                            <td class="text-end">:</td>
                            <td class="text-left">{{ $buku->kategori }}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Subjek</td>
                            <td class="text-end">:</td>
                            <td class="text-left">{{ $buku->subjek }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection