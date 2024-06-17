
<div class="flex flex-col w-full md:max-w-screen-lg mx-auto gap-7 my-10">
    
    <div class="flex relative px-3 justify-center">
        <div class="brightness-[25%] h-24 overflow-hidden rounded-lg">
            <img src="{{ asset('assets/img/cari.jpg') }}" class="w-full">
        </div>
        <div class="flex flex-col absolute text-center text-xl md:text-2xl md:top-2 font-semibold top-4 text-white">
            <p>Perpustakaan</p>
            <p>Cari Buku yang Diinginkan</p>
        </div>
        <div class="flex absolute -bottom-5 w-full justify-center gap-2">
            <input type="text" wire:model="search" wire:keydown.debounce="searchBuku" class="w-1/2 h-10 rounded-lg border border-1 border-[#245237] px-3 placeholder:text-md placeholder:font-semibold" placeholder="Cari Buku">
            {{-- <button class="w-7 h-7 rounded-lg border border-1 border-[#245237] bg-white">
                <span class="mdi mdi-magnify text-[#245237]"></span>
            </button> --}}
        </div>
    </div>

    <div class="flex justify-end items-center gap-3 px-3">
        <p class="font-bold italic text-[#245237] hidden md:flex">Filter</p>
        <form class="">
            <select id="urutkan" wire:model="sortOrder" wire:click="filterBuku" class="border-1 border-[#245237] border rounded-full font-bold italic lg:text-[12px] text-[10px] text-[#245237] py-0 h-[30px] w-[100px]">
                <option value="asc" class="font-bold italic text-[#245237]">A-Z</option>
                <option value="desc" class="font-bold italic text-[#245237]">Z-A</option>
            </select>
        </form>
    </div>
    <div class="flex flex-wrap px-11 gap-4 justify-center md:justify-start">
        
        @if ($bukus->isEmpty())
            <p class="text-center font-bold w-full text-red-500">Tidak ada hasil yang ditemukan untuk pencarian "{{ $search }}"</p>
        @else
            @foreach ($bukus as $buku)    
                <a href="{{ route('detail.buku', $buku->id) }}" class="flex flex-col border border-1 border-opacity-50 border-[#245237] rounded-lg w-28 md:w-32 items-center py-2">
                    <img src="{{ asset($buku->sampul_buku) }}" alt="" class="w-24 md:w-28 h-36 md:h-40 rounded-md">
                    <div class="flex flex-col justify-start w-full px-2 gap-1">
                        <div class="flex flex-col text-[10px] md:text-[14px] truncate overflow-hidden">
                            <p class="font-semibold">{{ $buku->judul }}</p>
                            <p>{{ $buku->penulis }}</p>
                        </div>
                        <div class="font-bold text-[10px] md:text-[14px] text-center rounded-md {{ $buku->jumlah_tersedia == 0 ? 'bg-red-500' : 'bg-[#F0C001]' }}">{{ $buku->jumlah_tersedia == 0 ? 'Tidak Tersedia' : 'Tersedia' }}</div>
                    </div>
                </a>
            @endforeach
        @endif
        
    </div>
</div>