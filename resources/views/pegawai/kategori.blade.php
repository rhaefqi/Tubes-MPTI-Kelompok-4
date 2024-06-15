@extends('layouts.main-pegawai')

@section('container')
<h1 class="text-primary font-open font-bold text-5xl mt-5 ml-8">
    <span>Kelola Kategori Buku</span>
</h1>

<div class="container mx-auto p-4">
    <div class="bg-white shadow-md rounded-lg p-4">
      <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
          <thead>
            <tr class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
              <th class="py-3 px-6 text-left">Kategori</th>
              <th class="py-3 px-6 text-left">Dibuat Pada</th>
              <th class="py-3 px-6 text-left">Diubah Pada</th>
            </tr>
          </thead>
          <tbody class="text-gray-600 text-sm font-light">
            <tr class="border-b border-gray-200 hover:bg-gray-100">
              <td class="py-3 px-6 text-left">nifbwuef</td>
              <td class="py-3 px-6 text-left">2024</td>
              <td class="py-3 px-6 text-left">2003</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div> 

@endsection