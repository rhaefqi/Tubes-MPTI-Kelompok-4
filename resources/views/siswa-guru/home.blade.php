<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.4.47/css/materialdesignicons.min.css" integrity="sha512-/k658G6UsCvbkGRB3vPXpsPHgWeduJwiWGPCGS14IQw3xpr63AEMdA8nMYG2gmYkXitQxDTn6iiK/2fD4T87qA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    <title>Home</title>
</head>
<body class="bg-[#F2F2F2] open-sans">
    <!-- HEADER START -->
    <header class="w-full flex justify-center bg-[#F2F2F2]">
        <!-- NAVBAR START -->
        <div class="w-full lg:max-w-screen-lg lg:mx-0 h-20 bg-[#F2F2F2] flex items-center px-5 lg:px-0 justify-between">
            <!-- LOGO -->
            <p class="text-sm">INI LOGO</p>

            <div class="lg:flex gap-24 hidden">
                <ul class="flex gap-5 place-items-center">
                    <li><a href="#home" class="text-lg font-bold text-[#245237] hover:text-[#F7D914]">Beranda</a></li>
                    <li><a href="#layanan" class="text-lg font-bold text-[#245237] hover:text-[#F7D914]">Buku</a></li>
                    <li><a href="#tentang"  class="text-lg font-bold text-[#245237] hover:text-[#F7D914]">Riwayat Pinjam</a></li>
                </ul>
                    
                <div class="flex gap-3 items-center">
                    <p class="text-lg font-bold text-[#245237] hover:text-[#F7D914]">Andy Septiawan Saragih</p>

                    <div class="relative flex justify-center">
                        <div class="bg-gray-500 rounded-full p-8"></div>
                        <span class="absolute -bottom-2 bg-[#245237] rounded-xl px-3 text-white text-xs font-medium">Siswa</span>
                    </div>
                   
                </div>
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
    <!-- HEADER END -->

    <!-- CONTENT -->
    <div class="flex w-full md:max-w-screen-lg mx-auto gap-5 my-10">
        <div class="flex flex-col w-3/5 gap-5">
           <div class="border border-[#245237] rounded-lg p-10">
                <div class="flex">
                    <div class="flex flex-col gap-5">
                        <div class="flex flex-col text-[#245237]">
                            <p class="text-3xl font-semibold">Halo, Andy!</p>
                            <p class="font-normal">Selamat datang di Perpustakaan Amaliyah</p>
                        </div>
                        <div class="flex gap-32">
                            <div class="flex flex-col text-[#328754]">
                                <p class="font-bold">Jumlah Peminjaman</p>
                                <div class="flex justify-center items-center gap-5">
                                    <span class="mdi mdi-book-open-blank-variant-outline text-6xl"></span>
                                    <p class="font-bold text-2xl">23</p>
                                </div>
                            </div>
                            <div class="flex flex-col text-[#204731]">
                                <p class="font-bold">Jumlah Buku yang Dipinjam</p>
                                <div class="flex justify-center items-center gap-5">
                                    <span class="mdi mdi-bookshelf text-6xl"></span>
                                    <p class="font-bold text-2xl">23</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex text-[#245237]">
                            <p class="font-normal">Ingin membaca hari ini? &nbsp;</p> 
                            <p class="font-bold">Cari Buku</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border border-1 border-black rounded-lg p-5">
                <div class="flex flex-col gap-10">
                    <div class="flex justify-between items-center w-full">
                        <div class="flex gap-2">
                            <button class="rounded-full bg-[#245237] text-white text-[15px] font-semibold py-2 px-8">Dipinjam</button>
                            <a href="../siswa/home.html" class="rounded-full bg-[#F2F2F2] text-[#245237] border-[#245237] border-1 border text-[15px] font-semibold py-2 px-8 hover:bg-[#245237] hover:text-white after:bg-[#245237] after:text-white">Dikembalikan</a>
                        </div>
                        <div class="flex items-center ml-auto">
                            <form class="">
                                <select id="urutkan" class="border-1 border-[#245237] border rounded-full px-3 font-medium text-sm text-[#245237]">
                                    <option selected>Urutkan dari</option>
                                    <option value="AZ">A-Z</option>
                                    <option value="ZA">Z-A</option>
                                    <option value="Dekat">Tenggat terdekat</option>
                                    <option value="Jauh">Tenggat terlama</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="flex px-5 gap-4"> 
                        <div class="bg-[#245237] flex w-1/3 h-[222px] rounded-md"></div>
                        <div class="flex flex-col w-2/3">
                            <div class="flex">
                                <p class="bg-[#245237] text-white font-bold text-[15px] px-2 rounded-md text-left">2 hari 8 jam 8 menit</p>
                            </div>

                            <div class="flex flex-col">
                                <p class="text-[20px] font-medium">Lorem Ipsum</p>
                                <p class="text-[15px] font-normal">
                                    Lorem ipsum dolor sit amet constracteur. Lorem ipsum dolor sit amet constracteur. Lorem ipsum dolor sit amet constracteur. Lorem ipsum dolor sit amet constracteur. Lorem ipsum dolor sit amet constracteur.                                
                                </p>
                            </div>

                            <div class="flex flex-col gap-1">
                                <div class="flex">
                                    <p class="bg-[#F0C001] text-[15px] px-2 rounded-md text-left">Dipinjam : 23 Maret 2024</p>
                                </div>
                                <div class="flex">
                                    <p class="bg-[#F7D914] text-[15px] px-2 rounded-md text-left">Jatuh Tempo : 28 Maret 2024</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-2/5 gap-5">
            <div class="border bg-[#245237] rounded-lg py-3 px-5">
                <div class="flex flex-col gap-2">
                    <div class="flex gap-10">
                        <div class="flex flex-col gap-4">
                            <div class="flex">
                                <div class="bg-white rounded-full text-[#245237] text-sm font-bold px-10 py-1">Siswa</div>
                            </div>
                            <div class="flex flex-col">
                                <p class="text-white text-xl font-semibold">Andy Septiawan Saragih</p>
                                <p class="text-white text-base font-medium">NISN</p>
                            </div>
                        </div>
                        <div class="flex py-3 px-2">
                            <div class="bg-white rounded-full w-[100px] h-[100px]"></div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="flex-grow border-t border-gray-400"></div>
                        <div class="text-white underline">
                            <a href="">Lihat Riwayat Peminjaman</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border border-[#245237] rounded-lg p-5">
                <div class="flex flex-col gap-3">
                   <div class="flex">
                        <p class="text-2xl text-gray-500 font-semibold">Baru Ditambahkan</p>
                   </div>
                   <div class="flex gap-2"> 
                    <div class="bg-[#245237] flex w-2/5 h-[222px] rounded-md"></div>
                    <div class="flex flex-col w-3/5">
                        <div class="flex flex-col gap-2">
                            <p class="text-[20px] font-medium">Lorem Ipsum</p>
                            <p class="text-[15px] font-normal">
                                Lorem ipsum dolor sit amet constracteur. Lorem ipsum dolor sit amet constracteur. Lorem ipsum dolor sit amet constracteur. Lorem ipsum dolor sit amet constracteur. Lorem ipsum dolor sit amet constracteur.                                
                            </p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT END -->

    <!-- FOOTER -->
    <footer class="bg-[#245237] p-10 justify-center w-full">
        <div class="flex w-full h-full md:max-w-screen-lg mx-auto px-5 gap-40">
            <div class="lg:flex lg:gap-28 lg:w-1/2 hidden">
                <div class="flex flex-col gap-3">
                    <p>INI LOGO</p>
                    <div class="flex flex-col text-white font-bold gap-0">
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
            <div class="flex lg:w-1/2 w-full lg:gap-24 gap-10 justify-between">
                <div class="flex flex-col items-start">
                    <p class="text-white font-bold text-lg">Hubungi Kami</p>
                    <div class="flex lg:flex-wrap flex-col gap-1">
                        <p>Email</p>
                        <p>No. Telepon</p>
                        <p>Dll</p>
                    </div>
                </div>
                <div class="flex flex-col gap-3">
                    <p>INI MAPS</p>
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
            <button onclick="toggleNavbar()">
              <i class="text-2xl text-gray-700 fa-solid fa-xmark"></i>
            </button>
          </div>
          <div class="px-4 flex flex-col gap-3 text-[#245237]">
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
        const toggleNavbar = () => {
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