{{-- <div> --}}
    {{-- The whole world belongs to you. --}}
{{-- </div> --}}
<div class="{{ $this->edit == true ? '' : 'hidden' }}">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
    <div class="bg-gray-200 opacity-40 fixed inset-0"></div>
    {{-- @dump($this->staffE) --}}
    <div class="bg-white rounded-md m-auto fixed inset-0 max-w-lg max-h-fit border-2 border-primary">
        <div class="py-3 flex items-center justify-center">
            <span class="font-primary text-xl font-open font-semibold">
                Edit Data Staff
            </span>
            {{-- <div x-on:click="show = false" class="absolute right-0 mr-3 font-open font-bold hover:cursor-pointer">X</div> --}}
        </div>
        <livewire:alert-gagal />
        <div class="font-open mt-4 flex flex-col">
            <form wire:submit.prevent="updateStaff  " class="">
                <div class="">
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
    <div class="hidden" wire:target="updateStaff" wire:loading.class.remove="hidden">
        <div wire:loading.class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 ">
            <div class="w-full max-w-md m-auto bg-white rounded-lg shadow-md p-4 text-center">
                <div class="mb-4 text-center">
                    <span class="text-gray-700">memproses...</span>
                </div>
                {{-- @dump($this->progress) --}}
                <div role="status">
                    <svg aria-hidden="true"
                        class="inline w-10 h-10 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="currentColor" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentFill" />
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</div>
