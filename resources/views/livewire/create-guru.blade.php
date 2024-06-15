<div>
    <div class="font-open mt-4 flex flex-col">
        <form wire:submit.prevent="createGuru" class="">
            <div class="w-full mb-5 px-10">
                <label for="nip" class="text-base text-primary font-bold">NIP</label>
                <input wire:model.live="nip" type="text" id="nip" name="nip"
                    class="w-full text-dark rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" required />
                    @error('nip')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
            </div>
            <div class="w-full mb-5 px-10">
                <label for="nama" class="text-base text-primary font-bold">Nama</label>
                <input wire:model.live="nama" type="text" id="nama" name="nama"
                    class="w-full text-dark rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" required />
                    @error('nama')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
            </div>
            <div class="w-full mb-5 px-10 flex flex-col space-y-1">
                <label class="text-base text-primary font-bold">Jenis Kelamin</label>
                <div class="flex space-x-4">
                    <div class="flex items-center space-x-1">
                        <input wire:model.live="jenis_kelamin" type="radio" id="laki_laki" name="jenis_kelamin" value="L"
                        class=" text-dark rounded-full transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" required />
                        <label for="laki_laki" class="text-base text-primary font-bold">Laki Laki</label>
                    </div>
                    <div class="flex items-center space-x-1">
                        <input wire:model.live="jenis_kelamin" type="radio" id="perempuan" name="jenis_kelamin" value="P"
                            class=" text-dark rounded-full transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" required />
                        <label for="perempuan" class="text-base text-primary font-bold">Perempuan</label>
                    </div>
                </div>
                @error('jenis_kelamin')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full mb-5 px-10 flex flex-col">
                <label for="tingkat" class="text-base text-primary font-bold">Tingkat</label>
                <select wire:model.live="tingkat" name="tingkat" id="tingkat" class=" w-full rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" required ">
                    <option value="">Pilih Tingkat</option>
                    <option value="MA">MA (Madrasah Aliyah)</option>
                    <option value="MTs">MTs (Madrasah Tsanawiyah)</option>
                    <option value="SD">SD (Sekolah Dasar)</option>
                </select>
                @error('tingkat')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

                <div class="flex justify-center  mb-7">
                    <button class="mr-3 text-base font-semibold text-white bg-primary py-3 px-8 rounded-lg hover:opacity-80 hover:shadow-lg transition duration-300" type="submit">
                        Tambah
                    </button>
                    <button wire:click.prevent="batalCreate" class="text-base font-semibold text-white bg-red-800 py-3 px-8 rounded-lg hover:opacity-80 hover:shadow-lg transition duration-300">
                        Batal
                    </button>
                </div>
        </form>
    </div>
    @include('livewire.konfirmasi-tutup')
</div>
