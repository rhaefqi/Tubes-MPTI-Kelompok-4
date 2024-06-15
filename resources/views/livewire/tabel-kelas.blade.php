<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="flex justify-center mt-10">
        <div class="mx-10 w-full border-secondary border-[3px] rounded-lg overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="text-center bg-primary text-white text-base">
                        <th class="border-r-[3px] border-secondary py-1">Kelas</th>
                        <th class="border-r-[3px] border-secondary">Tingkat</th>
                        <th class="border-r-[3px] border-secondary">Wali Kelas</th>
                        <th class="border-secondary">Action</th>
                    </tr>
                </thead>
                <tbody class="">
                    @php $i = 1; @endphp
                    @foreach ($this->kelass as $kelas)
                        <tr wire:key="{{ $kelas->kelas }}"
                            class="text-center font-semibold {{ $i % 2 == 0 ? 'bg-[#F5f5f5]' : 'bg-gray-200' }}">
                            <td class="border-r-[3px] border-secondary py-[3px]">{{ $kelas->kelas }}</td>
                            <td class="border-r-[3px] border-secondary">{{ $kelas->tingkat }}</td>
                            <td class="border-r-[3px] border-secondary">
                                {{-- @dump($kelas->wali) --}}
                                {{ $kelas->wali->nama }}
                            </td>
                            <td class="">
                                {{-- @dump($guru->nip) --}}
                                <button wire:click="editKelas('{{ $kelas->kelas }}')">  
                                    <i class="fa-solid fa-pen-to-square scale-125 text-green-500 mr-3"></i>
                                </button>
                                <button wire:click="konfirDelete('{{ $kelas->kelas }}')" type="submit">
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
        {{ $this->kelass->links() }}
    </div>
    @include('livewire.alert-gagalkelas')
    @include('livewire.edit-kelas')
    <x-konfirmasi-hapus jenis="Kelas">
    </x-konfirmasi-hapus>
</div>
