<div>
    {{-- In work, do what you enjoy. --}}
    <div class="flex space-x-6 justify-center mx-5 mt-6">

        <!-- Card Jumlah Total Guru -->
        <div class="flex flex-col justify-between p-5 bg-white rounded-lg shadow-md border-2 border-[#245237] hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-4xl font-bold text-[#245237]">{{ $total_guru }}</p>
                    <p class="text-lg font-bold text-gray-600 mt-2">Jumlah Total Guru</p>
                </div>
                <img src="{{ asset('assets/img/jumlah-guru.svg') }}" alt="Jumlah Buku" class="w-24 h-24 lg:w-32 lg:h-32 object-contain">
            </div>
            <a href="{{ route('guru.kelola') }}"
                class="mt-4 text-center bg-[#245237] text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition">
                More Info
            </a>
        </div>

        <!-- Card Jumlah Total Siswa -->
        <div class="flex flex-col justify-between p-5 bg-white rounded-lg shadow-md border-2 border-[#245237] hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-4xl font-bold text-[#245237]">{{ $total_siswa }}</p>
                    <p class="text-lg font-bold text-gray-600 mt-2">Jumlah Total Siswa</p>
                </div>
                <img src="{{ asset('assets/img/jumlah-siswa.svg') }}" alt="Jumlah Buku" class="w-24 h-24 lg:w-32 lg:h-32 object-contain">
            </div>
            <a href="{{ route('siswa.kelola') }}"
                class="mt-4 text-center bg-[#245237] text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition">
                More Info
            </a>
        </div>

        <!-- Card Jumlah Total Petugas -->
        <div class="flex flex-col justify-between p-5 bg-white rounded-lg shadow-md border-2 border-[#245237] hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-4xl font-bold text-[#245237]">{{ $total_petugas }}</p>
                    <p class="text-lg font-bold text-gray-600 mt-2">Jumlah Petugas</p>
                </div>
                <img src="{{ asset('assets/img/jumlah-buku-dipinjam.svg') }}" alt="Jumlah Buku" class="w-24 h-24 lg:w-32 lg:h-32 object-contain">
            </div>
            <a href="{{ route('petugas.kelola') }}"
                class="mt-4 text-center bg-[#245237] text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition">
                More Info
            </a>
        </div>


    </div>
</div>
