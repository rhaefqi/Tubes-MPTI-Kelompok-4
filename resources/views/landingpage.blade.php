<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/resources/css/app.css">
    <link rel="stylesheet" href="/resources/css/output.css">
    <script src="https://kit.fontawesome.com/bc3cf86588.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.4.47/css/materialdesignicons.min.css"
        integrity="sha512-/k658G6UsCvbkGRB3vPXpsPHgWeduJwiWGPCGS14IQw3xpr63AEMdA8nMYG2gmYkXitQxDTn6iiK/2fD4T87qA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    <title>Perpustakaan Yayasan Amaliyah</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">
</head>

<body class="bg-[#F2F2F2] open-sans ">
    <!-- HEADER START -->
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
                    <div class="flex gap-2 ml-16">
                        <a href="/login"
                            class="bg-[#245237] px-5 py-3 rounded-md font-bold text-white border-2 border-[#245237]  hover:text-[#245237] hover:bg-white ">Login</a>
                        <a href="/register"
                            class="border-2 border-[#006316] px-5 py-3 rounded-md font-bold text-[#006316] hover:text-white hover:bg-[#245237]">Register</a>
                    </div>
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
    <!-- HEADER END -->

    <!-- CONTENT -->
    <!-- Atas -->
    <div class="bg-[#F2F2F2]">
        <div class="container mx-auto p-8 md:p-16">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
                <!-- Text Section -->
                <div>
                    <h1 class="text-4xl font-extrabold text-[#245237] leading-snug">
                        Tumbuhkan Wawasan, <br> 
                        <span class="text-[#00A218]">Temukan Petualangan.</span>
                    </h1>
                    <p class="mt-4 text-lg text-[#4D4D4D]">
                        Perpustakaan Sekolah adalah jendela dunia yang menghadirkan petualangan tanpa batas melalui buku-buku dan ilmu pengetahuan.
                    </p>
                    <a href="/login" class="mt-6 inline-block bg-[#245237] hover:bg-white hover:text-[#245237] text-white px-6 py-3 rounded-md text-lg font-semibold shadow-lg hover:shadow-xl transition">
                        Ayo Bergabung
                    </a>
                </div>
                <!-- Image Section -->
                <div>
                    <img class="rounded-lg shadow-md w-full max-w-md mx-auto md:max-w-full h-auto object-cover" src="{{ asset('assets/img/dashboard.svg') }}" alt="Perpustakaan Sekolah">
                </div>
            </div>
        </div>
    </div>
    

    <div class="container mx-auto p-4 px-5">
        <hr class=" border-[#006316]">
    </div>

    <!-- New Added -->
    <div class="container mx-auto p-4">
        <h1 class="text-[#245237] font-bold text-2xl px-4 mt-5 mb-4">Baru Saja Ditambahkan</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Loop Buku -->
            @foreach ($bukus as $buku)
            <div class="group flex flex-col items-center p-4 bg-white rounded-lg shadow-md hover:shadow-xl transform transition-transform duration-300 hover:scale-105">
                <div class="relative h-52 w-full bg-[#D9D9D9] rounded-lg overflow-hidden">
                    <img src="{{ asset($buku->sampul_buku) }}" alt="{{ $buku->judul }}" class="w-full h-full object-cover">
                </div>
                <div class="mt-4 font-bold text-center text-[#245237] text-md truncate w-full">
                    {{ $buku->judul }}
                </div>
                <a href="{{ route('detail.buku', $buku->id) }}" class="mt-2 bg-[#245237] text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-[#1d4d2d] hover:text-slate-900 transition-colors hover:cursor-pointer">
                    Detail Buku
                </a>
            </div>
            @endforeach
        </div>
    </div>
    

    <!-- Pengunjung Terbaik Bulan Ini -->
    <div class="py-12">
        <div class="container mx-auto p-4">
            <h1 class="text-[#245237] font-bold text-2xl px-4 mt-5">Pengunjung Terbaik Bulan Ini</h1>
        </div>

        <div class="container mx-auto p-4 ">
            <div class="flex flex-wrap justify-center space-y-4 lg:space-y-0 lg:space-x-28">
                <!-- Pengunjung 1 -->
                @php
                    $i = 1;
                @endphp
                @foreach ($results as $result)
                    <div class="flex justify-center transform relative p-4 hover:scale-110">
                        <div class="box-border border-2 border-[#245237] rounded-full overflow-hidden">
                            <img src="{{ asset($result->photo_profile) }}" alt="image"
                                class="h-40 w-40 object-cover">
                        </div>
                        <div
                            class="flex absolute -bottom-2 bg-[#245237] text-white text-center p-2 font-semibold rounded-lg truncate">
                            #{{ $i++ }} {{ $result->nama }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container mx-auto p-4">
        <hr class="border-[#006316]">
    </div>


    <!-- Layanan -->
    <div class="container mx-auto" id="layanan">
        <h1 class="text-[#245237] font-bold text-3xl text-center mt-5 mb-8">Layanan Yang Kami Sediakan</h1>
    </div>

    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <!-- Column 1 -->
            <div class="flex flex-col items-center w-full sm:w-1/2 md:w-1/3 p-4 transform hover:scale-110">
                <div class="box-border h-56 w-48 rounded-lg overflow-hidden">
                    <img src="{{ asset('assets/img/pengembalian.svg') }}" alt="image"
                        class="w-full h-full">
                </div>
                <p class="mt-2 text-center  text-2xl justify-center font-bold  text-[#245237]">Pengembalian Buku </p>
            </div>
            <!-- Column 2 -->
            <div class="flex flex-col items-center w-full sm:w-1/2 md:w-1/3 p-4 transform hover:scale-110">
                <div class="box-border  h-56 w-48   rounded-lg overflow-hidden">
                    <img src="{{ asset('assets/img/peminjaman.svg') }}" alt="image"
                        class="w-full h-full">
                </div>
                <p class="mt-2 text-center  text-2xl justify-center font-bold  text-[#245237]">Peminjaman Buku </p>
            </div>
            <!-- Column 3 -->
            <div class="flex flex-col items-center w-full sm:w-1/2 md:w-1/3 p-4 transform hover:scale-110">
                <div class="box-border  h-56 w-48  rounded-lg overflow-hidden bg-transparent">
                    <img src="{{ asset('assets/img/ruang-baca.svg') }}" alt="image"
                        class="w-full h-full">
                </div>
                <p class="mt-2 text-center  text-2xl justify-center font-bold  text-[#245237]">Ruang Baca </p>
            </div>
        </div>
    </div>


    <div class="container mx-auto p-4">
        <hr class="border-[#006316]">
    </div>
    <!-- Tentang -->

    <div class="container mx-auto p-4 mb-8" id="tentang">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Kolom Kanan (Gambar) -->
            <div class="p-4">
                <img class="shadow-md rounded-lg w-full h-96 object-cover"
                    src="{{ asset('assets/img/about-us.svg') }}" alt="Perpustakaan Sekolah">
            </div>
            <!-- Kolom Kiri (Tulisan) -->
            <div class="flex flex-col text-justify p-4">
                <h2 class="text-2xl font-bold mb-4 text-[#245237]">Tentang Kami</h2>
                <p class="text-md text-[#245237] mb-4">Yayasan Perguruan Amaliyah, dengan Nomor Pokok Yayasan Nasional
                    (NPYN) AL9639, adalah lembaga pendidikan yang didirikan pada tanggal 29 Agustus 1985. Terletak di
                    Jl. Tani Asli Gg. Asal, Tanjung Gusta, Kec. Sunggal, Kab. Deli Serdang, Prov. Sumatera Utara,
                    yayasan ini berkomitmen untuk menyediakan pendidikan berkualitas bagi masyarakat. Dipimpin oleh Drs.
                    H. Abdul Malik MR dan dioperasikan oleh Safrijal Efendi, Yayasan Perguruan Amaliyah berdedikasi
                    untuk menciptakan lingkungan belajar yang kondusif dan inovatif. .</p>
                <p class="text-md text-[#245237]">Di bawah naungan Yayasan Perguruan Amaliyah, terdapat berbagai
                    lembaga pendidikan, salah satunya adalah SD Amaliyah yang terletak di Kec. Sunggal, Kab. Deli
                    Serdang, Prov. Sumatera Utara. Dengan NPSN 10213587, SD Amaliyah berkomitmen untuk memberikan
                    pendidikan dasar yang komprehensif dan berintegritas. Yayasan ini tidak hanya berfokus pada aspek
                    akademis tetapi juga pada pengembangan karakter dan nilai-nilai moral..</p>
            </div>

        </div>
    </div>

    <!-- CONTENT END -->

    <!-- FOOTER -->
    @include('layouts.footer')
    <!-- FOOTER END -->

    <!-- MENU HAMBURGER MOBILE -->
    <div class="flex justify-end p-5 lg:hidden fixed top-0 left-0 h-screen w-full z-10 bg-[rgb(0,0,0,0.6)]"
        id="menuDrop">
        <div class="h-[300px] bg-white absolute w-1/2 rounded-lg ">
            <div class="h-20 flex items-center justify-end px-6">
                <button onclick="hamburgerMerdeka()">
                    <i class="text-2xl text-gray-700 fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="px-4 flex flex-col gap-3 text-[#006316]">
                <p class="text-sm text-gray-300 font-bold">Menu</p>
                <a href="{{ route('perpus') }}" class="flex w-full justify-between items-center text-sm h-8">
                    <p class="font-bold">Perpustakaan</p>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
                <a href="#layanan" class="flex w-full justify-between items-center text-sm h-8">
                    <p class="font-bold">Layanan</p>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
                <a href="#tentang" class="flex w-full justify-between items-center text-sm h-8">
                    <p class="font-bold">Tentang Kami</p>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
                <a href="/login" class="flex w-full justify-between items-center text-sm h-8">
                    <p class="font-bold">Login</p>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <script>
        const hamburgerMerdeka = () => {
            const nav = document.getElementById("menuDrop");
            if (nav.classList.contains("hidden")) {
                nav.classList.remove("hidden");
                document.body.style.overflow = 'hidden';
            } else {
                nav.classList.add("hidden");
                document.body.style.overflow = 'auto';
            }
        }
    </script>
</body>

</html>
