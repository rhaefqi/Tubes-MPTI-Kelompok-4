<div>
    {{-- Stop trying to control. --}}
    <div>
        <div class="mx-5">
            <!-- Dashboard Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-7">
                <!-- Card Jumlah Total Buku -->
                <div class="flex flex-col justify-between p-5 bg-white rounded-lg shadow-md border-2 border-[#245237] hover:shadow-lg transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-4xl font-bold text-[#245237]">{{ $total_buku }}</p>
                            <p class="text-lg font-bold text-gray-600 mt-2">Jumlah Total Buku</p>
                        </div>
                        <img src="{{ asset('assets/img/jumlah-total-buku.svg') }}" alt="Jumlah Total Buku" class="w-24 h-24 lg:w-32 lg:h-32 object-contain">
                    </div>
                    <a href="{{ route('buku.kelola') }}"
                        class="mt-4 text-center bg-[#245237] text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition">
                        More Info
                    </a>
                </div>
    
                <!-- Card Jumlah User -->
                <div class="flex flex-col justify-between p-5 bg-white rounded-lg shadow-md border-2 border-[#245237] hover:shadow-lg transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-4xl font-bold text-[#245237]">{{ $total_user }}</p>
                            <p class="text-lg font-bold text-gray-600 mt-2">Jumlah User</p>
                        </div>
                        <img src="{{ asset('assets/img/jumlah-pengunjung.svg') }}" alt="Jumlah User" class="w-24 h-24 lg:w-32 lg:h-32 object-contain">
                    </div>
                    <a href="{{ route('user.kelola') }}"
                        class="mt-4 text-center bg-[#245237] text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition">
                        More Info
                    </a>
                </div>
    
                <!-- Card Jumlah Petugas -->
                <div class="flex flex-col justify-between p-5 bg-white rounded-lg shadow-md border-2 border-[#245237] hover:shadow-lg transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-4xl font-bold text-[#245237]">{{ $total_petugas }}</p>
                            <p class="text-lg font-bold text-gray-600 mt-2">Jumlah Petugas</p>
                        </div>
                        <img src="{{ asset('assets/img/jumlah-buku-dipinjam.svg') }}" alt="Jumlah Petugas" class="w-24 h-24 lg:w-32 lg:h-32 object-contain">
                    </div>
                    <a href="{{ route('petugas.kelola') }}"
                        class="mt-4 text-center bg-[#245237] text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition">
                        More Info
                    </a>
                </div>
    
                <!-- Card Jumlah Staff -->
                <div class="flex flex-col justify-between p-5 bg-white rounded-lg shadow-md border-2 border-[#245237] hover:shadow-lg transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-4xl font-bold text-[#245237]">{{ $total_staff }}</p>
                            <p class="text-lg font-bold text-gray-600 mt-2">Jumlah Staff</p>
                        </div>
                        <img src="{{ asset('assets/img/jumlah-staff.svg') }}" alt="Jumlah Staff" class="w-24 h-24 lg:w-32 lg:h-32 object-contain">
                    </div>
                    <a href="{{ route('staff.kelola') }}"
                        class="mt-4 text-center bg-[#245237] text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition">
                        More Info
                    </a>
                </div>
            </div>
        </div>
    </div>
    

    <div class="py-12">
        <div class="container mx-auto p-4">
            <h1 class="text-[#245237] font-bold text-2xl px-4 mt-5">Buku Dengan View Terbanyak Bulan Ini</h1>
        </div>

        <div class="container mx-auto p-4 ">
            <div class="flex flex-wrap justify-center space-y-4 lg:space-y-0 lg:space-x-28">
                <!-- Pengunjung 1 -->
                @php
                    $i = 1;
                @endphp
                @foreach ($buku_best as $buku)
                    <div class="group flex flex-col items-center p-4 bg-white rounded-lg shadow-md hover:shadow-xl transform transition-transform duration-300 hover:scale-105">
                        <div class="relative h-52 w-full bg-[#D9D9D9] rounded-lg overflow-hidden">
                            <img src="{{ asset($buku->sampul_buku) }}" alt="image" class="h-full w-full object-cover">
                        </div>
                        <div
                            class="mt-2 bg-[#245237] text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-[#1d4d2d] hover:text-slate-900 transition-colors">
                            #{{ $i++ }} {{ $buku->judul }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    <div>
        <div class="py-6">
            <div class="container mx-auto p-4">
                <h1 class="text-[#245237] font-bold text-2xl px-4 mt-5">Pengunjung Terbaik Bulan Ini</h1>
            </div>

            <div class="container mx-auto p-4 ">
                <div class="flex flex-wrap justify-center space-y-4 lg:space-y-0 lg:space-x-28">
                    <!-- Pengunjung 1 -->
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($pengunjung_best as $kunjung)
                        <div class="flex justify-center transform relative p-4 hover:scale-110">
                            <div class="box-border border-2 border-[#245237] rounded-full overflow-hidden">
                                <img src="{{ asset($kunjung->photo_profile) }}" alt="image"
                                    class="h-40 w-40 object-cover">
                            </div>
                            <div
                                class="flex absolute -bottom-2 bg-[#245237] text-white text-center p-2 font-semibold rounded-lg truncate">
                                #{{ $i++ }} {{ $kunjung->nama }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
