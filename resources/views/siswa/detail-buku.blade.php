@extends('layouts.main')

@section('title', 'Detail Buku | Perpustakaan Amaliyah')

@section('content')
<div class="flex flex-col w-full md:max-w-screen-lg mx-auto gap-10 my-10">
    <!-- Header Pencarian -->
    @include('layouts.search')

    <!-- Konten Utama -->
    <div class="flex flex-col lg:flex-row px-6 gap-6">
        <!-- Gambar Buku -->
        <div class="flex w-full lg:w-1/3 justify-center items-start">
            <img src="{{ asset($buku->sampul_buku) }}" alt="Sampul Buku" class="w-44 lg:w-64 rounded-lg shadow-md">
        </div>

        <!-- Informasi Buku -->
        <div class="flex flex-col w-full lg:w-2/3 gap-6">
            <!-- Judul Buku -->
            <div>
                <h1 class="text-xl lg:text-3xl font-bold text-[#245237]">{{ $buku->judul }}</h1>
                <p class="text-sm text-gray-600 flex items-center gap-2">
                    <span class="mdi mdi-pencil-circle"></span>{{ $buku->penulis }}
                </p>
                <p class="bg-[#245237] text-white text-sm font-semibold rounded-full px-3 py-1 mt-2 w-fit">
                    {{ $buku->view }} views
                </p>
            </div>

            <!-- Ketersediaan Buku -->
            <div>
                <h2 class="text-lg lg:text-xl font-bold mb-4">Ketersediaan</h2>
                <table class="w-full border-collapse rounded-lg overflow-hidden shadow-md">
                    <thead>
                        <tr class="bg-[#245237] text-white">
                            <th class="py-3 px-4 text-left text-sm lg:text-base font-semibold">No. Seri</th>
                            <th class="py-3 px-4 text-left text-sm lg:text-base font-semibold">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 0; $i < $buku->jumlah_tersedia; $i++)
                        <tr class="{{ $i % 2 == 0 ? 'bg-white' : 'bg-gray-100' }} border-b border-gray-200">
                            <td class="py-3 px-4 text-gray-800 text-sm lg:text-base">{{ $buku->no_seri }}</td>
                            <td class="py-3 px-4">
                                <span class="px-4 py-1 rounded-full font-semibold text-sm lg:text-base
                                    @if (isset($tanggal[$i]) && $tanggalKembali == NULL)
                                        bg-red-500 text-white
                                    @else
                                        bg-green-500 text-white
                                    @endif">
                                    @if (isset($tanggal[$i]) && $tanggalKembali == NULL)
                                        Tidak Tersedia Sampai {{ $tanggal[$i] }}
                                    @else
                                        Tersedia
                                    @endif
                                </span>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>

    <!-- Deskripsi dan Informasi Buku -->
    <div class="flex flex-col lg:flex-row px-12 gap-4 mt-5">

    <!-- Informasi Buku -->
    <div class="flex flex-col w-full lg:w-1/2 gap-5">
        <h2 class="text-lg lg:text-xl font-semibold">Informasi Buku</h2>
        <table class="w-full border-collapse border border-[#245237] rounded-lg overflow-hidden shadow-md">
            <tbody>
                <tr class="bg-[#f9f9f9] text-gray-700">
                    <td class="py-3 px-4 font-semibold w-1/3">No. Seri</td>
                    <td class="py-3 px-2 text-center">:</td>
                    <td class="py-3 px-4 text-gray-800">{{ $buku->no_seri }}</td>
                </tr>
                <tr class="border-t border-gray-300">
                    <td class="py-3 px-4 font-semibold w-1/3">Penerbit</td>
                    <td class="py-3 px-2 text-center">:</td>
                    <td class="py-3 px-4 text-gray-800">{{ $buku->penerbit }}</td>
                </tr>
                <tr class="bg-[#f9f9f9]">
                    <td class="py-3 px-4 font-semibold w-1/3">Tahun Terbit</td>
                    <td class="py-3 px-2 text-center">:</td>
                    <td class="py-3 px-4 text-gray-800">{{ $buku->tahun_terbit }}</td>
                </tr>
                <tr class="border-t border-gray-300">
                    <td class="py-3 px-4 font-semibold w-1/3">ISBN</td>
                    <td class="py-3 px-2 text-center">:</td>
                    <td class="py-3 px-4 text-gray-800">{{ $buku->isbn }}</td>
                </tr>
                <tr class="bg-[#f9f9f9]">
                    <td class="py-3 px-4 font-semibold w-1/3">Kelas</td>
                    <td class="py-3 px-2 text-center">:</td>
                    <td class="py-3 px-4 text-gray-800">{{ $buku->kelas }}</td>
                </tr>
                <tr class="border-t border-gray-300">
                    <td class="py-3 px-4 font-semibold w-1/3">Kategori</td>
                    <td class="py-3 px-2 text-center">:</td>
                    <td class="py-3 px-4 text-gray-800">{{ $buku->kategori }}</td>
                </tr>
                <tr class="bg-[#f9f9f9]">
                    <td class="py-3 px-4 font-semibold w-1/3">Subjek</td>
                    <td class="py-3 px-2 text-center">:</td>
                    <td class="py-3 px-4 text-gray-800">{{ $buku->subjek }}</td>
                </tr>
            </tbody>
        </table>
    </div>


    <!-- Deskripsi Buku -->
    <div class="flex flex-col w-full lg:w-1/2 gap-4 lg:px-5 lg:ml-[-10px]">
        <h2 class="text-lg lg:text-xl font-semibold">Deskripsi</h2>
        <p class="text-gray-700 text-sm lg:text-base leading-relaxed">
            {{ $buku->deskripsi }}
        </p>
    </div>
</div>

</div>
@endsection
