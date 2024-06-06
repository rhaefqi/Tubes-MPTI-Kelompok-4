<div class="">
    {{-- Be like water. --}}
    <div class="font-open mt-4 flex flex-col">
        <form wire:submit.prevent="createPetugas" class="">
            <div class="w-full mb-5 px-10">
                <label for="nama_petugas" class="text-base text-primary font-bold">Nama</label>
                <input wire:model.live="nama_petugas" type="text" id="nama_petugas" name="nama_petugas"
                    class="w-full text-dark rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary"
                    required />
                @error('nama_petugas')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full mb-5 px-10 flex flex-col space-y-1">
                <label for="jenis_kelamin_petugas" class="text-base text-primary font-bold">Jenis Kelamin</label>
                <div class="flex space-x-4">
                    <div class="flex items-center space-x-1">
                        <input wire:model.live="jenis_kelamin_petugas" type="radio" id="laki_laki" name="jenis_kelamin_petugas" value="L"
                            class=" text-dark rounded-full transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary"
                            required />
                        <label for="laki_laki" class="text-base text-primary font-bold">Laki Laki</label>
                    </div>
                    <div class="flex items-center space-x-1">
                        <input wire:model.live="jenis_kelamin_petugas" type="radio" id="perempuan" name="jenis_kelamin_petugas" value="P"
                            class=" text-dark rounded-full transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary"
                            required />
                        <label for="perempuan" class="text-base text-primary font-bold">Perempuan</label>
                    </div>
                </div>
                @error('jenis_kelamin_petugas')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-center mb-7">
                <button
                    class="mr-3 text-base font-semibold text-white bg-primary py-3 px-8 rounded-lg hover:opacity-80 hover:shadow-lg transition duration-300"
                    type="submit">
                    Tambah
                </button>
                <button x-on:click="show = false"
                    class="text-base font-semibold text-white bg-red-800 py-3 px-8 rounded-lg hover:opacity-80 hover:shadow-lg transition duration-300">
                    Batal
                </button>
            </div>
        </form>
    </div>

</div>
