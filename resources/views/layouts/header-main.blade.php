<header class="w-full flex justify-center bg-[#F2F2F2] ">
    <!-- NAVBAR START -->
    <div
        class="w-full lg:max-w-screen-lg  lg:mx-0 h-20  bg-[#F2F2F2] flex items-center   px-5 lg:px-0 justify-between">
        <!-- LOGO -->
        <p class="text-sm"><img class="w-18 h-16" src="{{ asset('assets/img/Logo.png') }}" alt=""
                srcset=""></p>

        <div class="lg:flex gap-24 hidden">
            <ul class="menu menu-horizontal flex gap-5 place-items-center justify-between">
                <li><a href="{{ route('perpus') }}" class="text-lg font-bold text-[#006316]">Perpustakaan</a></li>
                <li><a href="#layanan" class="text-lg font-bold text-[#006316]">Layanan</a></li>
                <li><a href="#tentang" class="text-lg font-bold text-[#006316]">Tentang </a></li>
                <!-- <li><a href="#kontak" class="text-lg font-bold text-[#006316]">Kontak</a></li> -->
                {{-- <div class="flex gap-2 ml-16">
                    <a href="/login"
                        class="bg-[#245237] px-5 py-3 rounded-md font-bold text-white border-2 border-[#245237]  hover:text-[#245237] hover:bg-white ">Login</a>
                    <a href="/register"
                        class="border-2 border-[#006316] px-5 py-3 rounded-md font-bold text-[#006316] hover:text-white hover:bg-[#245237]">Register</a>
                </div> --}}
            </ul>

        </div>

        <button type="button" onclick="hamburgerMerdeka()" class="lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                class="text-[#006316] icon icon-tabler icons-tabler-outline icon-tabler-menu-2">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 6l16 0" />
                <path d="M4 12l16 0" />
                <path d="M4 18l16 0" />
            </svg>
        </button>
        <!-- NAVBAR END -->
    </div>
</header>