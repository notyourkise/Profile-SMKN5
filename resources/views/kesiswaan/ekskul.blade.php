@extends('layouts.app')

@section('title', 'Ekstrakurikuler - SMKN 5 Samarinda')

@section('content')
<section class="bg-[#1e5494] text-white py-16 pb-24">
    <div class="container mx-auto px-4">
        <nav class="mb-6">
            <ol class="flex space-x-2 text-white/80">
                <li><a href="{{ route('home') }}" class="hover:text-white">Beranda</a></li>
                <li>/</li>
                <li class="text-white font-semibold">Kesiswaan</li>
            </ol>
        </nav>
        <h1 class="text-4xl md:text-5xl font-bold">Ekstrakurikuler</h1>
        <p class="mt-4 text-lg text-white/90">Wadah pengembangan bakat, minat, dan karakter siswa SMK Negeri 5 Samarinda</p>
    </div>
</section>

<section class="relative -mt-16 mb-12">
    <div class="container mx-auto px-4 flex justify-center">
        <div class="bg-white/90 backdrop-blur-lg rounded-2xl shadow-2xl p-4 md:p-6 flex flex-wrap gap-3 justify-center items-center border border-gray-100">
            @foreach($allEkskul as $item)
            <button 
                onclick="switchEkskul('{{ $item->kode }}')"
                id="btn-{{ $item->kode }}"
                class="px-6 py-2 md:px-8 md:py-3 rounded-full font-semibold transition-all duration-300 text-sm md:text-base shadow-sm hover:shadow-md {{ $loop->first ? 'bg-[#1e5494] text-white scale-105 shadow-lg' : 'bg-gray-50 text-slate-700 hover:bg-gray-100' }}"
            >
                {{ $item->kode }}
            </button>
            @endforeach
        </div>
    </div>
</section>

<section class="py-12 bg-white min-h-[500px]">
    <div class="container mx-auto px-4">
        @foreach($allEkskul as $item)
        {{-- Container Utama Konten --}}
        <div id="content-{{ $item->kode }}" class="{{ $loop->first ? '' : 'hidden' }} transition-all duration-500 ease-in-out">
            
            {{-- ... kode sebelumnya ... --}}

{{-- GRID LAYOUT: Kiri Foto, Kanan Teks --}}
<div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
    
    {{-- KOLOM KIRI: Foto Pembina & Info --}}
    <div class="lg:col-span-4 lg:sticky lg:top-24">
        
        {{-- Container pembatas ukuran (agar tidak terlalu besar di layar lebar) --}}
        <div class="w-full max-w-[350px] mx-auto lg:mx-0 shadow-2xl rounded-xl overflow-hidden">

            {{-- === KARTU GAYA BARU (Sesuai Request Boss) === --}}
            {{-- Menggunakan aspect-square (kotak 1:1) dan style pimpinan --}}
            <div class="relative w-full aspect-square bg-[#0b3fa5] group overflow-hidden">
                
                {{-- 1. LAYER FOTO / PLACEHOLDER --}}
                {{-- Karena belum ada foto asli, kita pakai placeholder gradient biru yang senada, --}}
                {{-- tapi dengan inisial besar di belakangnya agar tidak kosong melompong. --}}
                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[#1e5494] to-[#0b3fa5]">
                     {{-- Jika nanti sudah ada foto asli, hapus <span> ini dan uncomment <img> di bawah --}}
                    <span class="text-9xl font-bold text-white/10 select-none">{{ substr($item->kode, 0, 1) }}</span>
                    
                    {{-- <img class="w-full h-full object-cover absolute inset-0" src="{{ asset('path/to/foto.jpg') }}" alt="..."> --}}
                </div>

                {{-- 2. LAYER EFEK HOVER (Gelap jadi Terang) --}}
                {{-- Ini kuncinya: hitam transparan yang hilang saat di-hover --}}
                <div class="absolute inset-0 bg-black/40 group-hover:bg-black/0 transition-all duration-500"></div>

                {{-- 3. LAYER TEKS DI BAWAH --}}
                <div class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-black/90 via-black/50 to-transparent text-center">
                    {{-- Nama Pembina --}}
                    <h3 class="text-white font-bold text-xl md:text-2xl mb-1">{{ $item->pembina_nama }}</h3>
                    {{-- Jabatan --}}
                    <p class="text-blue-200 text-sm md:text-base uppercase font-medium tracking-wider">
                        Pembina {{ $item->nama }}
                    </p>
                </div>
            </div>
            {{-- === END KARTU GAYA BARU === --}}

        </div>
    </div>      
                {{-- KOLOM KANAN: Deskripsi Teks --}}
                <div class="lg:col-span-8">
                    {{-- Judul Ekskul --}}
                    <h2 class="text-4xl md:text-5xl font-bold text-slate-800 mb-6 decoration-[#9ac236]/30 underline underline-offset-8">
                        {{ $item->nama }}
                    </h2>
                    
                    {{-- Deskripsi --}}
                    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed mb-8 text-justify">
                        <p>{{ $item->deskripsi }}</p>
                        <p>Bergabunglah dengan {{ $item->nama }} untuk mengembangkan potensi diri Anda. Kegiatan dilaksanakan secara rutin di lingkungan SMKN 5 Samarinda dengan bimbingan pelatih profesional.</p>
                    </div>
                </div>

            </div> {{-- End Grid --}}
        </div>
        @endforeach
    </div>
</section>

<script>
function switchEkskul(kode) {
    const allButtons = document.querySelectorAll('[id^="btn-"]');
    const allContents = document.querySelectorAll('[id^="content-"]');
    
    // Hide all contents
    allContents.forEach(el => {
        el.classList.add('hidden', 'opacity-0');
        el.classList.remove('opacity-100');
    });
    
    // Show selected content with fade effect
    const selectedContent = document.getElementById(`content-${kode}`);
    if (selectedContent) {
        selectedContent.classList.remove('hidden');
        setTimeout(() => {
             selectedContent.classList.remove('opacity-0');
             selectedContent.classList.add('opacity-100');
        }, 50); // Give browser a moment to render hidden removal
    }
    
    // Update button styles
    allButtons.forEach(btn => {
        const btnKode = btn.id.replace('btn-', '');
        if (btnKode === kode) {
            btn.classList.remove('bg-gray-50', 'text-slate-700', 'hover:bg-gray-100');
            btn.classList.add('bg-[#1e5494]', 'text-white', 'scale-105', 'shadow-lg');
        } else {
            btn.classList.remove('bg-[#1e5494]', 'text-white', 'scale-105', 'shadow-lg');
            btn.classList.add('bg-gray-50', 'text-slate-700', 'hover:bg-gray-100');
        }
    });

    // Optional: Scroll sedikit ke atas agar pas di konten
    const contentArea = document.querySelector('.relative.-mt-16');
    if (contentArea) {
        contentArea.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}
</script>
@endsection