<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="container mx-auto p-4 mt-5">
        <div class="bg-white shadow-md rounded-lg p-4">
            {{-- @dump($this->absens) --}}
            {{-- <h1 class="text-2xl font-bold mb-4 text-center">DATA BUKU</h1> --}}
            <div class="w-full flex flex-row justify-between">
                <button class="mb-4 bg-primary text-white py-2 px-4 rounded"><i class="fa-solid fa-plus"></i>
                    Absensi</button>
                <div>
                    <span class="text-primary font-open font-semibold text-lg">Filter Tanggal : </span>
                    <input wire:model.lazy="filter_tanggal"
                        class="right-0 mb-4 bg-white border-primary border-2 rounded-lg p-2 flex-col" type="date"
                        name="" id="">
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border font-open">
                    <thead>
                        <tr class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">No</th>
                            <th class="py-3 px-6 text-left">Nama</th>
                            <th class="py-3 px-6 text-left">Status</th>
                            <th class="py-3 px-6 text-left">Tanggal</th>
                            <th class="py-3 px-6 text-left">Jam</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-md">
                        @php $i = 1; @endphp
                        @if ($this->absens->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center p-5 font-open font-semibold text-lg ">
                                    tidak ada yang datang ke perpustakaan pada tanggal {{ $this->filter_tanggal }}
                                </td>
                            </tr>
                        @endif
                        @foreach ($this->absens as $absen)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $i }}</td>
                                <td class="py-3 px-6 text-left">{{ $absen->nama }}</td>
                                <td class="py-3 px-6 text-left">{{ $absen->status }}</td>
                                <td class="py-3 px-6 text-left">{{ $absen->tanggal }}</td>
                                <td class="py-3 px-6 text-left">{{ $absen->jam }}</td>
                            </tr>
                            @php $i++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
