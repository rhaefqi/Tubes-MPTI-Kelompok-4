<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="flex space-x-6 justify-center mx-5 mt-6">
    

        <!-- Card Jumlah Total Buku -->
        <div class="flex flex-col justify-between p-5 bg-white rounded-lg shadow-md border-2 border-[#245237] hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-4xl font-bold text-[#245237]">{{ $total_buku }}</p>
                    <p class="text-lg font-bold text-gray-600 mt-2">Jumlah Total Buku</p>
                </div>
                <img src="{{ asset('assets/img/jumlah-total-buku.svg') }}" alt="Jumlah Buku" class="w-24 h-24 lg:w-32 lg:h-32 object-contain">
            </div>
            <a href="{{ route('buku.kelola') }}"
                class="mt-4 text-center bg-[#245237] text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition">
                More Info
            </a>
        </div>

        <!-- Card Jumlah Buku Dipinjam -->
        <div class="flex flex-col justify-between p-5 bg-white rounded-lg shadow-md border-2 border-[#245237] hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-4xl font-bold text-[#245237]">{{ $total_pinjam}}</p>
                    <p class="text-lg font-bold text-gray-600 mt-2">Jumlah Buku <br> Dipinjam Bulan ini</p>
                </div>
                <img src="{{ asset('assets/img/jumlah-buku-dipinjam.svg') }}" alt="Jumlah Buku" class="w-24 h-24 lg:w-32 lg:h-32 object-contain">
            </div>
            <a href="{{ route('absensi') }}"
                class="mt-4 text-center bg-[#245237] text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition">
                More Info
            </a>
        </div>

         <!-- Card Jumlah Total Pengunjung -->
         <div class="flex flex-col justify-between p-5 bg-white rounded-lg shadow-md border-2 border-[#245237] hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-4xl font-bold text-[#245237]">{{ $total_pengunjung}}</p>
                    <p class="text-lg font-bold text-gray-600 mt-2">Jumlah Pengunjung <br> Perpustakaan Bulan ini</p>
                </div>
                <img src="{{ asset('assets/img/jumlah-pengunjung.svg') }}" alt="Jumlah Buku" class="w-24 h-24 lg:w-32 lg:h-32 object-contain">
            </div>
            <a href="#"
                class="mt-4 text-center bg-[#245237] text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition">
                More Info
            </a>
        </div>

    </div>
</div>
