{{-- <div> --}}
    {{-- The best athlete wants his opponent at his best. --}}
    <div id="berhasilUpdate" class="{{ $this->berhasilUpdate == true ? '' : 'hidden' }}">
        <!-- The only way to do great work is to love what you do. - Steve Jobs -->
        <div class="bg-gray-200 opacity-40 fixed inset-0"></div>
        <div class="bg-white rounded-md m-auto fixed inset-0 max-w-xl max-h-fit border-2 border-red-600">
            <div class=" p-4 w-full max-h-full">
                <div class="relative bg-white rounded-lg dark:bg-gray-700">
    
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-primary w-16 h-16 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 10l3 3L15 7" />
                            <circle cx="10" cy="10" r="9" stroke="currentColor" stroke-width="2" fill="none"/>
                        </svg>

                        <h3 class="mb-5 text-2xl font-semibold text-primary dark:text-gray-400">
                            {{ $this->pesan }}
                        </h3>
    
                        <button wire:click="berhasilEdit" type="button"
                            class="text-white bg-primary hover:bg-primary focus:ring-4 focus:outline-none dark:focus:ring-red-800 font-medium rounded-lg text-md inline-flex items-center px-5 py-2.5 text-center">
                            Oke
                        </button>
                        
                    </div>
                </div>
            </div>
    
        </div>
    </div>
{{-- </div> --}}
