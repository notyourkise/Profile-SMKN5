@extends('layouts.app')

@section('title', 'Struktur Organisasi - SMK Negeri 5 Samarinda')

@section('content')

{{-- Hero Section --}}
<section class="bg-[#1e5494] py-20 text-center text-white">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Struktur Organisasi</h1>
        <p class="text-blue-100 text-lg tracking-wide">SMK Negeri 5 Samarinda</p>
    </div>
</section>

{{-- Organizational Chart Image Section --}}
<section class="py-16 bg-slate-50">
    <div class="container mx-auto px-4">
        
        {{-- Image Container --}}
        <div class="max-w-6xl mx-auto bg-white p-2 md:p-4 rounded-2xl shadow-xl border border-slate-100">
            
            <a href="{{ asset('images/struktur-organisasi-smkn5.webp') }}" target="_blank" class="block relative group cursor-zoom-in">
                <img 
                    src="{{ asset('images/struktur-organisasi-smkn5.webp') }}" 
                    alt="Struktur Organisasi SMKN 5 Samarinda" 
                    class="w-full h-auto rounded-xl hover:opacity-95 transition-opacity"
                >
                
                {{-- Zoom Hint Overlay --}}
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity bg-black/10 rounded-xl">
                    <span class="bg-white text-slate-900 px-4 py-2 rounded-full shadow-lg font-bold text-sm">🔍 Klik untuk Memperbesar</span>
                </div>
            </a>
            
        </div>

        {{-- Download Button --}}
        <div class="text-center mt-8 space-x-4">
            <a 
                href="{{ asset('images/struktur-organisasi-smkn5.webp') }}" 
                download 
                class="inline-flex items-center text-slate-600 hover:text-[#1e5494] font-medium transition"
            >
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
                Download Bagan (HD)
            </a>
        </div>

    </div>
</section>

@endsection
