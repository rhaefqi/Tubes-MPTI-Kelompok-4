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
    <script src="https://kit.fontawesome.com/4ae60dfd7a.js" crossorigin="anonymous"></script>
    <title>@yield('title', 'Perpustakaan Amaliyah')</title>
    @livewireStyles
</head>
<body class="font-open flex">
    {{-- <div class="sm:grid grid-cols-7 gap-0"> --}}
        <!-- Sidebar -->
        <div class="hidden scale-0 text-[0px]"></div>
        {{-- @include('layouts.sidebar') --}}
        <livewire:sidebar/>
        {{-- @yield('sidebar') --}}

        <div class="w-full flex-grow transition-all duration-500 ease-in-out">
            <!-- navbar -->
            <div class="bg-white w-full flex border-b-[3px] border-primary transition-all duration-500 ease-in-out relative">
                <div class="fixed w-9 h-14 bg-primary rounded-e-lg self-center flex items-center justify-center text-white">
                    <button id="tombol-sidebar">
                        {{-- <i class="fa-solid fa-grip-lines"></i> --}}
                        <span id="garis-1"
                            class="block w-[22px] h-[3px] bg-white rounded my-1 transition duration-[400ms] ease-in-out origin-top-left rotate-45"></span>
                        <span id="garis-2"
                            class="block w-[22px] h-[3px] bg-white rounded my-1 transition duration-[400ms] ease-in-out scale-0"></span>
                        <span id="garis-3"
                            class="block w-[22px] h-[3px] bg-white rounded my-1 transition duration-[400ms] ease-in-out origin-bottom-left -rotate-45"></span>
                    </button>
                </div>
                <div class="container flex justify-center items-center max-w-full">
                    {{-- <div class="h-10 w-28 bg-slate-300 rounded-md my-4"></div> --}}
                    <img src="{{ asset('assets/img/logo.png') }}" alt="" class="w-20">
                    <div class="font-open text-primary font-semibold text-lg">
                        Perpustakaan <br>
                        Yayasan Amaliyah
                    </div>
                </div>
            </div>
            
            <!-- Main -->
            <div class="transition-all duration-500 ease-in-out">
                @yield('container')
            </div>
        </div>
    {{-- </div> --}}

    @livewireScripts
<script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>