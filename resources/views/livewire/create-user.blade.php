<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="font-open mt-4 flex flex-col">
        <form wire:submit.prevent="createUser" class="">
            <div class="flex">
                <div class="flex-1">
                    <div class="w-full mb-5 px-10">
                        <label for="username" class="text-base text-primary font-bold">Username</label>
                        <input wire:model.live="username" type="text" id="username" name="username"
                            class="w-full text-dark rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary"
                            required />
                        @error('username')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full mb-5 px-10">
                        <label for="email" class="text-base text-primary font-bold">Email</label>
                        <input wire:model.live="email" type="text" id="email" name="email"
                            class="w-full text-dark rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary"
                            required />
                        @error('email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full mb-5 px-10">
                        <label for="no_hp" class="text-base text-primary font-bold">Nomor Hp</label>
                        <input wire:model.live="no_hp" type="text" id="no_hp" name="no_hp"
                            class="w-full text-dark rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary"
                            required />
                        @error('no_hp')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full mb-5 px-10 ">
                        <label for="password" class="text-base text-primary font-bold">Password</label>
                        <div class="flex gap-2">
                            <input wire:model.live="password" type="password" id="password" name="password"
                                class="w-full text-dark rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary"
                                required />
                                <span class="flex items-center text-lg">
                                    <i class="far fa-eye cursor-pointer" id="togglePassword"></i>
                                </span>
                        </div>
                        @error('password')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full mb-5 px-10">
                        <label for="konfirmasi_password" class="text-base text-primary font-bold">Konfirmasi
                            Password</label>
                        <div class="flex gap-2">
                            <input wire:model.live="konfirmasi_password" type="password" id="konfirmasi_password"
                                name="konfirmasi_password"
                                class="w-full text-dark rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary"
                                required />
                                <span class="flex items-center text-lg">
                                    <i class="far fa-eye cursor-pointer" id="toggleKonPassword"></i>
                                </span>
                        </div>
                        @error('konfirmasi_password')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex-1">
                    <div class="w-full mb-5 px-10">
                        <label for="status" class="text-base text-primary font-bold">Status</label>
                        <select wire:model.live="status" wire:click="checkStatus" type="text" id="status"
                            name="status"
                            class="w-full text-dark rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary"
                            required>
                            <option value="">Pilih Status</option>
                            <option value="pegawai">Pegawai</option>
                            <option value="guru">Guru</option>
                            <option value="siswa">Siswa</option>
                        </select>
                        @error('status')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full mb-5 px-10 {{ $this->disabled == 2 ? '' : 'hidden' }}">
                        <label for="nis_nip" class="text-base text-primary font-bold">NISN / NIP</label>
                        <input wire:model.live="nis_nip" type="text" id="nis_nip" name="nis_nip"
                            class="w-full text-dark rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary"
                            {{ $this->disabled == 2 ? 'required' : '' }} />
                        @error('nis_nip')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full mb-5 px-10 {{ $this->disabled == 1 ? '' : 'hidden' }}">
                        <label for="nama" class="text-base text-primary font-bold">Nama</label>
                        <input wire:model.live="nama" type="text" id="nama" name="nama"
                            class="w-full text-dark rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary"
                            {{ $this->disabled == 1 ? 'required' : '' }} />
                        @error('nama')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full mb-5 px-10 {{ $this->disabled == 1 ? '' : 'hidden' }}">
                        <div class="text-base text-primary font-bold">Jenis Kelamin</div>
                        <div class="flex space-x-4">
                            <div class="flex items-center space-x-1">
                                <input wire:model.live="jenis_kelamin_petugas" type="radio" id="laki_laki"
                                    name="jenis_kelamin_petugas" value="L"
                                    class=" text-dark rounded-full transition duration-300 "
                                    required />
                                <label for="laki_laki" class="text-base text-primary font-bold">Laki Laki</label>
                            </div>
                            <div class="flex items-center space-x-1">
                                <input wire:model.live="jenis_kelamin_petugas" type="radio" id="perempuan"
                                    name="jenis_kelamin_petugas" value="P"
                                    class=" text-dark rounded-full transition duration-300"
                                    required />
                                <label for="perempuan" class="text-base text-primary font-bold">Perempuan</label>
                            </div>
                        </div>
                        @error('jenis_kelamin_petugas')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
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
    {{-- <livewire:konfirmasi-tutup> --}}
        <div class="hidden" wire:target="createUser" wire:loading.class.remove="hidden">
            <div wire:loading.class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 ">
                <div class="w-full max-w-md m-auto bg-white rounded-lg shadow-md p-4 text-center">
                    <div class="mb-4 text-center">
                        <span class="text-gray-700">memproses...</span>
                        </div>
                    {{-- @dump($this->progress) --}}
                    <div role="status">
                        <svg aria-hidden="true" class="inline w-10 h-10 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                        </svg>
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
</div>
