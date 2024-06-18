@extends('layouts.main')

@section('title', 'Profile | Perpustakaan Amaliyah')

@section('content')
<div class="flex flex-col md:flex-row-reverse w-full md:max-w-screen-lg mx-auto gap-1 my-10">
    <div class="flex flex-col w-full md:w-1/4 gap-5">
        <div class="flex flex-col items-center">
            <img src="{{ auth()->user()->photo_profile == null ? asset('assets/img/fadillah.jpg') : asset(auth()->user()->photo_profile) }}" class="w-20 h-20 rounded-full" alt="">

            <div class="flex flex-col text-center">
                <p class="font-semibold">{{auth()->user()->username}}</p>
                <div class="flex justify-center">
                    <p class="bg-[#245237] text-sm font-semibold text-white rounded-lg px-2">
                        {{ auth()->user()->status == 'guru' ? 'Guru' : 'Siswa' }}
                    </p>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-2 p-2">
            <div class="flex">
                <p class="bg-[#245237] font-semibold text-white rounded-lg px-2 text-[13px]"><span class="mdi mdi-account"></span> Data Diri</p>
            </div>

            <div class="flex px-2 gap-2 font-normal text-[12px] md:text-[14px]">
                <div class="flex flex-col gap-1 w-16">
                    <p>{{ auth()->user()->status == 'guru' ? 'NIP' : 'NISN' }}</p>
                    <p>Nama</p>
                    <p>Tingkat</p>
                    @if (auth()->user()->status != 'guru')
                        <p>Kelas</p>
                    @endif
                    <p>Gender</p>
                    <p>No. Hp</p>
                    <p>Email</p>
                </div>

                <div class="flex flex-col gap-1 w-2 text-start">
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    @if (auth()->user()->status != 'guru')
                        <p>:</p>
                    @endif
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                </div>

                @php
                    $user = auth()->user();
                    $profile = $user->status == 'siswa' ? $user->siswa : $user->guru;
                    $jenis_kelamin = $profile->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan';
                @endphp

                <div class="flex flex-col gap-1 text-start">
                    <p>{{ $user->status == 'siswa' ? $profile->nisn : $profile->nip }}</p>
                    <p>{{ $profile->nama }}</p>
                    <p>{{ $profile->tingkat }}</p>
                    @if ($user->status == 'siswa')
                        <p>{{ $profile->kelas }}</p>
                    @endif
                    <p>{{ $jenis_kelamin }}</p>
                    <p>{{ $user->no_hp }}</p>
                    <p>{{ $user->email }}</p>
                </div>
            </div>
        </div>

        <div class="flex justify-center gap-2">
            <a href="{{ route('edit.profile') }}" class="bg-[#f2f2f2] border-2 border-[#245237] rounded-lg text-[#245237] text-[12px] text-center font-bold px-4 py-1">
                Kelola Profile
            </a>
            <a href="{{ route('ubah.sandi') }}" class="bg-[#245237] border-2 border-[#245237] rounded-lg text-white text-[12px] text-center font-bold px-4 py-1">
                Kelola Kata Sandi
            </a>
        </div>
    </div>
    
    <div class="flex flex-col w-full md:w-3/4 px-2 gap-5">
        <div class="flex md:hidden w-full border border-1 border-opacity-50 border-black mt-4"></div>

        @livewire('filter-riwayat')
    </div>
</div>
@endsection