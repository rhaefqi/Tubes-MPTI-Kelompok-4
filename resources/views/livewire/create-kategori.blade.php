    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div>
        {{-- Because she competes with no one, no one can compete with her. --}}
        <div class="font-open mt-4 flex flex-col">
            <form wire:submit.prevent="createKategori" class="">
                <div class="flex">
                    <div class="w-full mb-5 px-10">
                        <label for="kategori" class="text-base text-primary font-bold">Kategori Buku</label>
                        <input autocomplete="off" wire:model.live="kategori" type="text" id="kategori" name="kategori"
                            class="w-full text-dark rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary"
                            required />
                        @error('kategori')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
    
                <div class="flex justify-center mb-7">
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
        @include('livewire.konfirmasi-tutup')
    </div>
    