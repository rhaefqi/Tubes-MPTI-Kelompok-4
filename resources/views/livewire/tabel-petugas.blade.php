<div class="">
    {{-- Do your work, then step back. --}}
    <div class="flex justify-center mt-10">
        <div class="mx-10 w-full border-secondary border-[3px] rounded-lg overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="text-center bg-primary text-white text-base">
                        <th class="border-r-[3px] border-secondary py-1">No</th>
                        <th class="border-r-[3px] border-secondary">Nama</th>
                        <th class="border-r-[3px] border-secondary">L/P</th>
                        <th class="border-r-[3px] border-secondary">Username</th>
                        <th class="border-secondary">Action</th>
                    </tr>
                </thead>
                <tbody class="">
                    @php $i = 1; @endphp
                    @foreach ($this->petugass as $petugas)
                        <tr wire:key="{{ $petugas->id }}" class="text-center font-semibold {{ $i % 2 == 0 ? 'bg-[#F5f5f5]' : 'bg-gray-200' }}">
                            <td class="border-r-[3px] border-secondary py-[3px]">{{ $i }}</td>
                            <td class="border-r-[3px] border-secondary">{{ $petugas->nama }}</td>
                            <td class="border-r-[3px] border-secondary">
                                {{ $petugas->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                            <td class="border-r-[3px] border-secondary">
                                @if ($petugas->user->id == 1)
                                    Belum punya akun
                                @else
                                    {{ $petugas->user->username }}
                                @endif
                            </td>
                            <td class="">
                                <button wire:click="editPetugas({{ $petugas->id }})" type="submit">
                                    <i class="fa-solid fa-pen-to-square scale-125 text-green-500 mr-3"></i>
                                </button>
                                <button wire:click="konfirDelete({{ $petugas->id }})" type="submit">
                                    <i class="fa-solid fa-trash-can scale-125 text-red-500"></i>
                                </button>
                            </td>
                        </tr>
                        @php $i++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mx-10 mt-2">
        {{ $this->petugass->links() }}
    </div>
    @include('livewire.edit-petugas')
    {{-- modal hapus --}}
    <x-konfirmasi-hapus jenis="Petugas">
    </x-konfirmasi-hapus>
    
</div>
