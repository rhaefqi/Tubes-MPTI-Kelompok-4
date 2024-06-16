<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <form wire:submit.prevent="gantiPassword">
        <div class="flex w-full justify-center md:max-w-screen-lg mx-auto my-10 px-2">
            <div class="flex flex-col border border-1 border-[#245237] rounded-lg w-full md:w-2/3 items-center p-5 md:gap-6 gap-5">
                <div class="flex flex-col">
                    <div class="flex w-full justify-center">
                        <span class="text-xl font-semibold text-[#245237] mdi mdi-pencil-circle"></span>
                        <p class="text-lg md:text-xl font-semibold text-[#245237]">
                            Ubah Kata Sandi
                        </p>
                    </div>
                    <div class="flex w-full justify-center">
                        <p class="text-[10px] md:text-[12px] font-normal text-opacity-50 text-center">Masukan kata sandi lama dan baru anda pastikan kata sandi baru anda cukup kuat</p>
                    </div>
                </div>
        
                <div class="flex flex-col md:flex-row md:gap-5 gap-4 w-2/3">
                    <div class="flex flex-col w-full justify-start gap-1 md:gap-2">
                        <div class="flex flex-col w-full">
                            <label for="old-password" class="text-xs md:text-[15px] font-semibold">Kata Sandi Lama</label>
                            <div class="flex gap-2 items-center">
                                <input type="password" wire:model="old_password" id="old-password" class="bg-gray-200 border border-green-800 border-opacity-75 rounded-lg text-xs lg:text-sm px-3 font-normal w-full" placeholder="Masukkan password Anda saat ini">
                                <span id="toggle-old-password" class="text-2xl mdi mdi-eye cursor-pointer" onclick="togglePassword('old-password')"></span>
                            </div>
                            @error('old_password') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="flex flex-col">
                            <label for="new-password" class="text-xs md:text-[15px] font-semibold">Kata Sandi Baru</label>
                            <div class="flex gap-2 items-center">
                                <input type="password" wire:model="new_password" id="new-password" class="bg-gray-200 border border-green-800 border-opacity-75 rounded-lg text-xs lg:text-sm px-3 font-normal w-full" placeholder="Masukkan password Anda yang baru">
                                <span id="toggle-new-password" class="text-2xl mdi mdi-eye cursor-pointer" onclick="togglePassword('new-password')"></span>
                            </div>
                            @error('new_password') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="flex flex-col">
                            <label for="confirm-password" class="text-xs md:text-[15px] font-semibold">Konfirmasi Kata Sandi Baru</label>
                            <div class="flex gap-2 items-center">
                                <input type="password" wire:model="confirm_password" id="confirm-password" class="bg-gray-200 border border-green-800 border-opacity-75 rounded-lg text-xs lg:text-sm px-3 font-normal w-full" placeholder="Konfirmasi password baru Anda">
                                <span id="toggle-confirm-password" class="text-2xl mdi mdi-eye cursor-pointer" onclick="togglePassword('confirm-password')"></span>
                            </div>
                            @error('confirm_password') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="bg-[#328754] text-white text-[12px] lg:text-[15px] font-medium px-5 py-1 rounded-md">Simpan Perubahan</button>
            </div>
        </div>
    </form>

    @include('livewire.berhasil-update')
</div>
