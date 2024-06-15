<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="flex flex-col lg:gap-6 gap-5">
        <div class="flex justify-between w-full">
            <div class="flex">
                <p class="text-2xl text-gray-500 font-semibold">Baru Dipinjam</p>
           </div>
            <div class="flex">
                 <select id="urutkan" wire:model="sortOrder" wire:click="filterPinjam" class="select w-full max-w-xs select-sm py-0 border-1 border-[#245237] border rounded-full lg:text-[12px] text-[8px] text-[#245237]">
                    <option value="asc">A-Z</option>
                    <option value="desc">Z-A</option>
                    <option value="Dekat">Tenggat terdekat</option>
                    <option value="Jauh">Tenggat terjauh</option>
                </select>   
            </div>
        </div>
        <div class="flex flex-col gap-3">
            @foreach ($daftarPinjams as $daftarPinjam)  
            
            @php
                $tanggalPinjam = \Carbon\Carbon::parse($daftarPinjam->tanggal_pinjam);
                $tanggalJatuhTempo = $tanggalPinjam->copy()->addDays(5);
                $sekarang = \Carbon\Carbon::now();
                $sisaHari = $sekarang->diffInDays($tanggalJatuhTempo, false);
            @endphp
            <div class="flex gap-2"> 
                <div class="flex w-2/5 md:w-28">
                    <img src="{{ asset('assets/img/'. $daftarPinjam->sampul_buku ) }}" class="w-24 h-36 rounded-md">
                </div>
                <div class="flex flex-col w-3/5 md:2/3">
                    <div class="flex">
                        <p class=" 
                            @if ($sekarang->greaterThan($tanggalJatuhTempo))
                                bg-red-500
                            @else
                                bg-[#245237]
                            @endif text-white font-bold lg:text-[15px] text-[12px] px-2 rounded-md text-left">
                            @if ($sekarang->greaterThan($tanggalJatuhTempo))
                                Lewat tenggat
                            @else
                                {{ $sisaHari}} hari lagi
                            @endif
                        </p>
                    </div>

                    <div class="flex flex-col">
                        <p class="lg:text-[20px] text-[15px] font-medium">{{ $daftarPinjam->judul }}</p>
                        <p class="lg:text-[15px] text-[12px] font-normal">
                            {{ $daftarPinjam->deskripsi }}                                
                        </p>
                    </div>

                    <div class="flex flex-col gap-1">
                        <div class="flex">
                            <p class="bg-[#F0C001] lg:text-[15px] text-[12px] px-2 rounded-md text-left">Dipinjam : {{ $tanggalPinjam->translatedFormat('d F Y') }}</p>
                        </div>
                        <div class="flex">
                            <p class="bg-[#F7D914] lg:text-[15px] text-[12px] px-2 rounded-md text-left">Jatuh Tempo : {{ $tanggalJatuhTempo->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
