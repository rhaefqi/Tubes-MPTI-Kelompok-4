{{-- <div> --}}
{{-- In work, do what you enjoy. --}}
{{-- </div> --}}

<div id="modalKembalikan" class="{{ $this->modalKembalikan == true ? '' : 'hidden' }}">
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    <div class="bg-gray-200 opacity-40 fixed inset-0"></div>
    <div class="bg-white rounded-md m-auto fixed inset-0 max-w-xl max-h-fit border-2 border-primary">
        <div class="p-4 w-full max-h-full">
            <div class="relative bg-white rounded-lg dark:bg-gray-700">
                <div class="flex justify-center mb-3 border-b-2 border-primary">
                    <div class="flex items-center mb-2">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="" class="w-16">
                        <div class="font-open text-primary font-semibold text-lg">
                            Perpustakaan <br>
                            Yayasan Amaliyah
                        </div>
                    </div>
                </div>
                <div class="font-open font-semibold">
                    <div class=" mb-3">
                        <span class="text-primary text-lg">Data Peminjam</span>
                    </div>
                    <div class="flex">
                        <div class="flex flex-col">
                            <span>Nama</span>
                            <span>Status</span>
                            <span>Status Peminjaman</span>
                        </div>
                        <div class="flex flex-col ml-3">
                            <span>:</span>
                            <span>:</span>
                            <span>:</span>
                        </div>
                        <div class="flex flex-col ml-3">
                            <span>{{ $pengembali->nama }}</span>
                            <span>{{ $pengembali->tingkat }}</span>
                            <span>{{ $pengembali->status }}</span>
                        </div>
                    </div>
                    <hr class="my-3">
                    <div class=" mb-3">
                        <span class="text-primary text-lg">Buku Yang di Kembalikan</span>
                    </div>
                    <div class="flex">
                        <div class="flex flex-col">
                            <span>Judul</span>
                            <span>Jumlah dipinjam</span>
                            <span>tanggal dipinjam</span>
                        </div>
                        <div class="flex flex-col ml-3">
                            <span>:</span>
                            <span>:</span>
                            <span>:</span>
                        </div>
                        <div class="flex flex-col ml-3">
                            <span>{{ $pengembali->judul }}</span>
                            <span>{{ $pengembali->jumlah_dipinjam }}</span>
                            <span>{{ $pengembali->tanggal_pinjam }}</span>
                        </div>
                    </div>
                </div>
                <hr class="my-3">
                <div class="flex justify-center mt-5">
                    <button wire:click="konfirmasiKembalikan('kembalikan')" type="button"
                        class="py-2.5 px-5  text-md font-medium text-white focus:outline-none bg-primary rounded-lg border hover:primary focus:z-10 focus:ring-4 focus:ring-secondary">Kembalikan</button>
                    <button wire:click="konfirmasiKembalikan('batal')" type="button"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 ms-3 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-md inline-flex items-center px-5 py-2.5 text-center">
                        Batal
                    </button>

                </div>
            </div>
        </div>

    </div>
</div>
