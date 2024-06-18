<header class="w-full flex justify-center bg-[#F2F2F2]">
    <!-- NAVBAR START -->
    <div class="w-full lg:max-w-screen-lg lg:mx-0 h-20 bg-[#F2F2F2] flex items-center px-5 lg:px-0 justify-between">
        <!-- LOGO -->
        <img src="{{ asset('assets/img/logo.png') }}" class="lg:w-20 lg:h-20 w-14 h-14" alt="Yayasan Amaliyah">

        <div class="lg:flex gap-72 hidden">
            <ul class="menu menu-horizontal flex gap-5 place-items-center">
                <li><a href="/home" class="text-lg font-bold text-[#245237]">Beranda</a></li>
                <li><a href="{{ route('perpus') }}" class="text-lg font-bold text-[#245237]">Buku</a></li>
            </ul>
            
            <details class="dropdown">
                <summary class="m-1 btn w-full h-full">
                    <div class="relative flex justify-center">
                        <img src="{{ auth()->user()->photo_profile == null ? asset('assets/img/fadillah.jpg') : asset(auth()->user()->photo_profile) }}" class="w-16 h-16 rounded-full">
                        <span class="absolute -bottom-2 bg-[#245237] rounded-xl px-3 text-white text-xs font-medium">
                            {{ auth()->user()->status == 'guru' ? 'Guru' : 'Siswa' }}
                        </span>
                    </div>
                </summary>
                <ul class="p-2 shadow menu dropdown-content z-[1] bg-base-100 rounded-box w-52">
                  <li><a href="{{ route('profile') }}"  class="text-md font-bold text-[#245237] hover:text-[#F7D914]">Profile Saya</a></li>
                  <li><a href="{{ route('logout') }}"  class="text-md font-bold text-[#245237] hover:text-[#F7D914]">Logout</a></li>
                </ul>
            </details>
        </div>

        <button type="button" onclick="toggleNavbar()" class="lg:hidden">
            <div class="relative flex justify-center">
                <img src="{{ auth()->user()->photo_profile == null ? asset('assets/img/fadillah.jpg') : asset(auth()->user()->photo_profile) }}" class="w-12 h-12 rounded-full">
                <span class="absolute -bottom-2 bg-[#245237] rounded-xl px-3 text-white text-xs font-medium">Siswa</span>
            </div>
        </button>
        <!-- NAVBAR END -->
    </div>
</header>