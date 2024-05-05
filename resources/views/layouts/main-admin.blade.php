<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <!-- Sidebar -->
    <div class="hidden sm:flex bg-primary fixed w-52 left-0 h-full justify-center text-white font-open">

        <img src="" alt="">
        <ul class="">
            <li>
                <a href="#home" class="text-2xl font-semibold text-center pt-4 flex mb-14">Staff <br> Administrasi</a>
            </li>
            <ul class="pl-2">
                <li class="mb-4">
                    <a href="" class="font-semibold">Dashboard</a>
                </li>
                <li class="mb-1">
                    <a href="" class="font-semibold">Buku</a>
                </li>
                <li class="mb-1">
                    <a href="" class="font-semibold">Ebook</a>
                </li>
                <li class="mb-1">
                    <a href="" class="font-semibold">Petugas</a>
                </li>
                <li class="mb-1">
                    <a href="" class="font-semibold">Guru</a>
                </li>
                <li class="mb-1">
                    <a href="" class="font-semibold">Siswa</a>
                </li>
                <li class="mb-1">
                    <a href="" class="font-semibold">Log Ebook</a>
                </li>
                <li class="mb-1">
                    <a href="" class="font-semibold">Log Buku</a>
                </li>
                <li class="mb-1">
                    <a href="" class="font-semibold">Log Peminjaman</a>
                </li>

                <li class="mt-4">
                    <a href="" class="font-semibold">Akun</a>
                </li>
            </ul>
        </ul>
    </div>

    <!-- navbar -->
    <div class="bg-white w-full top-0 left-0 flex border-b-[3px] border-primary">
        <div class="sm:pr-52 hidden sm:block"></div>
        <div class="container flex justify-center items-center">
            <div class="h-10 w-28 bg-slate-300 rounded-md my-4"></div>
        </div>
    </div>

    <!-- Main -->
    <div class="main">
        @yield('container')
    </div>

    
</body>
</html>