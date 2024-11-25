<div>
    {{-- The whole world belongs to you. --}}
    {{-- <livewire:alert-success /> --}}
    <div class="container mx-auto p-4 mt-2">
        <div class="bg-white shadow-lg rounded-lg p-6">
            {{-- @dump($this->absens) --}}
            {{-- <h1 class="text-2xl font-bold mb-4 text-center">DATA BUKU</h1> --}}
            <div class="w-full flex flex-row justify-between">
                <div class="">
                    <span class="text-primary font-open font-semibold text-lg">Filter Tanggal : </span>
                    <input wire:model.lazy="filter_tanggal"
                        class="right-0 mb-4 bg-white border-primary border-2 rounded-lg p-2 flex-col" type="date"
                        name="" id="">
                </div>
                <div class="flex gap-5 w-1/2">
                    <div class="w-1/2">
                        <form>
                            <select wire:model.live="filterStatus" id="default"
                                class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" selected>Filter status</option>
                                <option value="dipinjam">Masa Pinjam</option>
                                <option value="lewat_tenggat">Lewat Tenggat</option>
                            </select>
                        </form>
                    </div>
                    <div class="w-1/2">
                        <form>
                            <select wire:model.live="filterTingkat" id="default"
                                class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" selected>Filter tingkat</option>
                                <option value="guru">Guru</option>
                                <option value="siswa">Siswa</option>
                            </select>
                        </form>
                    </div>
                    <div class="w-full">
                        <form class="flex max-w-sm">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                                    </svg>
                                </div>
                                <input wire:model.live="cari" type="text" id="simple-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Cari nama..." required />
                            </div>
                            <button type="submit" wire:click="cariNama"
                                class="p-2.5 ms-2 text-sm font-medium text-white bg-primary rounded-lg border border-primary hover:bg-blend-darken focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-primary dark:focus:ring-blue-800">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border font-open">
                    <thead>
                        <tr class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">No</th>
                            <th class="py-3 px-6 text-left">Nama</th>
                            <th class="py-3 px-6 text-left">Buku Dipinjam</th>
                            <th class="py-3 px-6 text-left">Jumlah</th>
                            <th class="py-3 px-6 text-left">Status</th>
                            <th class="py-3 px-6 text-left">Tanggal</th>
                            <th class="py-3 px-6 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-md">
                        @php $i = 1; @endphp
                        @if ($this->pinjamans->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center p-5 font-open font-semibold text-lg ">
                                    tidak ada yang sesuai dengan filter dan pencarian!
                                </td>
                            </tr>
                        @endif
                        @foreach ($this->pinjamans as $pinjaman)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $i }}</td>
                                <td class="py-3 px-6 text-left">{{ $pinjaman->nama }}</td>
                                <td class="py-3 px-6 text-left">{{ $pinjaman->judul }}</td>
                                <td class="py-3 px-6 text-left">{{ $pinjaman->jumlah_dipinjam }}</td>
                                <td class="py-3 px-6 text-left">{{ $pinjaman->status }}</td>
                                <td class="py-3 px-6 text-left">{{ $pinjaman->tanggal_pinjam }}</td>
                                <td class="py-3 px-6 ">
                                    <div class="flex item-center justify-center">
                                        <button
                                            wire:click="kembalikanBuku('{{ $pinjaman->nisn_nip }}', '{{ $pinjaman->buku_id }}', '{{ $pinjaman->tingkat }}')"
                                            class=" p-2 text-white mr-2 bg-primary rounded-md">
                                            <span class="flex"> kembalikan </span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @php $i++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('livewire.modal-kembalikan')
    <div class="mx-10 mt-2 mb-5">
        {{ $this->pinjamans->links() }}
    </div>
</div>
