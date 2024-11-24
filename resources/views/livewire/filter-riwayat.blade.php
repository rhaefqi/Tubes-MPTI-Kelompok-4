<div class="flex flex-col gap-4  bg-white shadow-md rounded-lg p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-start gap-4 md:justify-between">
        <div class="flex items-start">
            <p class="bg-[#245237] font-semibold text-white rounded-lg px-3 py-2 text-sm md:text-lg flex items-center gap-2">
                <span class="mdi mdi-book-open-blank-variant-outline"></span> Riwayat Peminjaman
            </p>
        </div>
        <!-- Filter Tanggal -->
        <div class="flex gap-3 items-center justify-center">
            <input type="date" wire:model.lazy="from" class="border border-gray-300 rounded-md px-3 py-2 text-sm w-full max-w-xs" />
            <span class="text-sm font-bold">sampai</span>
            <input type="date" wire:model.lazy="until" class="border border-gray-300 rounded-md px-3 py-2 text-sm w-full max-w-xs" />
        </div>
    </div>

    <!-- Daftar Riwayat -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
        @foreach ($riwayats as $riwayat)
        <!-- Card Buku -->
        <a href="{{ route('detail.buku', $riwayat->buku_id) }}" class="bg-white border rounded-lg shadow-md hover:shadow-lg transition-shadow p-4 flex flex-col items-center">
            <!-- Gambar Buku -->
            <img src="{{ asset($riwayat->buku->sampul_buku) }}" alt="Sampul Buku" class="w-32 h-44 rounded-md mb-3 object-cover">

            <!-- Informasi Buku -->
            <div class="w-full text-start">
                <p class="font-semibold text-sm">{{ $riwayat->buku->judul }}</p>
                <p class="text-gray-600 text-xs">{{ $riwayat->buku->penulis }}</p>
            </div>

            <!-- Divider -->
            <div class="w-full border-t border-gray-200 my-2"></div>

            <!-- Informasi Peminjaman -->
            @php
                $tanggalPinjam = \Carbon\Carbon::parse($riwayat->tanggal_pinjam);
                $tanggalKembali = $riwayat->tanggal_kembali ? \Carbon\Carbon::parse($riwayat->tanggal_kembali) : null;
                $tanggalJatuhTempo = $tanggalPinjam->copy()->addDays(5);
            @endphp

            <div class="w-full text-xs space-y-1">
                <div class="bg-[#F0C001] text-black font-semibold rounded-md px-2 py-1">
                    <span class="mdi mdi-calendar-text"></span> Dipinjam: {{ $tanggalPinjam->translatedFormat('d F Y') }}
                </div>
                <div class="bg-[#00A218] text-white font-semibold rounded-md px-2 py-1">
                    <span class="mdi mdi-bell"></span> Jatuh Tempo: {{ $tanggalJatuhTempo->translatedFormat('d F Y') }}
                </div>
                <div class="font-semibold rounded-md px-2 py-1 {{ $tanggalKembali == null ? 'bg-red-400 text-white' : 'bg-[#F7D914] text-black' }}">
                    <span class="mdi mdi-checkbox-marked"></span>
                    @if ($tanggalKembali == null)
                        Belum dikembalikan
                    @else
                        Kembali: {{ $tanggalKembali->translatedFormat('d F Y') }}
                    @endif
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
