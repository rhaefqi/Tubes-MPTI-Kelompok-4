<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/resources/css/app.css">
    <link rel="stylesheet" href="/resources/css/output.css">
    <script src="https://kit.fontawesome.com/bc3cf86588.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="bg-[#F2F2F2] open-sans ">
    <!-- HEADER START -->
    <header class="w-full flex justify-center bg-[#F2F2F2] ">
        <!-- NAVBAR START -->
        <div class="w-full lg:max-w-screen-lg  lg:mx-0 h-20  bg-[#F2F2F2] flex items-center   px-5 lg:px-0 justify-between">
            <!-- LOGO -->
            <p class="text-sm"><img class="w-18 h-16" src="{{ asset("assets/img/Logo.png") }}" alt="" srcset=""></p>

            <div class="lg:flex gap-24 hidden">
                <ul class="flex gap-5 place-items-center">
                <li><a href="#home" class="text-lg font-bold text-[#006316]">Perpustakaan</a></li>
                    <li><a href="#layanan" class="text-lg font-bold text-[#006316]">Layanan</a></li>
                    <li><a href="#tentang"  class="text-lg font-bold text-[#006316]">Tentang </a></li>
                    <!-- <li><a href="#kontak" class="text-lg font-bold text-[#006316]">Kontak</a></li> -->
                </ul>
                    
                <div class="flex gap-2">
                    <a href="/login" class="bg-[#245237] px-5 py-3 rounded-md font-bold text-white ">Login</a>
                    <a href="/register" class="border-2 border-[#006316] px-5 py-3 rounded-md font-bold text-[#006316]">Register</a>
                </div>
            </div> 

            <button type="button" onclick="hamburgerMerdeka()" class="lg:hidden">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2.5"  stroke-linecap="round"  stroke-linejoin="round"  class="text-[#006316] icon icon-tabler icons-tabler-outline icon-tabler-menu-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 6l16 0" /><path d="M4 12l16 0" /><path d="M4 18l16 0" /></svg>
            </button>
            <!-- NAVBAR END -->
        </div>
    </header>
    <!-- HEADER END -->

    <!-- CONTENT -->
    <!-- Atas -->
   <div class="container mx-auto p-4 px-5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="p-6">
                <h2 class="text-3xl font-bold mb-4 text-[#245237]">Tumbuhkan Wawasan, Temukan Petualangan</h2>
                <h2 class="text-3xl font-bold mb-4">
                    <span class="text-[#00A218] mb-7">Perpustakaan Sekolah,</span>
                    <span class="text-[#245237]"> Jendela Menuju Dunia.</span>
                </h2>
                <button type="button" class="bg-[#245237] px-5 py-3 rounded-md font-bold text-white">Telusuri</button>
            </div>
            <div class="p-6">
                <img class="shadow-md rounded-lg w-full h-72 object-cover" src="{{ asset("assets/img/gambar1.jpg") }}" alt="">
            </div>
        </div>
    </div>

    <div class="container mx-auto p-4 px-5">
        <hr class=" border-[#006316]">
    </div>

 <!-- New Added -->
<h1 class="text-[#245237] font-bold text-2xl container px-4 md:px-20 mt-5 ">Baru Saja Ditambahkan</h1>

<div class="container mx-auto p-4">
    <div class="flex flex-wrap justify-center">
        <!-- Frame 1 -->
        <div class="flex flex-col items-center p-4 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5">
            <div class="box-border relative h-52 w-44 bg-[#D9D9D9] border-2 border-[#245237] rounded-lg overflow-hidden">
                <img src="{{ asset("assets/img/gambar1.jpg") }}" alt="image" class="w-full h-full object-cover">
            </div>
            <div class="mt-4  font-bold  rounded-lg w-44 bg-[#245237] text-white text-center p-2 rounded-b-lg">
                Buku x
            </div>
        </div>
        <!-- Frame 2 -->
        <div class="flex flex-col items-center p-4 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5">
            <div class="box-border relative h-52 w-44 bg-[#D9D9D9] border-2 border-[#245237] rounded-lg overflow-hidden">
                <img src="{{ asset("assets/img/gambar1.jpg") }}" alt="image" class="w-full h-full object-cover">
            </div>
            <div class="mt-4  font-bold  rounded-lg w-44 bg-[#245237] text-white text-center p-2 rounded-b-lg">
                Buku x
            </div>
        </div>
        <!-- Frame 3 -->
        <div class="flex flex-col items-center p-4 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5">
            <div class="box-border relative h-52 w-44 bg-[#D9D9D9] border-2 border-[#245237] rounded-lg overflow-hidden">
                <img src="{{ asset("assets/img/gambar1.jpg") }} " alt="image" class="w-full h-full object-cover">
            </div>
            <div class="mt-4  font-bold  rounded-lg w-44 bg-[#245237] text-white text-center p-2 rounded-b-lg">
                Buku x
            </div>
        </div>
        <!-- Frame 4 -->
        <div class="flex flex-col items-center p-4 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5">
            <div class="box-border relative h-52 w-44 bg-[#D9D9D9] border-2 border-[#245237] rounded-lg overflow-hidden">
                <img src="{{ asset("assets/img/gambar1.jpg") }}" alt="image" class="w-full h-full object-cover">
            </div>
            <div class="mt-4  font-bold  rounded-lg w-44 bg-[#245237] text-white text-center p-2 rounded-b-lg">
                Buku x
            </div>
        </div>
        <!-- Frame 5 -->
        <div class="flex flex-col items-center p-4 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5">
            <div class="box-border relative h-52 w-44 bg-[#D9D9D9] border-2 border-[#245237] rounded-lg overflow-hidden">
                <img src="{{ asset("assets/img/gambar1.jpg") }}" alt="image" class="w-full h-full object-cover">
            </div>
            <div class="mt-4  font-bold  rounded-lg w-44 bg-[#245237] text-white text-center p-2 rounded-b-lg">
                Buku x
            </div>
        </div>
    </div>
</div>

<!-- Pengunjung Terbaik Bulan Ini -->
<div class="py-12">
<h1 class="text-[#245237] font-bold text-2xl container px-4 md:px-20 mt-5">Pengunjung Terbaik Bulan Ini</h1>

<div class="container mx-auto p-4 ">
    <div class="flex flex-wrap justify-center space-y-4 lg:space-y-0 lg:space-x-28">
        <!-- Pengunjung 1 -->
        <div class="relative p-4 w-40">
            <div class="box-border h-40 w-40 border-2 border-[#245237] rounded-full overflow-hidden">
                <img src="https://st5.depositphotos.com/5934840/64966/v/450/depositphotos_649667750-stock-illustration-happy-young-woman-profile-character.jpg" alt="image" class="w-full h-full object-cover">
            </div>
            <div class="absolute bottom-0 right-0 w-20 bg-[#245237] text-white text-center p-1 rounded-lg">
                Bambang
            </div>
        </div>
        <!-- Pengunjung 2 -->
        <div class="relative p-4 w-40">
            <div class="box-border h-40 w-40 border-2 border-[#245237] rounded-full overflow-hidden">
                <img src="{{ asset("assets/img/gambar1.jpg") }}" alt="image" class="w-full h-full object-cover">
            </div>
            <div class="absolute bottom-0 right-0 w-20 bg-[#245237] text-white text-center p-1 rounded-lg">
                Bambang
            </div>
        </div>
        <!-- Pengunjung 3 -->
        <div class="relative p-4 w-40">
            <div class="box-border h-40 w-40 border-2 border-[#245237] rounded-full overflow-hidden">
                <img src="your-image-url-3.jpg" alt="image" class="w-full h-full object-cover">
            </div>
            <div class="absolute bottom-0 right-0 w-20 bg-[#245237] text-white text-center p-1 rounded-lg">
                Bambang
            </div>
        </div>
        <!-- Pengunjung 4 -->
        <div class="relative p-4 w-40">
            <div class="box-border h-40 w-40 border-2 border-[#245237] rounded-full overflow-hidden">
                <img src="your-image-url-4.jpg" alt="image" class="w-full h-full object-cover">
            </div>
            <div class="absolute bottom-0 right-0 w-20 bg-[#245237] text-white text-center p-1 rounded-lg">
                Bambang
            </div>
        </div>
        <!-- Pengunjung 5 -->
        <div class="relative p-4 w-40">
            <div class="box-border h-40 w-40 border-2 border-[#245237] rounded-full overflow-hidden">
                <img src="your-image-url-5.jpg" alt="image" class="w-full h-full object-cover">
            </div>
            <div class="absolute bottom-0 right-0 w-20 bg-[#245237] text-white text-center p-1 rounded-lg">
                Bambang
            </div>
        </div>
    </div>
</div>
</div>

<div class="container mx-auto p-4">
    <hr class="border-[#006316]">
</div>


    <!-- Layanan -->
    <div class="container mx-auto" id="layanan">
        <h1 class="text-[#245237] font-bold text-3xl text-center mt-5 mb-8">Layanan</h1>
    </div>

    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <!-- Column 1 -->
            <div class="flex flex-col items-center w-full sm:w-1/2 md:w-1/3 p-4">
                <div class="box-border h-56 w-48 rounded-lg overflow-hidden">
                    <img src="{{ asset("assets/img/Kembali2.png") }}" alt="image" class="w-full h-full object-cover">
                </div>
                <p class="mt-2 text-center  text-2xl justify-center font-bold  text-[#245237]">Pengembalian Buku </p>
            </div>
            <!-- Column 2 -->
            <div class="flex flex-col items-center w-full sm:w-1/2 md:w-1/3 p-4">
                <div class="box-border  h-56 w-48   rounded-lg overflow-hidden">
                    <img src="{{ asset("assets/img/Pinjam.png") }}" alt="image" class="w-full h-full object-cover">
                </div>
                <p class="mt-2 text-center  text-2xl justify-center font-bold  text-[#245237]">Peminjaman Buku </p>
            </div>
            <!-- Column 3 -->
            <div class="flex flex-col items-center w-full sm:w-1/2 md:w-1/3 p-4">
                <div class="box-border  h-56 w-48  rounded-lg overflow-hidden">
                    <img src="{{ asset("assets/img/Ruang.png") }}" alt="image" class="w-full h-full object-cover">
                </div>
                <p class="mt-2 text-center  text-2xl justify-center font-bold  text-[#245237]">Ruang Baca  </p>
            </div>
        </div>
    </div>

    
    <div class="container mx-auto p-4">
        <hr class="border-[#006316]">
    </div>
    <!-- Tentang -->

    <div class="container mx-auto p-4" id="tentang">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
             <!-- Kolom Kanan (Gambar) -->
             <div class="p-4">
                <img class="shadow-md rounded-lg w-full h-72 object-cover" src="{{ asset("assets/img/Gambar2.jpg") }}" alt="Perpustakaan Sekolah">
            </div>
            <!-- Kolom Kiri (Tulisan) -->
            <div class="flex flex-col text-justify p-4">
                <h2 class="text-2xl font-bold mb-4 text-[#245237]">Tentang Kami</h2>
                <p class="text-sm text-[#245237] mb-4">Yayasan Perguruan Amaliyah, dengan Nomor Pokok Yayasan Nasional (NPYN) AL9639, adalah lembaga pendidikan yang didirikan pada tanggal 29 Agustus 1985. Terletak di Jl. Tani Asli Gg. Asal, Tanjung Gusta, Kec. Sunggal, Kab. Deli Serdang, Prov. Sumatera Utara, yayasan ini berkomitmen untuk menyediakan pendidikan berkualitas bagi masyarakat. Dipimpin oleh Drs. H. Abdul Malik MR dan dioperasikan oleh Safrijal Efendi, Yayasan Perguruan Amaliyah berdedikasi untuk menciptakan lingkungan belajar yang kondusif dan inovatif. .</p>
                <p class="text-sm text-[#245237]">Di bawah naungan Yayasan Perguruan Amaliyah, terdapat berbagai lembaga pendidikan, salah satunya adalah SD Amaliyah yang terletak di Kec. Sunggal, Kab. Deli Serdang, Prov. Sumatera Utara. Dengan NPSN 10213587, SD Amaliyah berkomitmen untuk memberikan pendidikan dasar yang komprehensif dan berintegritas. Yayasan ini tidak hanya berfokus pada aspek akademis tetapi juga pada pengembangan karakter dan nilai-nilai moral..</p>
            </div>
           
        </div>
    </div>

    <!-- CONTENT END -->

    <!-- FOOTER -->
    <footer class="bg-[#245237] p-10 justify center w-full bottom-0 ">
        <div class="flex w-full h-full md:max-w-screen-lg mx-auto px-5 gap-40">
            <div class="lg:flex lg:gap-28 lg:w-1/2 hidden">
                <div class="flex flex-col gap-3">
                    <div class="flex flex-col text-white font-bold gap-0 items-center">
                    <p><img class="h-40 w-44" src="{{ asset("assets/img/Logo.png") }}" alt="" srcset=""></p>
                        <p>Perpustakaan</p>
                        <p>Yayasan Amaliyah</p>
                    </div>
                </div>
                <div class="lg:flex lg:flex-col gap-3">
                    <p class="text-white font-bold text-lg">Menu</p>
                    <div class="flex flex-col font-semibold text-white gap-1">
                        <a href="">Home</a>
                        <a href="">Layanan</a>
                        <a href="">Tentang Kami</a>
                        <a href="">Kontak</a>
                    </div>
                </div>
            </div>
            <div class="flex lg:w-1/2 w-full lg:gap-20 gap-10 justify-between">
                <div class="flex flex-col items-start">
                    <p class="text-white font-bold text-lg">Hubungi Kami</p>
                    <div class="flex gap-6">
                        <p class="text-white font-bold text-lg"><i class="fa-solid fa-envelope"></i></p>
                        <p class="text-white font-bold text-lg"><i class="fa-solid fa-phone"></i></p>
                        <p class="text-white font-bold text-lg"><i class="fa-solid fa-fax"></i></p>
                    </div>
                    
                </div>
                <div class="flex flex-col gap-3">
                    <h1 class="text-white font-bold text-center">Maps</h1>
                    <p><iframe class="w-full h-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.903072491436!2d98.60247!3d3.6096505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312e9057850d01%3A0x352c7cab535be127!2sYP%20Amaliyah%20Sunggal%20Deli%20Serdang!5e0!3m2!1sid!2sid!4v1716456699236!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
                    <div class="flex flex-col text-white font-bold gap-0">
                        <p>Kampung Lalang, Sunggal</p>
                        <p>Kabupaten Deli Serdang 20126</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex w-full mt-10 h-full md:max-w-screen-lg mx-auto px-5 items-center justify-center">
            <p class="text-white">©2024 Kelompok 4, All right reserved</p>
        </div>
    </footer>
    <!-- FOOTER END -->

    <!-- MENU HAMBURGER MOBILE -->
    <div class="flex justify-end p-5 lg:hidden fixed top-0 left-0 h-screen w-full z-10 bg-[rgb(0,0,0,0.6)]" id="menuDrop">
        <div class="h-[300px] bg-white absolute w-1/2 rounded-lg ">
          <div class="h-20 flex items-center justify-end px-6">
            <button onclick="hamburgerMerdeka()">
              <i class="text-2xl text-gray-700 fa-solid fa-xmark"></i>
            </button>
          </div>
          <div class="px-4 flex flex-col gap-3 text-[#006316]">
            <p class="text-sm text-gray-300 font-bold">Menu</p>
            <a href class="flex w-full justify-between items-center text-sm h-8">
                <p class="font-bold">Home</p>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
            <a href class="flex w-full justify-between items-center text-sm h-8">
                <p class="font-bold">Layanan</p>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
            <a href class="flex w-full justify-between items-center text-sm h-8">
                <p class="font-bold">Tentang Kami</p>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
            <a href class="flex w-full justify-between items-center text-sm h-8">
                <p class="font-bold">Kontak</p>
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