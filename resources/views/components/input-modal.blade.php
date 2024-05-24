@props(['title'])
<div 
    x-data = "{ show : true}"
    x-show = "show"
    x-on:open-input.window = "show = true"
    x-on:close-input.window = "show = false"
    x-on:keydown.escape.window = "show = false"

style="display:none"
class="fixed z-50 inset-0">
    <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
    <div class="bg-gray-200 opacity-40 fixed inset-0"></div>
    <div class="bg-white rounded-md m-auto fixed inset-0 max-w-lg h-4/5 border-2 border-primary">
        <div class="py-3 flex items-center justify-center">
        @if (isset($title))
        <span class="font-primary text-xl font-open font-semibold">
            {{ $title }}
        </span>
        @endif
            {{-- <div x-on:click="show = false" class="absolute right-0 mr-3 font-open font-bold hover:cursor-pointer">X</div> --}}
        </div>
        <div class="font-open mt-4 flex flex-col">
            <form action="" class="">
                <div class="w-full mb-5 px-10">
                    <label for="name" class="text-base text-primary font-bold">NIP</label>
                    <input type="text" id="name" name="nama"
                        class="w-full text-dark rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" required />
                </div>
                <div class="w-full mb-5 px-10">
                    <label for="name" class="text-base text-primary font-bold">Nama</label>
                    <input type="text" id="name" name="nama"
                        class="w-full text-dark rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" required />
                </div>
                <div class="w-full mb-5 px-10 flex flex-col space-y-1">
                    <label for="Jenis_kelamin" class="text-base text-primary font-bold">Jenis Kelamin</label>
                    <div class="flex space-x-4">
                        <div class="flex items-center space-x-1">
                            <input type="radio" id="laki_laki" name="jenis_kelamin"
                            class=" text-dark rounded-full transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" required />
                            <label for="laki_laki" class="text-base text-primary font-bold">Laki Laki</label>
                        </div>
                        <div class="flex items-center space-x-1">
                            <input type="radio" id="perempuan" name="jenis_kelamin"
                                class=" text-dark rounded-full transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" required />
                            <label for="perempuan" class="text-base text-primary font-bold">Perempuan</label>
                        </div>
                    </div>
                </div>
                <div class="w-full mb-5 px-10 flex flex-col">
                    <label for="tingkat" class="text-base text-primary font-bold">Tingkat</label>
                    <select name="tingkat" id="tingkat" class=" w-full rounded-md transition duration-300 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" required ">
                        <option value="ma">MA (Madrasah Aliyah)</option>
                        <option value="mts">MTs (Madrasah Tsanawiyah)</option>
                        <option value="sd">SD (Sekolah Dasar)</option>
                    </select>
                </div>

                    <div class="flex justify-center inset-x-0 bottom-0 absolute mb-7">
                        <button class="mr-3 text-base font-semibold text-white bg-primary py-3 px-8 rounded-lg hover:opacity-80 hover:shadow-lg transition duration-300" type="submit">
                            Kirim
                        </button>
                        <button x-on:click="show = false" class="text-base font-semibold text-white bg-red-800 py-3 px-8 rounded-lg hover:opacity-80 hover:shadow-lg transition duration-300">
                            Batal
                        </button>
                    </div>
            </form>
        </div>
    </div>
</div>