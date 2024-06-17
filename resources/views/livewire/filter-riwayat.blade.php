<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="flex flex-col gap-2">
        <!-- Desktop -->
        @php
            $sekarang = \Carbon\Carbon::now()->format('Y-m-d');
        @endphp
        <div class="flex flex-col gap-4 ">
            <div class="flex flex-col md:flex-row md:items-start gap-4 md:justify-between">
                <div class="flex items-start">
                    <p class="bg-[#245237] font-semibold text-white rounded-lg px-2 md:text-xl text-[13px]">
                        <span class="mdi mdi-book-open-blank-variant-outline"></span>
                        Riwayat Peminjaman
                    </p>
                </div>
                <div class="flex gap-3 items-center justify-center">
                    <input type="date" wire:model.lazy="from" class="input input-bordered input-xs w-full max-w-xs" />
                    <div class="text-xs font-bold">sampai</div>
                    <input type="date" wire:model.lazy="until" class="input input-bordered input-xs w-full max-w-xs" />
                </div>                
            </div>
            <div class="flex flex-wrap gap-3 justify-center md:justify-start md:px-5">

                @foreach ($riwayats as $riwayat)    
                    <a href="{{ route('detail.buku', $riwayat->buku_id ) }}" class="flex flex-col border border-1 border-opacity-50 border-[#245237] rounded-lg w-48 h-[18.5rem] items-center py-2 gap-1">
                        <img src="{{ asset('assets/img/'.$riwayat->buku->sampul_buku) }}" alt="" class="w-32 h-44 rounded-md">
        
                        <div class="flex flex-col items-start w-full px-2">
                            <div class="flex flex-col">
                                <p class="font-semibold text-[13px]">{{ $riwayat->buku->judul }}</p>
                                <p class="font-light text-[12px]">{{ $riwayat->buku->penulis }}</p>
                            </div>
                            
                            <div class="flex md:hidden w-full border border-1 border-opacity-50 border-black my-1"></div>

                            @php
                                $tanggalPinjam = \Carbon\Carbon::parse($riwayat->tanggal_pinjam);
                                $tanggalKembali = $riwayat->tanggal_kembali ? \Carbon\Carbon::parse($riwayat->tanggal_kembali) : null;
                                $tanggalJatuhTempo = $tanggalPinjam->copy()->addDays(5);
                            @endphp

                            <div class="flex flex-col text-[10px] gap-1">
                                <div class="bg-[#F0C001] font-semibold rounded-md px-2">
                                    <span class="mdi mdi-calendar-text"></span>
                                    Dipinjam : {{ $tanggalPinjam->translatedFormat('d F Y') }}
                                </div>
                                <div class="bg-[#00A218] font-semibold rounded-md px-2 text-white">
                                    <span class="mdi mdi-bell"></span>
                                    Jatuh Tempo : {{ $tanggalJatuhTempo->translatedFormat('d F Y') }}
                                </div>
                                <div class="font-semibold rounded-md px-2 {{ $tanggalKembali == NULL ? 'bg-red-400' : 'bg-[#F7D914]' }}">
                                    <span class="mdi mdi-checkbox-marked"></span>
                                    @if ($tanggalKembali == NULL)
                                        Belum dikembalikan
                                    @else
                                        Kembali : {{ $tanggalKembali->translatedFormat('d F Y') }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
