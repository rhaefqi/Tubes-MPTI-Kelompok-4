<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <form action="" wire:submit.prevent="editProfile">
        <div class="flex w-full justify-center md:max-w-screen-lg mx-auto my-10">
            <div class="flex flex-col border border-1 border-[#245237] rounded-lg w-2/3 items-center p-5 md:gap-6 gap-5">
                <div class="flex gap-1 w-full justify-start">
                    <span class="text-xl font-semibold text-[#245237] mdi mdi-account-edit"></span>
                    <p class="text-lg font-semibold text-[#245237]">
                        Ubah Profile
                    </p>
                </div>
        
                <div class="flex relative">
                    <img id="profile-image" 
                         src="{{ $photo ? $photo->temporaryUrl() : (auth()->user()->photo_profile == null ? asset('assets/img/fadillah.jpg') : asset(auth()->user()->photo_profile)) }}" 
                         class="w-20 lg:w-28 h-20 lg:h-28 rounded-full" 
                         alt="Profile Image">
                    <button class="flex absolute -bottom-2 -right-2 drop-shadow-lg p-1 rounded-full w-8 h-8 bg-white items-center justify-center">
                        <input type="file" name="photo" wire:model.live="photo" id="file-input" class="hidden" />
                        <span class="text-xl mdi mdi-image-edit text-[#245237] hover:text-[#F7D914]" onclick="document.getElementById('file-input').click();"></span>
                    </button>
                </div>
        
                <div class="flex flex-col md:flex-row md:gap-5 gap-4">
                    <div class="flex flex-col w-full justify-start gap-3">
                        <div class="flex flex-col">
                            <div class="flex">
                                <div class="text-white font-semibold text-[12px] lg:text-[15px] bg-[#245237] px-2 rounded-xl"><span class="mdi mdi-account"></span> Data Akun</div>
                            </div>
                            <div class="text-[7.5px] lg:text-[10px] font-normal italic">*Data yang dapat anda rubah untuk tampilan di website</div>
                        </div>
        
                        <div class="flex flex-col gap-2">
                            <input type="hidden" name="id" wire:model="id" value="{{auth()->user()->id}}">
                            <div class="flex flex-col">
                                <label for="" class="text-[12px] lg:text-[15px] font-semibold">Username</label>
                                <input type="text" name="username" wire:model.live.debounce.500ms="username" class="bg-[#F2F2F2] border border-1 border-[#245237] border-opacity-75 rounded-lg text-[12px] lg:text-[15px]  px-3 font-normal"  required>
                                @error('username')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
        
                            <div class="flex flex-col">
                                <label for="" class="text-[12px] lg:text-[15px]  font-semibold">Email</label>
                                <input type="email" name="email" wire:model.live.debounce.500ms="email" class="bg-[#F2F2F2] border border-1 border-[#245237] border-opacity-75 rounded-lg text-[12px] lg:text-[15px]  px-3 font-normal"  required>
                                @error('email')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
        
                            <div class="flex flex-col">
                                <label for="" class="text-[12px] lg:text-[15px]  font-semibold">Nomor Telepon</label>
                                <input type="text" name="telp" wire:model.live.debounce.500ms="telp" class="bg-[#F2F2F2] border border-1 border-[#245237] border-opacity-75 rounded-lg text-[12px] lg:text-[15px]  px-3 font-normal"  required>
                                @error('telp')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
        
                    <div class="flex flex-col w-full justify-start gap-3">
                        <div class="flex flex-col">
                            <div class="flex">
                                <div class="text-white font-semibold text-[12px] lg:text-[15px]  bg-[#245237] px-2 rounded-xl"><span class="mdi mdi-account-circle"></span> Data Diri</div>
                            </div>
                            <div class="text-[7.5px] lg:text-[10px]  font-normal italic">*Data dari sekolah tidak dapat anda rubah</div>
                        </div>
        
                        <div class="flex flex-col gap-2">
                            <div class="flex flex-col">
                                <label for="" class="text-[12px] lg:text-[15px]  font-semibold">{{ auth()->user()->status == 'siswa' ? 'NISN' : 'NIP' }}</label>
                                <input type="text" class="bg-[#D9D9D9] border border-1 border-[#245237] border-opacity-75 rounded-lg text-[12px] lg:text-[15px]  px-3 font-normal" value="{{ auth()->user()->status == 'siswa' ? auth()->user()->siswa->nisn : auth()->user()->guru->nip }}" readonly>
                            </div>
        
                            <div class="flex flex-col">
                                <label for="" class="text-[12px] lg:text-[15px]  font-semibold">Nama</label>
                                <input type="email" class="bg-[#D9D9D9] border border-1 border-[#245237] border-opacity-75 rounded-lg text-[12px] lg:text-[15px]  px-3 font-normal" value="{{ auth()->user()->status == 'siswa' ? auth()->user()->siswa->nama : auth()->user()->guru->nama }}" readonly>
                            </div>
        
                            <div class="flex flex-col">
                                <label for="" class="text-[12px] lg:text-[15px]  font-semibold">Tingkat</label>
                                <input type="text" class="bg-[#D9D9D9] border border-1 border-[#245237] border-opacity-75 rounded-lg text-[12px] lg:text-[15px]  px-3 font-normal" value="{{ auth()->user()->status == 'siswa' ? auth()->user()->siswa->tingkat : auth()->user()->guru->tingkat }}" readonly>
                            </div>
                            @if (auth()->user()->status == 'siswa')    
                            <div class="flex flex-col">
                                <label for="" class="text-[12px] lg:text-[15px]  font-semibold">Kelas</label>
                                <input type="text" class="bg-[#D9D9D9] border border-1 border-[#245237] border-opacity-75 rounded-lg text-[12px] lg:text-[15px]  px-3 font-normal" value="{{ auth()->user()->siswa->kelas }}" readonly>
                            </div>
                            @endif
                            @php
                                $user = auth()->user();
                                $profile = $user->status == 'siswa' ? $user->siswa : $user->guru;
                                $jenis_kelamin = $profile->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan';
                            @endphp
                            <div class="flex flex-col">
                                <label for="" class="text-[12px] lg:text-[15px]  font-semibold">Jenis Kelamin</label>
                                <input type="text" class="bg-[#D9D9D9] border border-1 border-[#245237] border-opacity-75 rounded-lg text-[12px] lg:text-[15px]  px-3 font-normal" value="{{$jenis_kelamin}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="flex">
                    <button type="submit" class="bg-[#328754] text-white text-[12px] lg:text-[15px]  font-medium px-5 py-1 rounded-md">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </form>

    @include('livewire.berhasil-update')
    @include('livewire.gagal-edit')
</div>
