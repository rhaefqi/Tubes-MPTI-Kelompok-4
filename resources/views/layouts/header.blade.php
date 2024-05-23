<header class="w-full flex justify-center bg-[#F2F2F2]">
    <!-- NAVBAR START -->
    <div class="w-full lg:max-w-screen-lg lg:mx-0 h-20 bg-[#F2F2F2] flex items-center px-5 lg:px-0 justify-between">
        <!-- LOGO -->
        <img src="{{ asset('img/logo.png') }}" class="lg:w-20 lg:h-20 w-14 h-14" alt="Yayasan Amaliyah">

        <div class="lg:flex gap-48 hidden">
            <ul class="flex gap-5 place-items-center">
                <li><a href="/home" class="text-lg font-bold text-[#245237] hover:text-[#F7D914]">Beranda</a></li>
                <li><a href="{{ route('perpus') }}" class="text-lg font-bold text-[#245237] hover:text-[#F7D914]">Buku</a></li>
            </ul>
                
            <a href="{{ route('profile') }}" class="flex gap-3 items-center">
                <p class="text-lg font-bold text-[#245237] hover:text-[#F7D914]">Andy Septiawan Saragih</p>

                <div class="relative flex justify-center">
                    <div class="bg-gray-500 rounded-full p-8"></div>
                    <span class="absolute -bottom-2 bg-[#245237] rounded-xl px-3 text-white text-xs font-medium">Siswa</span>
                </div>
            </a>
        </div>

        <button type="button" onclick="toggleNavbar()" class="lg:hidden">
            <div class="relative flex justify-center">
                <div class="bg-gray-500 rounded-full p-5"></div>
                <span class="absolute -bottom-2 bg-[#245237] rounded-xl px-3 text-white text-xs font-medium">Siswa</span>
            </div>
        </button>
        <!-- NAVBAR END -->
    </div>
</header>