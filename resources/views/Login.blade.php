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
    <title>Login | Perpustakaan Yayasan Amaliyah</title>
    <link rel="shortcut icon" href="{{asset('assets/img/logo.png')}}" type="image/x-icon">
</head>
<body class="bg-[#F2F2F2] open-sans ">

    <div class="flex h-full md:h-screen md:p-10 p-3 rounded-lg">
        <!-- Kolom Kiri: Form Login -->
        <div class="w-full md:w-1/2 flex items-center justify-center bg-white p-4 rounded-lg">
            <form class="w-full max-w-sm bg-white p-8 rounded-lg " action="{{ route('user.login') }}" method="POST">
                @csrf
                <h2 class="text-2xl md:text-3xl font-bold mb-3 text-[#245237] text-center">Selamat Datang</h2>
                <h5 class="text-sm">Silahkan isi menggunakan NISN atau NIP untuk masuk ke aplikasi.</h5>
                <div class="mb-4 mt-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nsin_nip">
                        NISN / NIP <span style="color: red;">*</span>
                    </label>
                    <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="nsin_nip" id="nsin_nip" type="text" placeholder="Masukkan nsin_nip">
                    @error('nsin_nip')
                        <p class="text-xs text-red-600 font-semibold text-left">{{ $message }}</p>
                    @enderror
                </div>
                {{-- <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2 " for="password">
                        Password <span style="color: red;">*</span>
                    </label>
                    <div class="relative">
                        <input class="shadow-lg appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" name="password" id="password" type="password" placeholder="Masukkan Password Anda">
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                            <i class="far fa-eye cursor-pointer" id="togglePassword"></i>
                        </span>
                        @error('pasword')
                            <p class="text-xs text-red-600 font-semibold text-left">{{ $message }}</p>
                        @enderror
                    </div>
                    <p class="text-sm text-black hover:text-[#245237] font-semibold text-right">Lupa Password?</p>
                </div> --}}
                <div class="flex flex-col items-center justify-center">
                    {{-- <div class="mb-4">
                        <p class="text-sm mb-0">Belum memiliki akun? <a  class="text-[#245237] font-bold" href="{{ route("register") }}">Daftar</a></p>
                    </div> --}}
                    <button type="submit" class="bg-[#245237] w-40 text-white font-bold py-2 px-4 rounded align-middle focus:outline-none focus:shadow-outline border-2 border-[#245237]  hover:text-[#245237] hover:bg-white">
                        Masuk
                    </button>
                </div>
            </form>
        </div>

        <!-- Kolom Kanan: Gambar -->
        <div class="hidden md:flex w-1/2 h-full bg-cover bg-center rounded-lg">
            <img src="{{ asset("assets/img/login.jpg") }}" alt="Deskripsi gambar" class="w-full h-full object-cover rounded-lg">
        </div>
    </div>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function (e) {
            // Toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // Toggle the eye / eye-slash icon
            if (type === 'password') {
                togglePassword.classList.add('fa-eye');
                togglePassword.classList.remove('fa-eye-slash');
            } else {
                togglePassword.classList.add('fa-eye-slash');
                togglePassword.classList.remove('fa-eye');
            }
        });
    </script>
    
</body>
</html>