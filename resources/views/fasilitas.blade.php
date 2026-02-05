@extends('layouts.app')

@section('title', 'Fasilitas Sekolah - SMKN 5 Samarinda')

@section('content')

{{-- Hero Section --}}
<section class="bg-[#1e5494] pt-24 pb-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold text-white text-left mb-3">Fasilitas Sekolah</h1>
        
        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-blue-100">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">
                <i class="fa-solid fa-home"></i>
                <span class="ml-1">Beranda</span>
            </a>
            <i class="fa-solid fa-chevron-right text-xs"></i>
            <span class="text-white">Fasilitas</span>
        </nav>
    </div>
</section>

{{-- Gallery Grid Section --}}
<section class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-16">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
        
        {{-- Gedung Utama --}}
        <div class="group relative h-48 md:h-64 rounded-2xl overflow-hidden shadow-xl cursor-pointer border-4 border-white bg-gray-100">
            <img 
                src="{{ asset('assets/images/facilities/gedung-sekolah.webp') }}" 
                alt="Gedung Utama SMKN 5 Samarinda"
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-black/60 group-hover:bg-black/0 transition-colors duration-0"></div>
            <h3 class="absolute bottom-4 left-4 text-white font-bold text-xl group-hover:text-amber-400 transition-colors duration-0">
                Gedung Utama
            </h3>
        </div>

        {{-- Lab TJKT --}}
        <div class="group relative h-48 md:h-64 rounded-2xl overflow-hidden shadow-xl cursor-pointer border-4 border-white bg-gray-100">
            <img 
                src="{{ asset('assets/images/facilities/lab-tjkt.webp') }}" 
                alt="Laboratorium TJKT"
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-black/60 group-hover:bg-black/0 transition-colors duration-0"></div>
            <h3 class="absolute bottom-2 md:bottom-4 left-2 md:left-4 text-white font-bold text-base md:text-xl group-hover:text-amber-400 transition-colors duration-0">
                Laboratorium TJKT
            </h3>
        </div>

        {{-- Ruang Kelas --}}
        <div class="group relative h-48 md:h-64 rounded-2xl overflow-hidden shadow-xl cursor-pointer border-4 border-white bg-gray-100">
            <img 
                src="{{ asset('assets/images/facilities/ruang-kelas.webp') }}" 
                alt="Ruang Kelas Teori"
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-black/60 group-hover:bg-black/0 transition-colors duration-0"></div>
            <h3 class="absolute bottom-2 md:bottom-4 left-2 md:left-4 text-white font-bold text-base md:text-xl group-hover:text-amber-400 transition-colors duration-0">
                Ruang Kelas Teori
            </h3>
        </div>

        {{-- Lab Pekerjaan Sosial --}}
        <div class="group relative h-48 md:h-64 rounded-2xl overflow-hidden shadow-xl cursor-pointer border-4 border-white bg-gray-100">
            <img 
                src="{{ asset('assets/images/facilities/lab-ps.webp') }}" 
                alt="Laboratorium Pekerjaan Sosial"
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-black/60 group-hover:bg-black/0 transition-colors duration-0"></div>
            <h3 class="absolute bottom-2 md:bottom-4 left-2 md:left-4 text-white font-bold text-base md:text-xl group-hover:text-amber-400 transition-colors duration-0">
                Lab. Pekerjaan Sosial
            </h3>
        </div>

        {{-- Musholla --}}
        <div class="group relative h-48 md:h-64 rounded-2xl overflow-hidden shadow-xl cursor-pointer border-4 border-white bg-gray-100">
            <img 
                src="{{ asset('assets/images/facilities/musholla.webp') }}" 
                alt="Musholla Sekolah"
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-black/60 group-hover:bg-black/0 transition-colors duration-0"></div>
            <h3 class="absolute bottom-2 md:bottom-4 left-2 md:left-4 text-white font-bold text-base md:text-xl group-hover:text-amber-400 transition-colors duration-0">
                Musholla Sekolah
            </h3>
        </div>
        <div class="group relative h-48 md:h-64 rounded-2xl overflow-hidden shadow-xl cursor-pointer border-4 border-white bg-gray-100">
            <img 
                src="{{ asset('assets/images/facilities/lab-mplb.webp') }}" 
                alt="Laboratorium MPLB"
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-black/60 group-hover:bg-black/0 transition-colors duration-0"></div>
            <h3 class="absolute bottom-2 md:bottom-4 left-2 md:left-4 text-white font-bold text-base md:text-xl group-hover:text-amber-400 transition-colors duration-0">
                Laboratorium MPLB
            </h3>
        </div>
        <div class="group relative h-48 md:h-64 rounded-2xl overflow-hidden shadow-xl cursor-pointer border-4 border-white bg-gray-100">
            <img 
                src="{{ asset('assets/images/facilities/lab-dkv.webp') }}" 
                alt="Laboratorium DKV"
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-black/60 group-hover:bg-black/0 transition-colors duration-0"></div>
            <h3 class="absolute bottom-2 md:bottom-4 left-2 md:left-4 text-white font-bold text-base md:text-xl group-hover:text-amber-400 transition-colors duration-0">
                Laboratorium DKV
            </h3>
        </div>
        <div class="group relative h-48 md:h-64 rounded-2xl overflow-hidden shadow-xl cursor-pointer border-4 border-white bg-gray-100">
            <img 
                src="{{ asset('assets/images/facilities/koperasi.webp') }}" 
                alt="Koperasi Sekolah"
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-black/60 group-hover:bg-black/0 transition-colors duration-0"></div>
            <h3 class="absolute bottom-2 md:bottom-4 left-2 md:left-4 text-white font-bold text-base md:text-xl group-hover:text-amber-400 transition-colors duration-0">
                Koperasi Sekolah
            </h3>
        </div>

    </div>
</section>

@endsection
