<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="flex justify-center mt-10">
        <div class="mx-10 w-full border-secondary border-[3px] rounded-lg overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="text-center bg-primary text-white text-base">
                    <th class="border-r-[3px] border-secondary py-1">NISN</th>
                    <th class="border-r-[3px] border-secondary">Nama</th>
                    <th class="border-r-[3px] border-secondary">L/P</th>
                    <th class="border-r-[3px] border-secondary">Tingkat</th>
                    <th class="border-r-[3px] border-secondary">Kelas</th>
                    <th class="border-r-[3px] border-secondary">Username</th>
                    <th class="border-secondary">Action</th>
                </tr>
            </thead>
            <tbody class="">
                @php $i = 1; @endphp
                @foreach ($this->siswas as $siswa)
                    <tr wire:key="{{ $siswa->nisn }}" class="text-center font-semibold {{ $i % 2 == 0 ? 'bg-[#F5f5f5]' : 'bg-gray-200' }}">
                        <td class="border-r-[3px] border-secondary py-[3px]">{{ $siswa->nisn }}</td>
                        <td class="border-r-[3px] border-secondary">{{ $siswa->nama }}</td>
                        <td class="border-r-[3px] border-secondary">{{ $siswa->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                        <td class="border-r-[3px] border-secondary">{{ $siswa->tingkat }}</td>
                        <td class="border-r-[3px] border-secondary">{{ $siswa->kelas }}</td>
                        <td class="border-r-[3px] border-secondary">
                            @if ($siswa->user->id == 1)
                                Belum punya akun
                            @else
                                {{ $siswa->user->username }}
                            @endif
                        </td>
                        <td class="">
                            <button wire:click="editSiswa('{{ $siswa->nisn }}')">  
                                <i class="fa-solid fa-pen-to-square scale-125 text-green-500 mr-3"></i>
                            </button>
                            <button wire:click="konfirDelete('{{ $siswa->nisn }}')" type="submit">
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
    @include('livewire.edit-siswa')
    <x-konfirmasi-hapus jenis="Siswa">
    </x-konfirmasi-hapus>
</div>
