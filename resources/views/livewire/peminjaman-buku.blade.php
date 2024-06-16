{{-- <div> --}}
{{-- Do your work, then step back. --}}
{{-- </div> --}}
<div class="container mx-auto p-4">
    <div class="bg-white shadow-md rounded-lg p-4">
        {{-- <h1 class="text-2xl font-bold mb-4 text-center">DATA BUKU</h1> --}}
        <div class="mb-4 h-fit">
            <div class=" w-2/5 border-2 rounded-md border-primary h-fit">
                <h2 class="font-open text-primary font-semibold m-2 text-lg">Pinjaman Buku</h2>
                <div class="mx-2 mb-2">
                    <table class="w-full">
                        <thead>
                            <tr class="rounded-lg bg-primary font-open text-base font-normal text-white">
                                <th class="w-3/4 max-w-fit  border-primary rounded-t-md">Judul</th>
                                <th class="px-3 rounded-t-md">Jumlah</th>
                                <th class="px-3 rounded-t-md">Action</th>
                            </tr>
                        </thead>
                        <tbody class="border rounded-b-md">
                            @php
                                $i = 1;
                            @endphp
                            @if ($this->bukuPinjam == null)
                                <tr>
                                   <td class="text-center py-2" colspan="3">Belum ada buku yang ditambahkan</td>
                                </tr>
                            @endif
                            @foreach ($this->bukuPinjam as $bukup)
                            {{-- @dump($bukup->judul) --}}
                                <tr class="text-center {{ $i % 2 == 0 ? '' : 'bg-gray-50' }}">
                                    <td class="border-r">{{ $bukup->judul }}</td>
                                    <td class="border-r">
                                        <button wire:click="counter('kurang', '{{ $bukup->id }}')" class=""><i class="fa-solid fa-minus"></i></button>
                                        <span class="mx-1">{{ $this->number[$bukup->id] }}</span>
                                        <button wire:click="counter('tambah', '{{ $bukup->id }}')" class=""><i class="fa-solid fa-plus"></i></button>
                                    </td>
                                    <td>
                                        <button wire:click="hapusBuku('{{ $bukup->id }}')" class="w-3 scale-75">
                                            <i class="fa-solid fa-trash-can text-red-500 fa-lg"></i>
                                        </button>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-end">
                    <button wire:click="pinjamBuku" class="px-3 py-1 mb-2 mx-2 bg-primary text-white rounded-md font-open text-base font-normal">Pinjam</button>
                </div>
            </div>
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
                        <th class="py-3 px-6 text-center">Pinjam</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-open">
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($bukus as $buku)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">{{ $i++ }}</td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">{{ $buku->no_seri }}</td>
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
                                    <button wire:click="tambahBuku('{{ $buku->id }}')" class=" p-2 text-white mr-2 bg-primary rounded-md">
                                        <span class="flex"> Tambah </span>
                                    </button>
                                    <button wire:click="detailBuku('{{ $buku->id }}')"
                                        class=" p-2 text-white mr-2 bg-yellow-600 rounded-md">
                                        <i class="fa-solid fa-eye"></i>
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
            @include('livewire.buku-ada')
        </div>
    </div>
</div>
