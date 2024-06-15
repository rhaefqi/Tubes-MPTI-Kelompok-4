<div>
    {{-- <div> --}}
    @if (Auth::user()->status == 'pegawai')
        <aside id="sidebar"
            class="transition-all duration-500 sm:flex bg-primary w-56 h-screen sticky left-0 top-0 justify-center text-white font-open">
            <img src="" alt="">
            <div class="">
                <div class="relative mb-14">
                    <img src="{{ asset('assets/img/logo.png') }}" alt=""
                        class="w-16 absolute pt-6 scale-0 transition duration-300 ease-in-out" id="logo-side">
                    <a id="head" href="#home"
                        class="transition-all duration-500 text-2xl font-semibold text-center pt-4 flex overflow-hidden">Pegawai
                        <br>
                        Perpustakaan</a>
                </div>
                <div class="" id="list">
                    <div class="mb-6 flex menu hover:text-black hover:cursor-pointer rounded-md hover:bg-secondary">
                        <div class="relative transition duration-200 ease-in-out">
                            <a href="{{ route('pegawai.home') }}" class="font-semibold flex">
                                <i class="fa-solid fa-house"></i>
                                <span class="ml-2 menu-text">Dashboard</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mb-2 hover:text-black hover:cursor-pointer rounded-md hover:bg-secondary flex menu">
                    <div class=" relative transition duration-200 ease-in-out">
                        <a href="{{ route('absensi') }}" class="font-semibold">
                            <i class="fa-solid fa-user w-5"></i>
                            <span class="menu-text">Absensi</span>
                        </a>
                    </div>
                </div>
                <div class="mb-2 hover:text-black hover:cursor-pointer rounded-md hover:bg-secondary flex menu">
                    <div class=" relative transition duration-200 ease-in-out">
                        <a href="{{ route('peminjaman') }}" class="font-semibold">
                            <i class="fa-solid fa-user-pen w-5"></i>
                            <span class="menu-text">Peminjaman</span>
                        </a>
                    </div>
                </div>
                <div id="menu-hover"
                    class="mb-2 flex menu font-semibold hover:text-black hover:cursor-pointer rounded-md hover:bg-secondary">
                    <div class=" relative transition duration-200 ease-in-out">
                        <a id="sub-menu-buku" class="">
                            <i class="fa-solid fa-chalkboard-user w-5"></i>
                            <span class="menu-text">Buku</span>
                            <div class="hidden rotate-90"></div>
                            <span class="" id="div-arrow">
                                <i class="fa-solid fa-chevron-right ml-16 transition-transform" id="arrow"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="ml-7 font-semibold hidden text-sm" id="sub-menu">
                    <div class="p-1 my-2 hover:text-black hover:cursor-pointer rounded-md hover:bg-secondary">
                        <a href="{{ route('buku.kelola') }}">
                            Kelola Buku
                        </a>
                    </div>
                    <div class="p-1 mb-2 hover:text-black hover:cursor-pointer rounded-md hover:bg-secondary">
                        <a href="{{ route('subjek.kelola') }}">
                            Subjek Buku
                        </a>
                    </div>
                    <div class="p-1 mb-2 hover:text-black hover:cursor-pointer rounded-md hover:bg-secondary">
                        <a href="{{ route('kelas.kelola') }}">
                            Kelas Buku
                        </a>
                    </div>
                </div>
                <div class="mb-2 hover:text-black hover:cursor-pointer rounded-md hover:bg-secondary flex menu">
                    <div class=" relative transition duration-200 ease-in-out">
                        <a href="{{ route('riwayat.kelola') }}" class="font-semibold ">
                            <i class="fa-solid fa-user-graduate w-5"></i>
                            <span class="menu-text">Riwayat</span>
                        </a>
                    </div>
                </div>
                <div
                    class="mt-10 hover:text-black hover:cursor-pointer rounded-md hover:bg-secondary
                    flex menu">
                    <div class=" relative transition duration-200 ease-in-out">
                        <a href="{{ route('siswa.kelola') }}" class="font-semibold ">
                            <i class="fa-solid fa-circle-user w-5 scale-125"></i>
                            <span class="menu-text">Akun</span>
                        </a>
                    </div>
                </div>
            </div>
        </aside>
    @else
        <aside id="sidebar"
            class="transition-all duration-500 sm:flex bg-primary w-56 h-screen sticky left-0 top-0 justify-center text-white font-open">
            <img src="" alt="">
            <div class="">
                <div class="relative mb-14">
                    <img src="{{ asset('assets/img/logo.png') }}" alt=""
                        class="w-16 absolute pt-6 scale-0 transition duration-300 ease-in-out" id="logo-side">
                    <a id="head" href="#home"
                        class="transition-all duration-500 text-2xl font-semibold text-center pt-4 flex overflow-hidden">Staff
                        <br>
                        Administrasi</a>
                </div>
                <div class="" id="list">
                    <a href="{{ route('admin.home') }}" class="mb-6 font-semibold flex hover:text-black hover:cursor-pointer rounded-md hover:bg-secondary">
                        <div class=" flex menu ">
                            <div class="relative transition duration-200 ease-in-out">
                                <i class="fa-solid fa-house"></i>
                                <span class="ml-2 menu-text">Dashboard</span>
                            </div>
                        </div>
                    </a>
                </div>
                <a href="{{ route('user.kelola') }}" class="font-semibold">
                    <div class="mb-2 hover:text-black hover:cursor-pointer rounded-md hover:bg-secondary flex menu">
                        <div class=" relative transition duration-200 ease-in-out">
                            <i class="fa-solid fa-user w-5"></i>
                            <span class="menu-text">User</span>
                        </div>
                    </div>
                </a>
                <a href="{{ route('petugas.kelola') }}" class="font-semibold">
                    <div class="mb-2 hover:text-black hover:cursor-pointer rounded-md hover:bg-secondary flex menu">
                        <div class=" relative transition duration-200 ease-in-out">
                            <i class="fa-solid fa-user-pen w-5"></i>
                            <span class="menu-text">Petugas</span>
                        </div>
                    </div>
                </a>
                <a href="{{ route('guru.kelola') }}">
                    <div id="menu-hover"
                        class="mb-2 flex menu font-semibold hover:text-black hover:cursor-pointer rounded-md hover:bg-secondary">
                        <div class="relative transition duration-200 ease-in-out">
                            <i class="fa-solid fa-chalkboard-user w-5"></i>
                            <span class="menu-text">Guru</span>
                        </div>
                    </div>
                </a>
                <a href="{{ route('siswa.kelola') }}" class="font-semibold ">
                    <div class="mb-2 hover:text-black hover:cursor-pointer rounded-md hover:bg-secondary flex menu">
                        <div class=" relative transition duration-200 ease-in-out">
                            <i class="fa-solid fa-user-graduate w-5"></i>
                            <span class="menu-text">Siswa</span>
                        </div>
                    </div>
                </a>
                <a href="{{ route('kelas-siswa.kelola') }}">
                    <div id="menu-hover"
                        class="mb-2 flex menu font-semibold hover:text-black hover:cursor-pointer rounded-md hover:bg-secondary">
                        <div class="relative transition duration-200 ease-in-out">
                            <i class="fa-solid fa-chalkboard-user w-5"></i>
                            <span class="menu-text">Kelas</span>
                        </div>
                    </div>
                </a>
                <a href="{{ route('siswa.kelola') }}" class="font-semibold ">
                    <div class="mt-10 hover:text-black hover:cursor-pointer rounded-md hover:bg-secondary flex menu">
                        <div class=" relative transition duration-200 ease-in-out">
                            <i class="fa-solid fa-circle-user w-5 scale-125"></i>
                            <span class="menu-text">Akun</span>
                        </div>
                    </div>
                </a>
            </div>
        </aside>
    @endif

    {{-- </div> --}}

