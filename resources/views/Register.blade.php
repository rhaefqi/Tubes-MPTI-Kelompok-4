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
    <title>Register | Perpustakaan Yayasan Amaliyah</title>
    <link rel="shortcut icon" href="{{asset('assets/img/logo.png')}}" type="image/x-icon">
</head>
<body class="bg-[#F2F2F2] open-sans ">

    <div class="flex h-screen p-10 rounded-lg">
        <!-- Kolom Kiri: Gambar -->
        <div class="w-1/2 h-full bg-cover bg-center rounded-lg">
            <img src="{{ asset('assets/img/Gambar2.jpg') }}" alt="Deskripsi gambar" class="w-full h-full object-cover   bg-green-800 opacity-70 rounded-lg">
        </div>
    
        <!-- Kolom Kanan: Form Login -->

        <div class="w-1/2 flex items-center justify-center bg-white p-4 rounded-lg">            
            <form method="POST" action="{{ route("register") }}" class="w-full max-w-sm p-8 rounded-lg ">
                @csrf
                <h2 class="text-2xl font-bold mb-3 text-[#245237] text-center">Daftarkan Akun Anda !</h2>
                <div class="flex flex-col mb-2">
                    <div class="space-x-4 flex">
                        <label class="flex items-center">
                            <input type="radio" class="form-radio" name="status" id="siswa" value="siswa">
                            <span class="ml-2">Siswa</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" class="form-radio" name="status" id="guru" value="guru">
                            <span class="ml-2">Guru</span>
                        </label>
                    </div>
                    @error('status')
                        <p class="text-xs text-red-600 font-semibold text-left">{{ $message }}</p>
                    @enderror      
                </div>

                <div class="mb-1 mt-1">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nisn_nip">
                        NISN/NIP  <span style="color: red;">*</span>
                    </label>
                    <input id="nisn_nip" name="nisn_nip" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Masukan NISN/NIP" value="{{ old('nisn_nip') }}">
                    @error('nisn_nip')
                        <p class="text-xs text-red-600 font-semibold text-left">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-1 mt-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Username <span style="color: red;">*</span>
                    </label>
                    <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" type="text" placeholder="Masukkan Username" value="{{ old('username') }}">
                    @error('username')
                        <p class="text-xs text-red-600 font-semibold text-left">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-1 mt-1">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                         Email <span style="color: red;">*</span>
                    </label>
                    <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="email" type="email" placeholder="Masukkan Email" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-xs text-red-600 font-semibold text-left">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-1 mt-1">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="no_hp">
                         Email <span style="color: red;">*</span>
                    </label>
                    <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="no_hp" type="text" placeholder="Masukkan Email" value="{{ old('no_hp') }}">
                    @error('no_hp')
                        <p class="text-xs text-red-600 font-semibold text-left">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-1">
                    <label class="block text-gray-700 text-sm font-bold mb-2 " for="password">
                        Password <span style="color: red;">*</span>
                    </label>
                    <div class="relative">
                        <input class="shadow-lg appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" placeholder="Masukkan Password Anda">
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                            <i class="far fa-eye cursor-pointer" id="togglePassword"></i>
                        </span>
                    </div>
                    @error('password')
                        <p class="text-xs text-red-600 font-semibold text-left">Password harus minimal 8 kata dengan kombinasi angka, huruf, dan simbol</p>
                    @enderror
                </div>
                <div class="mb-1">
                    <label class="block text-gray-700 text-sm font-bold mb-2 " for="konpassword">
                        Konfirmasi Password <span style="color: red;">*</span>
                    </label>
                    <div class="relative">
                        <input class="shadow-lg appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" id="konpassword" name="konpassword" type="password" placeholder="Masukkan Password Anda">
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                            <i class="far fa-eye cursor-pointer" id="togglekonPassword"></i>
                        </span>
                    </div>
                    @error('password')
                        <p class="text-xs text-red-600 font-semibold text-left">Password harus minimal 8 kata dengan kombinasi angka, huruf, dan simbol</p>
                    @enderror
                </div>
                <div class="flex flex-col items-center justify-center">
                    <div class="mb-1">
                        <p class="text-sm mb-0">Sudah memiliki akun? <a  class="text-[#245237]" href="{{ route('login') }}">Login ?</a></p>
                    </div>
                    <button class="bg-[#245237] w-40 hover:bg-black text-white font-bold py-2 px-4 rounded align-middle focus:outline-none focus:shadow-outline" type="submit">
                        Daftar
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const togglekonPassword = document.querySelector('#togglekonPassword');
        const konpassword = document.querySelector('#konpassword');


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

        togglekonPassword.addEventListener('click', function (e) {
            // Toggle the type attribute
            const type = konpassword.getAttribute('type') === 'password' ? 'text' : 'password';
            konpassword.setAttribute('type', type);
            // Toggle the eye / eye-slash icon
            if (type === 'password') {
                togglekonPassword.classList.add('fa-eye');
                togglekonPassword.classList.remove('fa-eye-slash');
            } else {
                togglekonPassword.classList.add('fa-eye-slash');
                togglekonPassword.classList.remove('fa-eye');
            }
        });
    </script>
    
</body>
</html>