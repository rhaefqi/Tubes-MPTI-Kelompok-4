<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.4.47/css/materialdesignicons.min.css" integrity="sha512-/k658G6UsCvbkGRB3vPXpsPHgWeduJwiWGPCGS14IQw3xpr63AEMdA8nMYG2gmYkXitQxDTn6iiK/2fD4T87qA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', 'Perpustakaan Yayasan Amaliyah')</title>
    <link rel="shortcut icon" href="{{asset('assets/img/logo.png')}}" type="image/x-icon">
    @livewireStyles
</head>
<body class="bg-[#F2F2F2] open-sans">
    <!-- HEADER START -->
    @include('layouts.header-main')
    <!-- HEADER END -->

    <!-- CONTENT -->
    @yield('content')
    <!-- CONTENT END -->

    <!-- FOOTER -->
    @include('layouts.footer')
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
            <a href="/home" class="flex w-full justify-between items-center text-sm h-8">
                <p class="font-bold"><span class="mdi mdi-home"></span> Beranda</p>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
            <a href="{{ route('perpus') }}" class="flex w-full justify-between items-center text-sm h-8">
                <p class="font-bold"><span class="mdi mdi-library"></span> Buku</p>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
            <a href=" {{ route('profile') }}" class="flex w-full justify-between items-center text-sm h-8">
              <p class="font-bold"><span class="mdi mdi-account"></span> Profile</p>
              <i class="fa-solid fa-arrow-right"></i>
          </a>
          <a href="{{ route('logout') }}" class="flex w-full justify-between items-center text-sm h-8">
            <p class="font-bold"><span class="mdi mdi-logout"></span> Logout</p>
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

        function togglePasswordVisibility(toggleId, inputId) {
          const toggleElement = document.getElementById(toggleId);
          const inputElement = document.getElementById(inputId);
          
          toggleElement.addEventListener('click', function () {
              if (inputElement.type === 'password') {
                  inputElement.type = 'text';
                  toggleElement.classList.remove('mdi-eye');
                  toggleElement.classList.add('mdi-eye-off');
              } else {
                  inputElement.type = 'password';
                  toggleElement.classList.remove('mdi-eye-off');
                  toggleElement.classList.add('mdi-eye');
              }
          });
      }

      togglePasswordVisibility('toggle-old-password', 'old-password');
      togglePasswordVisibility('toggle-new-password', 'new-password');
      togglePasswordVisibility('toggle-confirm-password', 'confirm-password');

      document.getElementById('file-input').addEventListener('change', function(event) {
            console.log(event.target.files);
        });

      function updateImage(event) {
          const file = event.target.files[0];
          if (file) {
              const reader = new FileReader();
              reader.onload = function(e) {
                  const img = document.getElementById('profile-image');
                  img.src = e.target.result;
              }
              reader.readAsDataURL(file);
          }
      }
      </script>

      @livewireScripts
</body>
</html>