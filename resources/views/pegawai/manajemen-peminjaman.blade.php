@extends('layouts.main-pegawai')

@section('container')
<h1 class="text-primary font-open font-bold text-3xl mt-5 ml-8 text-start">
    <span>Data Peminjaman</span>
</h1>

<div class="container mx-auto p-4">
    <div class="bg-white shadow-md rounded-lg p-4">
      {{-- <h1 class="text-2xl font-bold mb-4 text-center">DATA BUKU</h1> --}}
      <button class="mb-4 bg-blue-400 text-white py-2 px-4 rounded"><i class="fa-solid fa-plus"></i> Tambah Data</button>
      <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
          <thead>
            <tr class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
              <th class="py-3 px-6 text-left">No. Seri</th>
              <th class="py-3 px-6 text-left">Judul Buku</th>
              <th class="py-3 px-6 text-left">Penulis</th>
              <th class="py-3 px-6 text-left">Tahun Terbit</th>
              <th class="py-3 px-6 text-left">Kategori</th>
              <th class="py-3 px-6 text-left">Kelas</th>
              <th class="py-3 px-6 text-left">Stok</th>
              <th class="py-3 px-6 text-left">Subjek</th>
              <th class="py-3 px-6 text-left">Kelola</th>
            </tr>
          </thead>
          <tbody class="text-gray-600 text-sm font-light">
            <tr class="border-b border-gray-200 hover:bg-gray-100">
              <td class="py-3 px-6 text-left whitespace-nowrap">202</td>
              <td class="py-3 px-6 text-left">Matematika Dasar</td>
              <td class="py-3 px-6 text-left">Windah Basudara</td>
              <td class="py-3 px-6 text-left">2003</td>
              <td class="py-3 px-6 text-left">Matematika</td>
              <td class="py-3 px-6 text-left">MTs</td>
              <td class="py-3 px-6 text-left">35</td>
              <td class="py-3 px-6 text-left"></td>
              <td class="py-3 px-6 text-left">
                <div class="flex item-center">
                  <button class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                    <i class="fa-solid fa-pen-to-square text-[#69BE28] fa-lg"></i>
                  </button>
                  <button class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                    <i class="fa-solid fa-trash-can text-red-500 fa-lg"></i>
                  </button>
                  <button class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                    <i class="fa-solid fa-circle-arrow-right text-[#F0C807] fa-lg"></i>
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div> 
@endsection