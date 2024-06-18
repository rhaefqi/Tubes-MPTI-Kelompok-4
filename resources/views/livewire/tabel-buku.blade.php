{{-- <div> --}}
    {{-- The whole world belongs to you. --}}
{{-- </div> --}}

<div class="container mx-auto p-4">
    @if (session()->has('success'))
    {{-- @dd('ahh') --}}
        @php
            $this->sukses = true;
        @endphp
    @endif
    {{-- <livewire:alert-success /> --}}
    <div class="bg-white shadow-md rounded-lg p-4">
        {{-- <h1 class="text-2xl font-bold mb-4 text-center">DATA BUKU</h1> --}}
        <div class="mb-4">
            <a href="{{ route('buku.tambah') }}" class=" bg-primary text-white py-2 px-4 rounded">
                <i class="fa-solid fa-plus"></i> Tambah Buku
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border">
                <thead>
                    <tr class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">No. Seri</th>
                        {{-- <th class="py-3 px-6 text-left">ISBN</th> --}}
                        <th class="py-3 px-6 text-left">Judul Buku</th>
                        <th class="py-3 px-6 text-left">Penulis</th>
                        <th class="py-3 px-6 text-left">Tahun Terbit</th>
                        <th class="py-3 px-6 text-left">Kategori</th>
                        <th class="py-3 px-6 text-left">Kelas</th>
                        <th class="py-3 px-3 text-left">Stok</th>
                        <th class="py-3 px-3 text-left">Subjek</th>
                        <th class="py-3 px-6 text-left">Kelola</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-open">
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($bukus as $buku)    
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ $i++ }}</td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ $buku -> no_seri }}</td>
                        {{-- <td class="py-3 px-6 text-left whitespace-nowrap">{{ $buku -> isbn }}</td> --}}
                        <td class="py-3 px-6 text-left">{{ $buku->judul }}</td>
                        <td class="py-3 px-6 text-left">{{ $buku->penulis }}</td>
                        <td class="py-3 px-6 text-left">{{ $buku->tahun_terbit }}</td>
                        <td class="py-3 px-6 text-left">{{ $buku->kategori }}</td>
                        <td class="py-3 px-6 text-left">{{ $buku->kelas }}</td>
                        <td class="py-3 px-3 text-left">{{ $buku->jumlah_tersedia }}</td>
                        <td class="py-3 px-3 text-left">{{ $buku->subjek }}</td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex item-center">
                                <a href="{{ route('buku.edit', $buku->id) }}" wire:click="updateBuku('{{ $buku->id }}')" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <i class="fa-solid fa-pen-to-square text-[#69BE28] fa-lg"></i>
                                </a>
                                <button wire:click="konfirDelete('{{ $buku->id }}')" type="submit" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <i class="fa-solid fa-trash-can text-red-500 fa-lg"></i>
                                </button>
                                
                                <button wire:click="detailBuku('{{ $buku->id }}')" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <i class="fa-solid fa-circle-arrow-right text-[#F0C807] fa-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($this->tampilDetail != false)    
                @include('livewire.detail-buku')
            @endif
            <x-konfirmasi-hapus jenis="Buku">
            </x-konfirmasi-hapus>
        </div>
    </div>
</div>
