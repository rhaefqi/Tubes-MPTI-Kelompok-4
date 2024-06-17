    {{-- Be like water. --}}
    <div class="{{ $this->edit == true ? '' : 'hidden' }}">
        {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
        <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
        <div class="bg-gray-200 opacity-40 fixed inset-0"></div>
        {{-- @dump($this->petugasE) --}}
        <div class="bg-white rounded-md m-auto fixed inset-0 max-w-lg max-h-fit border-2 border-primary">
            <div class="py-3 flex items-center justify-center">
                <span class="font-primary text-xl font-open font-semibold">
                    Edit Data Kategori
                </span>
                {{-- <div x-on:click="show = false" class="absolute right-0 mr-3 font-open font-bold hover:cursor-pointer">X</div> --}}
            </div>
            <livewire:alert-gagal />
            <div class="font-open mt-4 flex flex-col">
                <form wire:submit.prevent="updateKategori" class="">
                    <div class="w-full mb-5 px-10">
                        <label for="kategori" class="text-base text-primary font-bold">Kategori Buku</label>
                        <input autocomplete="off" wire:model.live="kategori" type="text" id="kategori" name="kategori"
                            class="w-full text-dark rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary"
                            required />
                        @error('kategori')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex justify-center mb-7">
                        <button
                            class="mr-3 text-base font-semibold text-white bg-primary py-3 px-8 rounded-lg hover:opacity-80 hover:shadow-lg transition duration-300"
                            type="submit">
                            Edit
                        </button>
                        <button wire:click.prevent="batalEdit"
                            class="text-base font-semibold text-white bg-red-800 py-3 px-8 rounded-lg hover:opacity-80 hover:shadow-lg transition duration-300">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @include('livewire.gagal-edit')
    </div>
