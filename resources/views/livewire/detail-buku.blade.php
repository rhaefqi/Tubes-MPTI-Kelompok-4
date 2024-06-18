{{-- <div> --}}
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
{{-- </div> --}}
<div id="tampilDetail" class="{{ $this->tampilDetail == true ? '' : 'hidden' }}">
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    <div class="bg-gray-200 opacity-40 fixed inset-0"></div>
    <div class="bg-white rounded-md m-auto fixed inset-0 max-w-xl max-h-fit border-2 border-red-600">
        <div class="p-4 w-full max-h-full">
            <div class="relative bg-white rounded-lg dark:bg-gray-700">
                <div class="flex justify-end">
                <button wire:click="tutupDetail" type="button"
                        class="text-white bg-primary hover:bg-primary focus:ring-4 focus:outline-none dark:focus:ring-red-800 font-medium rounded-lg text-[12px] inline-flex items-center px-4 py-2 text-center">
                        Tutup
                </button>
                </div>
                @php
                    // dd($detail)
                @endphp
                <div class="p-3 pt-0 text-center">
                    <div class="flex flex-col lg:flex-row px-11 gap-2 md:gap-4">
                        <div class="flex w-full justify-center items-start">
                            {{-- @dump(strlen($detail->sampul_buku) > 40) --}}
                            <img src="{{ asset($detail->sampul_buku) }}" alt="" class="w-36 lg:w-64 border border-1 border-primary rounded-md">
                        </div>
                        <div class="flex flex-col gap-4 text-start">
                            <div class="flex flex-col gap-0">
                                <div class="flex gap-2 items-center">
                                    <p class="text-[15px] font-bold">{{ $detail->judul }}</p>
                                    <p class="bg-[#245237] rounded-full px-2 text-white text-[12px]">{{ $detail->view }} views</p>
                                    
                                </div>
                                <div class="flex gap-2">
                                    <p class="text-[12px]">Penulis : {{ $detail->penulis }}</p>
                                </div>
                            </div>
                
                            <div class="flex flex-col gap-1">
                                <p class="text-[15px] font-semibold">Deskripsi</p>
                                <div class="w-full flex">
                                    <p class="text-[12px] font-normal">
                                        {{ $detail->deskripsi }}
                                    </p>
                                </div>
                            </div>
                
                            <div class="flex flex-col gap-1 w-3/4">
                                <p class="text-[15px] font-semibold">Informasi Buku</p>
                                <table class="w-full">
                                    <tbody class="text-center text-[12px] font-normal">
                                        <tr>
                                            <td class="text-left">No. Seri</td>
                                            <td class="text-end">:</td>
                                            <td class="text-left">{{ $detail->no_seri }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Penerbit</td>
                                            <td class="text-end">:</td>
                                            <td class="text-left">{{ $detail->penerbit }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Tahun Terbit</td>
                                            <td class="text-end">:</td>
                                            <td class="text-left">{{ $detail->tahun_terbit }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">ISBN</td>
                                            <td class="text-end">:</td>
                                            <td class="text-left">{{ $detail->isbn }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Kelas</td>
                                            <td class="text-end">:</td>
                                            <td class="text-left">{{ $detail->kelas }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Kategori</td>
                                            <td class="text-end">:</td>
                                            <td class="text-left">{{ $detail->kategori }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Subjek</td>
                                            <td class="text-end">:</td>
                                            <td class="text-left">{{ $detail->subjek }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>