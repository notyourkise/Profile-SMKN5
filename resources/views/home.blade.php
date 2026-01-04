@extends('layouts.app')

@section('title', 'Beranda - SMKN 5 Samarinda')

@section('content')
<!-- Hero Section - Full Screen Parallax -->
<section class="relative h-screen w-full bg-fixed bg-center bg-cover bg-no-repeat -mt-20" style="background-image: url('{{ asset('images/hero-drone-school.webp') }}')">
    <!-- Gradient Overlay (Dark Bottom → Transparent Top) -->
    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/60 to-black/10"></div>
    
    <!-- Content Container -->
    <div class="relative z-10 h-full flex items-end pb-20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl">
                <!-- Headline -->
                <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight drop-shadow-lg leading-tight">
                    SMK NEGERI 5 SAMARINDA
                </h1>
                
                <!-- Subheadline -->
                <p class="mt-4 text-lg md:text-xl text-gray-200 max-w-2xl font-medium drop-shadow-md">
                    Mewujudkan Lingkungan Belajar Unggul, Hijau, dan Berkarakter dengan Fasilitas Terlengkap.
                </p>
                
                <!-- CTA Buttons -->
                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <!-- Primary Button -->
                    <a href="{{ route('jurusan.index') }}" class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-full font-bold transition shadow-lg flex items-center justify-center gap-2">
                        <span>Jelajahi Jurusan</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    
                    <!-- Secondary Button (Glassmorphism) -->
                    <a href="/ppdb" class="backdrop-blur-md bg-white/10 border border-white/30 text-white hover:bg-white/20 px-8 py-3 rounded-full font-bold transition flex items-center justify-center gap-2">
                        <i class="fa-solid fa-file-lines"></i>
                        <span>Info PPDB</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
@include('components.statistics-section')

<!-- Jurusan Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12 dark:text-white">Program Keahlian</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($jurusan as $item)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->nama }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-primary/10 dark:bg-gray-700 flex items-center justify-center">
                    <span class="text-4xl text-primary dark:text-secondary">{{ $item->kode }}</span>
                </div>
                @endif
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 dark:text-white">{{ $item->nama }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">{{ Str::limit($item->deskripsi, 100) }}</p>
                    <a href="{{ route('jurusan.show', $item->kode) }}" class="text-green-600 dark:text-green-500 font-semibold hover:text-green-700 dark:hover:text-green-400 transition">
                        Selengkapnya &rarr;
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center text-gray-500 dark:text-gray-400">
                <p>Belum ada data jurusan.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Berita Section -->
<section class="py-16 bg-gray-100 dark:bg-gray-800 transition-colors duration-200">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12 dark:text-white">Berita Terbaru</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($beritaTerbaru as $berita)
            <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                @if($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                    <span class="text-gray-400 dark:text-gray-500">No Image</span>
                </div>
                @endif
                <div class="p-6">
                    <div class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                        {{ $berita->published_at ? $berita->published_at->format('d M Y') : '' }}
                    </div>
                    <h3 class="text-xl font-bold mb-2 dark:text-white">{{ $berita->judul }}</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">{{ Str::limit(strip_tags($berita->konten), 100) }}</p>
                    <a href="{{ route('berita.show', $berita->slug) }}" class="text-green-600 dark:text-green-500 font-semibold hover:text-green-700 dark:hover:text-green-400 transition">
                        Baca Selengkapnya &rarr;
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center text-gray-500 dark:text-gray-400">
                <p>Belum ada berita.</p>
            </div>
            @endforelse
        </div>
        @if($beritaTerbaru->count() > 0)
        <div class="text-center mt-8">
            <a href="{{ route('berita.index') }}" class="inline-block bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 dark:hover:bg-green-500 transition shadow-md hover:shadow-lg">
                Lihat Semua Berita
            </a>
        </div>
        @endif
    </div>
</section>
@endsection
