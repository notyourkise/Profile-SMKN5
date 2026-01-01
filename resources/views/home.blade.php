@extends('layouts.app')

@section('title', 'Beranda - SMKN 5 Samarinda')

@section('content')
<!-- Hero Section -->
<section class="bg-white dark:bg-gray-900 py-20 transition-colors duration-200 -mt-20 pt-32">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-5xl font-bold mb-4 text-gray-900 dark:text-white">Selamat Datang di SMKN 5 Samarinda</h1>
        <p class="text-xl mb-8 text-gray-600 dark:text-gray-300">Membangun Generasi Unggul dan Berkarakter</p>
        <a href="{{ route('jurusan.index') }}" class="inline-block bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 dark:hover:bg-green-500 transition shadow-md hover:shadow-lg">
            Lihat Jurusan
        </a>
    </div>
</section>

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
                    <a href="{{ route('jurusan.show', $item->id) }}" class="text-green-600 dark:text-green-500 font-semibold hover:text-green-700 dark:hover:text-green-400 transition">
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
