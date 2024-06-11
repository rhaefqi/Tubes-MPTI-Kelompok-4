<div class="{{ $this->edit == true ? '' : 'hidden' }}">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
    <div class="bg-gray-200 opacity-40 fixed inset-0"></div>
    {{-- @dump($this->petugasE) --}}
    <div class="bg-white rounded-md m-auto fixed inset-0 max-w-lg max-h-fit border-2 border-primary">
        <div class="py-3 flex items-center justify-center">
            <span class="font-primary text-xl font-open font-semibold">
                Edit Data Petugas
            </span>
            {{-- <div x-on:click="show = false" class="absolute right-0 mr-3 font-open font-bold hover:cursor-pointer">X</div> --}}
        </div>
        <livewire:alert-gagal />
        <div class="font-open mt-4 flex flex-col">
            <form wire:submit.prevent="updatePetugas" class="">
                <div class="w-full mb-5 px-10">
                    <input type="hidden" name="idp" wire:model="idp">
                    <label for="nama_petugas" class="text-base text-primary font-bold">Nama</label>
                    <input wire:model.live="namap" type="text" id="nama_petugasp" name="nama_petugas"
                        class="w-full text-dark rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary"
                        required value="" />
                    @error('nama_petugas')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full mb-5 px-10 flex flex-col space-y-1">
                    <div class="text-base text-primary font-bold">Jenis
                        Kelamin</div>
                    <div class="flex space-x-4">
                        <div class="flex items-center space-x-1">
                            <input wire:model.live="jkp" type="radio" id="laki_lakip"
                                name="jenis_kelamin_petugas" value="L"
                                class=" text-dark rounded-full transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary"
                                required />
                            <label for="laki_lakip" class="text-base text-primary font-bold">Laki Laki</label>
                        </div>
                        <div class="flex items-center space-x-1">
                            <input wire:model.live="jkp" type="radio" id="perempuanp"
                                name="jenis_kelamin_petugas" value="P"
                                class=" text-dark rounded-full transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary"
                                required />
                            <label for="perempuanp" class="text-base text-primary font-bold">Perempuan</label>
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
</div>