</div>

{{-- <aside id="sidebar"
        class="transition-all duration-500 sm:flex bg-primary w-56 h-screen sticky left-0 top-0 justify-center text-white font-open">
        <img src="" alt="">
        <div class="">
            <div class="relative mb-14">
                <img src="{{ asset('assets/img/logo.png') }}" alt=""
                    class="w-16 absolute pt-6 scale-0
                transition duration-300 ease-in-out"
                    id="logo-side">
                <a id="head" href="#home"
                    class="transition-all duration-500 text-2xl font-semibold text-center pt-4 flex">Staff <br>
                    Administrasi</a>
            </div>
            <div class="" id="list">
                <div class="mb-6 flex menu hover:text-black hover:cursor-pointer rounded-md hover:bg-secondary">
                    <div
                        class=" relative transition duration-200 ease-in-out">
                        <a href="{{ route('admin.home') }}" class="font-semibold p-1 flex">
                            <i class="fa-solid fa-house w-5"></i>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </div>
                </div>
                <div class="mb-2 flex menu hover:text-black hover:cursor-pointer rounded-md hover:bg-secondary">
                    <div
                        class=" relative transition duration-200 ease-in-out">
                        <a href="{{ route('user.kelola') }}" class="font-semibold p-1 flex">
                            <i class="fa-solid fa-user w-5"></i>
                            <span class="menu-text">User</span>
                        </a>
                    </div>
                </div>
                <div class="mb-2 flex menu hover:text-black hover:cursor-pointer rounded-md hover:bg-secondary">
                    <div
                        class=" relative transition duration-200 ease-in-out">
                        <a href="{{ route('petugas.kelola') }}" class="font-semibold p-1 flex">
                            <i class="fa-solid fa-user-pen w-5"></i>
                            <span class="menu-text">Petugas</span>
                        </a>
                    </div>
                </div>
                <div class="mb-2 flex menu hover:text-black hover:cursor-pointer rounded-md hover:bg-secondary">
                    <div
                        class=" relative transition duration-200 ease-in-out">
                        <a href="{{ route('guru.kelola') }}" class="font-semibold p-1 flex">
                            <i class="fa-solid fa-chalkboard-user w-5"></i>
                            <span class="menu-text">Guru</span>
                        </a>
                    </div>
                </div>
                <div class="mb-2 flex menu hover:text-black hover:cursor-pointer rounded-md hover:bg-secondary">
                    <div
                        class=" relative transition duration-200 ease-in-out">
                        <a href="{{ route('siswa.kelola') }}" class="font-semibold p-1 flex">
                            <i class="fa-solid fa-user-graduate w-5"></i>
                            <span class="menu-text">Siswa</span>
                        </a>
                    </div>
                </div>
                <div class="mt-10 flex menu hover:text-black hover:cursor-pointer rounded-md hover:bg-secondary">
                    <div
                        class=" relative transition duration-200 ease-in-out">
                        <a href="{{ route('siswa.kelola') }}" class="font-semibold p-1 flex">
                            <i class="fa-solid fa-circle-user w-5 scale-125"></i>
                            <span class="menu-text">Akun</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </aside> --}}
