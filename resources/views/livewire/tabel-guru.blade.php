<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="flex justify-center mt-10">
        <div class="mx-10 w-full border-secondary border-[3px] rounded-lg overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="text-center bg-primary text-white text-base">
                        <th class="border-r-[3px] border-secondary py-1">NIP</th>
                        <th class="border-r-[3px] border-secondary">Nama</th>
                        <th class="border-r-[3px] border-secondary">L/P</th>
                        <th class="border-r-[3px] border-secondary">Tingkat</th>
                        <th class="border-r-[3px] border-secondary">Username</th>
                        <th class="border-secondary">Action</th>
                    </tr>
                </thead>
                <tbody class="">
                    @php $i = 1; @endphp
                    @foreach ($this->gurus as $guru)
                        <tr wire:key="{{ $guru->nip }}"
                            class="text-center font-semibold {{ $i % 2 == 0 ? 'bg-[#F5f5f5]' : 'bg-gray-200' }}">
                            <td class="border-r-[3px] border-secondary py-[3px]">{{ $guru->nip }}</td>
                            <td class="border-r-[3px] border-secondary">{{ $guru->nama }}</td>
                            <td class="border-r-[3px] border-secondary">
                                {{ $guru->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                            <td class="border-r-[3px] border-secondary">{{ $guru->tingkat }}</td>
                            <td class="border-r-[3px] border-secondary">
                                @if ($guru->user->id == 1)
                                    Belum punya akun
                                @else
                                    {{ $guru->user->username }}
                                @endif
                            </td>
                            <td class="">
                                {{-- @dump($guru->nip) --}}
                                <button wire:click="editGuru('{{ $guru->nip }}')">  
                                    <i class="fa-solid fa-pen-to-square scale-125 text-green-500 mr-3"></i>
                                </button>
                                <button wire:click="konfirDelete('{{ $guru->nip }}')" type="submit">
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
        {{ $this->gurus->links() }}
    </div>
    @include('livewire.edit-guru')
    <x-konfirmasi-hapus jenis="Guru">
    </x-konfirmasi-hapus>
</div>
