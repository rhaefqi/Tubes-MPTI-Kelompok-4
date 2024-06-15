<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="font-open mt-4 flex flex-col">
        <form wire:submit.prevent="createAbsensi" class="">
            <div class="w-full mb-5 px-10 flex flex-col">
                <label for="status" class="text-base text-primary font-bold">Status</label>
                <select wire:model.live="status" type="text" id="status" name="status"
                    class="w-full text-dark rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary"
                    required>
                    <option value="">Pilih Status</option>
                    <option value="guru">Guru</option>
                    <option value="siswa">Siswa</option>
                </select>
                @error('status')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full mb-5 px-10">
                <label for="nama" class="text-base text-primary font-bold">Nama</label>
                <input autocomplete="off" wire:model.live="nama" type="text" id="nama" name="nama"
                    class="w-full text-dark rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary"
                    required  />
                    {{-- @dump($this->fix) --}}
                @if (!$this->nama == '' && $this->fix == true)
                    <ul class="border border-primary rounded-md overflow-y-scroll max-h-32 list-outside list-none">
                        {{-- @dump($this->absens) --}}
                        @if ($absens->isEmpty())
                            <li class="p-2 hover:bg-slate-200 rounded-md">
                                Nama tidak ditemukan
                            </li>
                        @endif
                        @foreach ($absens as $list)
                            <li wire:click="pilih('{{ $list->nisn_nip }}', '{{ $list->nama }}', '{{ $list->status }}')" class="p-2 hover:bg-slate-200 rounded-md hover:cursor-pointer">
                                {{ $list->nama }} - {{ $list->nisn_nip }}
                            </li>
                        @endforeach
                    </ul>
                @endif

                @error('nama')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full mb-5 px-10">
                <label for="nisn_nip" class="text-base text-primary font-bold">NISN / NIP</label>
                <input wire:model.live="nisn_nip" type="text" id="nisn_nip" name="nisn_nip"
                    class="w-full text-dark rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary"
                    required />
                @error('nisn_nip')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>



            <div class="flex justify-center  mb-7">
                <button
                    class="mr-3 text-base font-semibold text-white bg-primary py-3 px-8 rounded-lg hover:opacity-80 hover:shadow-lg transition duration-300"
                    type="submit">
                    Tambah
                </button>
                <button wire:click.prevent="batalCreate"
                    class="text-base font-semibold text-white bg-red-800 py-3 px-8 rounded-lg hover:opacity-80 hover:shadow-lg transition duration-300">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>
