<div class="container mx-auto px-4 mb-10 mt-4">
    <!-- Bagian Header Pencarian -->
    <div class="relative bg-cover bg-center rounded-lg overflow-hidden" style="background-image: url('{{ asset('assets/img/cari.jpg') }}'); height: 230px;">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white">
            <h1 class="text-2xl font-bold">Perpustakaan</h1>
            <p class="text-lg">Cari Buku yang Diinginkan</p>
        </div>
        <div class="absolute -bottom-5 left-1/2 transform -translate-x-1/2 w-2/3 flex py-12">
            <input type="text" wire:model="search" wire:keydown.debounce="searchBuku" class="flex-1 h-12 px-4 text-md rounded-l-lg border-t border-l border-b border-[#245237]" placeholder="Cari Buku">
            <button class="bg-[#245237] text-white px-4 rounded-r-lg hover:bg-[#1e472c]">
                <span class="mdi mdi-magnify text-lg"></span>
            </button>
        </div>
    </div>

    <!-- Filter -->
    <div class="flex justify-end items-center gap-4 mt-10">
        <p class="font-bold italic text-[#245237] hidden md:flex">Filter</p>
        <select id="urutkan" wire:model="sortOrder" wire:click="filterBuku" class="border border-[#245237] rounded-full px-6 py-1 text-sm font-bold text-[#245237]">
            <option value="asc">A-Z</option>
            <option value="desc">Z-A</option>
        </select>
    </div>

    <!-- Daftar Buku -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-6 mt-6 px-4">
        @if ($bukus->isEmpty())
            <p class="col-span-full text-center font-bold text-red-500">Tidak ada hasil yang ditemukan untuk pencarian "{{ $search }}"</p>
        @else
            @foreach ($bukus as $buku)
                <a href="{{ route('detail.buku', $buku->id) }}" class="flex flex-col border border-opacity-50 border-[#245237] rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200">
                    <img src="{{ asset($buku->sampul_buku) }}" alt="" class="w-full h-48 object-cover">
                    <div class="p-4 flex flex-col gap-2">
                        <h3 class="text-sm font-bold truncate">{{ $buku->judul }}</h3>
                        <p class="text-xs text-gray-600 truncate">{{ $buku->penulis }}</p>
                        <span class="text-center py-1 text-xs font-bold rounded-md {{ $buku->jumlah_tersedia == 0 ? 'bg-red-500 text-white' : 'bg-[#245237] text-white' }}">
                            {{ $buku->jumlah_tersedia == 0 ? 'Tidak Tersedia' : 'Tersedia' }}
                        </span>
                    </div>
                </a>
            @endforeach
        @endif
    </div>
</div>
