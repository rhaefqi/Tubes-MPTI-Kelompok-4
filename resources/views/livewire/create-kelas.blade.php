<div>
    {{-- In work, do what you enjoy. --}}
    <div class="font-open mt-4 flex flex-col">
        <form wire:submit.prevent="createKelas" class="">
            <div class="w-full mb-5 px-10">
                <label for="kelas" class="text-base text-primary font-bold">Kelas</label>
                <input wire:model.live="kelas" type="text" id="kelas" name="kelas"
                    class="w-full text-dark rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" required />
                @error('kelas')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full mb-5 px-10 flex flex-col">
                <label for="tingkat" class="text-base text-primary font-bold">Tingkat</label>
                <select wire:model.live="tingkat" name="tingkat" id="tingkat" class=" w-full rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" required ">
                    <option value="">Pilih Tingkatan</option>
                    <option value="MA">MA (Madrasah Aliyah)</option>
                    <option value="MTs">MTs (Madrasah Tsanawiyah)</option>
                    <option value="SD">SD (Sekolah Dasar)</option>
                </select>
                @error('tingkat')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full mb-5 px-10">
                <label for="wali" class="text-base text-primary font-bold">Nip Wali kelas</label>
                <input wire:model.live="wali" type="text" id="wali" name="wali"
                    class="w-full text-dark rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" required />
                @error('wali')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full mb-5 px-10">
                <label for="nama_wali" class="text-base text-primary font-bold">Nama Wali kelas</label>
                <input disabled wire:model.live="nama_wali" type="text" id="nama_wali" name="nama_wali"
                    class="w-full text-dark rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" required />
                @error('nama_wali')
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
