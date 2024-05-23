<div class="flex relative px-3 justify-center">
    <div class="brightness-[25%] h-24 overflow-hidden rounded-lg">
        <img src="{{ asset('img/cari.jpg') }}" class="w-full">
    </div>
    <div class="flex flex-col absolute text-center text-xl md:text-2xl md:top-2 font-semibold top-4 text-white">
        <p>Perpustakaan</p>
        <p>Cari Buku yang Diinginkan</p>
    </div>
    <div class="flex absolute -bottom-2 w-full justify-center gap-2">
        <input type="text" class="w-1/2 h-7 rounded-lg border border-1 border-[#245237] px-3 placeholder:text-sm placeholder:font-semibold" placeholder="Cari Buku">
        <button class="w-7 h-7 rounded-lg border border-1 border-[#245237] bg-white">
            <span class="mdi mdi-magnify text-[#245237]"></span>
        </button>
    </div>
</div>