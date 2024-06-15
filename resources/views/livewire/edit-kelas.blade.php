    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="{{ $this->edit == true ? '' : 'hidden' }}">
        {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
        <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
        <div class="bg-gray-200 opacity-40 fixed inset-0"></div>
        {{-- @dump($this->petugasE) --}}
        <div class="bg-white rounded-md m-auto fixed inset-0 max-w-lg max-h-fit border-2 border-primary">
            <div class="py-3 flex items-center justify-center">
                <span class="font-primary text-xl font-open font-semibold">
                    Edit Data Kelas
                </span>
                {{-- <div x-on:click="show = false" class="absolute right-0 mr-3 font-open font-bold hover:cursor-pointer">X</div> --}}
            </div>
            <livewire:alert-gagal />
            <div class="font-open mt-4 flex flex-col">
                <form wire:submit.prevent="updateKelas" class="">
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
                                Edit
                            </button>
                            <button wire:click.prevent="batalEdit" class="text-base font-semibold text-white bg-red-800 py-3 px-8 rounded-lg hover:opacity-80 hover:shadow-lg transition duration-300">
                                Batal
                            </button>
                        </div>
                </form>
            </div>
        </div>
        @include('livewire.gagal-edit')
    </div>
