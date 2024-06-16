@extends('layouts.main-pegawai')

@section('container')
    <h1 class="text-primary font-open font-bold text-4xl mt-5 ml-8 text-center">
        <span>Tambah Buku</span>
    </h1>

    <div class="container mx-auto">
        <div class="bg-white shadow-md rounded-lg p-6">
            {{-- <h1 class="text-2xl font-bold mb-4 text-center">Tambah Buku</h1> --}}
            <form>
                <div class="mb-4">
                    <label for="no_seri" class="block text-gray-700 text-sm font-bold mb-2">No. Seri</label>
                    <input type="text" id="no_seri"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="judul_buku" class="block text-gray-700 text-sm font-bold mb-2">Judul Buku</label>
                    <input type="text" id="judul_buku"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="penulis" class="block text-gray-700 text-sm font-bold mb-2">Penulis</label>
                    <input type="text" id="penulis"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="tahun_terbit" class="block text-gray-700 text-sm font-bold mb-2">Tahun Terbit</label>
                    <input type="text" id="tahun_terbit"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="kategori" class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
                    <input type="text" id="kategori"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="kelas" class="block text-gray-700 text-sm font-bold mb-2">Kelas</label>
                    <input type="text" id="kelas"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="stok" class="block text-gray-700 text-sm font-bold mb-2">Stok</label>
                    <input type="text" id="stok"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="subjek" class="block text-gray-700 text-sm font-bold mb-2">Subjek</label>
                    <input type="text" id="subjek"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="subjek" class="block text-gray-700 text-sm font-bold mb-2">View</label>
                    <input type="text" id="subjek"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="keterangan" class="block text-gray-700 text-sm font-bold mb-2">Abstrak</label>
                    <textarea id="keterangan"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-24"></textarea>
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-primary hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="button">
                        Simpan
                    </button>
                    <button
                        class="bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="button">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
