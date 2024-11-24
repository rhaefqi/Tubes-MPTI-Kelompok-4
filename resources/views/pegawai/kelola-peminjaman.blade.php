@extends('layouts.main-pegawai')

@section('container')
<h1 class="text-primary font-open font-bold text-3xl mt-5 ml-8 text-left">
    <span>Daftar buku</span>
</h1>

<livewire:alert-success />
<livewire:peminjaman-buku />
@endsection
{{-- <div class="flex-1 flex items-start justify-center p-6">
    <div class="container mx-auto py-8">
        <h1 class="text-green-900 text-4xl font-extrabold font-['open sans']">Manajemen Peminjaman Guru</h1>
        <div class="max-w-lg ml-auto flex justify-end">
            <!-- Tombol di sisi kanan halaman -->
            <a href="manajemen_peminjaman_guru_tambah.html" class="text-white bg-[#5D834F] hover:bg-[#5D834F] focus:ring-4 focus:ring-[#5D834F] font-bold rounded-lg text-sm px-5 py-2.5 dark:bg-[#5D834F] dark:hover:bg-[#5D834F] focus:outline-none dark:focus:ring-[#5D834F] text-right">Tambah Data</a>
        </div>
        <div class="mt-8">
            <table class="min-w-full bg-white rounded-lg border border-green-900">
                <thead class="border-b divide-y divide-green-900">
                    <tr>
                        <th class="text-center py-2 px-4 uppercase font-bold text-green-900 text-xl border-l border-r border-t border-green-900 border-2">NIP</th>
                        <th class="text-center py-2 px-4 uppercase font-bold text-green-900 text-xl border-l border-r border-t border-green-900 border-2">Nama</th>
                        <th class="text-center py-2 px-4 uppercase font-bold text-green-900 text-xl border-l border-r border-t border-green-900 border-2">Seri Buku</th>
                        <th class="text-center py-2 px-4 uppercase font-bold text-green-900 text-xl border-l border-r border-t border-green-900 border-2">Waktu</th>
                        <th class="text-center py-2 px-4 uppercase font-bold text-green-900 text-xl border-l border-r border-t border-green-900 border-2">Status</th>
                        <th class="text-center py-2 px-4 uppercase font-bold text-green-900 text-xl border-l border-r border-t border-green-900 border-2">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="py-2 px-4 border-l border-r border-t border-green-900 border-2">143561735</td>
                        <td class="py-2 px-4 border-l border-r border-t border-green-900 border-2">Ucok</td>
                        <td class="py-2 px-4 border-l border-r border-t border-green-900 border-2">Matematika 1</td>
                        <td class="py-2 px-4 border-l border-r border-t border-green-900 border-2"></td>
                        <td class="py-2 px-4 border-l border-r border-t border-green-900 border-2 text-red-500">Dipinjam</td>
                        <td class="py-2 px-4 border-l border-r border-t border-green-900 border-2 center">
                            <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4  focus:outline-none focus:shadow-outline mx-2" type="button">
                                Kembalikan
                              </button>
                        </td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
</div> --}}