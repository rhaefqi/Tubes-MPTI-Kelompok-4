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
    <div class="container mx-auto p-10 ">
        <div class="bg-white p-10 rounded-lg shadow-md md:flex md:flex-col md:justify-center md:items-center  h-[600px]">
            <h1 class="text-3xl font-bold mb-6 text-[#245237] text-center">Konfirmasi Email Anda</h1>
            <div class="mb-2 flex justify-center">
                <img src="https://st5.depositphotos.com/5934840/64966/v/450/depositphotos_649667750-stock-illustration-happy-young-woman-profile-character.jpg" alt="Gambar" class="box-border h-40 w-40 border-2 border-[#245237] rounded-full overflow-hidden">
            </div>
            {{-- @dd(auth()->user()->email) --}}
            <span class="text-black font-semibold text-sm mb-0 text-center">Kami telah mengirimkan verifikasi ke {{ auth()->user()->email }} untuk memvalidasi kebenaran email.</span>
            <span class="text-black font-semibold text-sm mb-0 text-center">klik verifikasi di email anda untuk menyelesaikan proses pendaftaran akun.</span>
            <p class="mt-4 font-semibold">Jika Anda belum menerimanya,<span class="text-[#245237]"> Klik Kirim Ulang Email Verifikasi</span></p>
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    Link verifikasi baru sudah dikirim ke email anda yang digunakan pada saat registrasi
                </div>
            @endif
            <div class="flex gap-7">
                <form method="POST" action="{{ route('verification.send') }}" class="mt-4 w-full">
                    @csrf
                    <div class="flex justify-center">
                        <button type="submit" class="bg-primary w-32 hover:bg-black text-white font-semibold py-2 px-4 rounded flex justify-center focus:outline-none focus:shadow-outline">
                            Kirim Ulang
                        </button>
                    </div>
                </form>
                <form method="POST" action="{{ route('logout') }}" class="w-full mt-4">
                    @csrf
                    <div class="flex justify-center">    
                        <button type="submit" class="bg-red-800 hover:bg-black text-white font-semibold py-2 px-4 rounded flex justify-center focus:outline-none focus:shadow-outline">
                            Logout
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
