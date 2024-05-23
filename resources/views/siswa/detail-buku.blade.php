@extends('layouts.main')

@section('content')
<div class="flex flex-col w-full md:max-w-screen-lg mx-auto gap-10 my-10">

    @include('layouts.search')
    
    <div class="flex flex-col lg:flex-row px-11 gap-2 md:gap-4 w-full">
        <div class="flex w-full justify-center">
            <img src="{{ asset('img/novel.jpg') }}" alt="" class="w-36 h-56 lg:w-44 lg:h-64 rounded-md">
        </div>
        <div class="flex flex-col gap-4 text-start">
            <div class="flex flex-col gap-0">
                <div class="flex gap-2 items-center">
                    <p class="text-[20px] lg:text-[30px] font-bold">Laskar Pelangi</p>
                    <p class="bg-[#245237] rounded-full px-2 text-white text-sm">3 views</p>
                </div>
                <div class="flex gap-2">
                    <span class="mdi mdi-pencil-circle text-lg"></span>
                    <p>Andrea Hirata</p>
                </div>
            </div>

            <div class="flex flex-col gap-1">
                <p class="text-[15px] md:text-[20px] font-semibold">Ketersediaan</p>
                <table class="w-full table-auto border border-[#245237]">
                    <tbody class="text-center px-2 text-[12px] md:text-[15px] font-normal">
                        <tr>
                            <td class="px-5">ID</td>
                            <td class="px-5">No. Seri</td>
                            <td class="px-5">Tersedia</td>
                        </tr>
                        <tr>
                            <td class="px-5">ID</td>
                            <td class="px-5">No. Seri</td>
                            <td class="px-5">Tersedia</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="flex flex-col gap-1">
                <p class="text-[15px] md:text-[20px] font-semibold">Deskripsi</p>
                <div class="w-full flex">
                    <p class="text-[12px] md:text-[15px] font-normal">Lorem ipsum dolor sit amet consectetur. Nisl nec volutpat nibh at gravida sit convallis nibh. Consectetur venenatis volutpat ac pellentesque quam vel congue. Consequat lacinia tortor vel ac et nullam sagittis. Consequat vel curabitur eu morbi curabitur. Scelerisque elementum ultricies eget sed sed. Est cursus fringilla elit urna euismod phasellus. Malesuada etiam tortor lectus eget a suspendisse. Ipsum nisl fames libero ac ante. Nibh imperdiet ridiculus non viverra et vel dolor.</p>
                </div>
            </div>

            <div class="flex flex-col gap-1 w-full lg:w-1/2">
                <p class="text-[15px] md:text-[20px] font-semibold">Informasi Buku</p>
                <table class="w-full">
                    <tbody class="text-center text-[12px] md:text-[15px] font-normal">
                        <tr>
                            <td class="text-left">No. Seri</td>
                            <td class="text-end">:</td>
                            <td class="text-left">123/RAE/EHE</td>
                        </tr>
                        <tr>
                            <td class="text-left">Penerbit</td>
                            <td class="text-end">:</td>
                            <td class="text-left">Gramedia</td>
                        </tr>
                        <tr>
                            <td class="text-left">Tahun Terbit</td>
                            <td class="text-end">:</td>
                            <td class="text-left">2007</td>
                        </tr>
                        <tr>
                            <td class="text-left">ISBN</td>
                            <td class="text-end">:</td>
                            <td class="text-left">1111-111-11-1</td>
                        </tr>
                        <tr>
                            <td class="text-left">Kelas</td>
                            <td class="text-end">:</td>
                            <td class="text-left">Lainnya</td>
                        </tr>
                        <tr>
                            <td class="text-left">Kategori</td>
                            <td class="text-end">:</td>
                            <td class="text-left">Novel</td>
                        </tr>
                        <tr>
                            <td class="text-left">Subjek</td>
                            <td class="text-end">:</td>
                            <td class="text-left">Fiksi</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection