@extends('layouts.app')

@section('title', 'Beranda - SMKN 5 Samarinda')

@section('content')

{{-- 
    HERO SECTION (FIXED VERSION)
    Menggunakan Inline CSS agar aman dari masalah cache/build di server.
--}}
<section style="
    position: relative; 
    width: 100%; 
    height: 100vh; 
    background-image: url('{{ asset('images/drone-smk-2.webp') }}'); 
    background-size: cover; 
    background-position: center; 
    background-attachment: fixed; 
    margin-top: -80px; 
    display: flex; 
    align-items: flex-end;
    z-index: 0;
">
    {{-- Gradient Overlay (Manual CSS) --}}
    <div style="
        position: absolute; 
        top: 0; 
        left: 0; 
        width: 100%; 
        height: 100%; 
        background: linear-gradient(to top, #111827 0%, rgba(17, 24, 39, 0.6) 50%, rgba(0, 0, 0, 0.1) 100%);
        z-index: 1;
    "></div>
    
    {{-- Content Container --}}
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative" style="z-index: 10; padding-bottom: 5rem;">
        <div class="max-w-4xl">
            
            {{-- Headline --}}
            <h1 class="text-3xl sm:text-4xl md:text-6xl font-extrabold text-white tracking-tight drop-shadow-lg leading-tight" 
                style="text-shadow: 0 4px 6px rgba(0,0,0,0.5);">
                SMK NEGERI 5 SAMARINDA
            </h1>
            
            {{-- Subheadline --}}
            <p class="mt-3 md:mt-4 text-base sm:text-lg md:text-xl text-gray-200 max-w-2xl font-medium drop-shadow-md">
                Mewujudkan Lingkungan Belajar Unggul, Hijau, dan Berkarakter dengan Fasilitas Terlengkap.
            </p>
            
            {{-- CTA Buttons --}}
            <div class="mt-6 md:mt-8 flex flex-col sm:flex-row gap-3 md:gap-4">
                
                {{-- Primary Button (Green) --}}
                <a href="https://smkn5smr.sch.id/portal" target="_blank" 
                   class="bg-green-600 hover:bg-green-700 text-white px-6 md:px-8 py-2.5 md:py-3 rounded-full font-bold transition shadow-lg flex items-center justify-center gap-2 text-sm md:text-base">
                    <span>Portal SMKN 5</span>
                    {{-- Icon Arrow (SVG Manual biar aman) --}}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
                
                {{-- Secondary Button (Outline) --}}
                <a href="{{ url('jurusan/dkv') }}" 
                   class="backdrop-blur-md bg-white/10 border-2 border-white/70 text-white hover:bg-white/20 px-6 md:px-8 py-2.5 md:py-3 rounded-full font-bold transition flex items-center justify-center gap-2 text-sm md:text-base">
                    <span>Kompetensi Keahlian</span>
                </a>

            </div>
        </div>
    </div>
</section>

@include('components.statistics-section')

<section class="py-16 md:py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <div class="order-2 lg:order-1 flex justify-center">
                    <div class="w-full max-w-xs md:w-80 lg:w-96 relative">
                        <div class="absolute top-10 left-10 w-full h-full bg-green-100 rounded-full filter blur-3xl opacity-50 -z-10"></div>
                        
                        <img 
                            src="{{ asset('/assets/images/pimpinan/yeni-ronalisa.png') }}" 
                            alt="Kepala Sekolah SMKN 5 Samarinda" 
                            class="w-full h-auto object-contain drop-shadow-xl hover:scale-105 transition-transform duration-500"
                            onerror="this.src='https://via.placeholder.com/400x450/10b981/ffffff?text=Kepala+Sekolah'"
                        >
                    </div>
                </div>
                
                <div class="order-1 lg:order-2">
                    <div class="mb-8">
                        <span class="inline-flex items-center px-4 py-2 bg-green-50 text-green-700 rounded-full text-sm font-bold mb-4 border border-green-100">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Sambutan
                        </span>
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-3 leading-tight">
                            Sambutan Kepala Sekolah
                        </h2>
                        <div class="w-24 h-1.5 bg-gradient-to-r from-green-500 to-teal-500 rounded-full"></div>
                    </div>
                    
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-800">Yeni Ronalisa., S.Si., M.Pd</h3>
                        <p class="text-green-600 font-medium">Kepala Sekolah SMK Negeri 5 Samarinda</p>
                    </div>
                    
                    <div class="mb-8 p-6 bg-gray-50 border-l-4 border-green-500 rounded-r-xl italic text-gray-700 leading-relaxed shadow-sm">
                        "Pendidikan bukan sekadar mengisi wadah, tetapi menyalakan api semangat untuk masa depan yang gemilang."
                    </div>
                    
                    <div class="space-y-4 text-gray-600 leading-relaxed text-justify text-lg">
                        <p>
                            Selamat datang di website resmi <strong class="text-gray-900">SMK Negeri 5 Samarinda</strong>. 
                            Kami berkomitmen mencetak lulusan yang kompeten, berkarakter, dan siap bersaing di dunia industri global.
                        </p>
                        <p>
                            Dengan didukung oleh tenaga pendidik profesional, fasilitas modern, dan kemitraan dengan berbagai industri terkemuka, 
                            kami terus berinovasi dalam memberikan pendidikan kejuruan yang berkualitas dan relevan dengan kebutuhan dunia kerja.
                        </p>
                        <p>
                            Mari bersama-sama kita wujudkan generasi muda yang unggul, berakhlak mulia, dan siap berkontribusi bagi kemajuan bangsa.
                        </p>
                    </div>
                    
                    <div class="mt-10 pt-6 border-t border-gray-100 flex items-center gap-4">
                        <div>
                            <p class="font-bold text-gray-900 text-lg font-serif">Yeni Ronalisa., S.Si., M.Pd</p>
                            <p class="text-xs text-gray-500 uppercase tracking-widest">Kepala Sekolah</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>

@include('components.news-slider-section')

@include('components.facilities-section')

@include('components.alumni-testimonials-section')

@include('components.agenda-list-section')

@endsection