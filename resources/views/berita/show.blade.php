@extends('layouts.app')

@section('title', $berita->judul . ' - SMKN 5 Samarinda')

@section('content')
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Breadcrumb -->
            <nav class="mb-8">
                <ol class="flex space-x-2 text-gray-600 dark:text-gray-400">
                    <li><a href="{{ route('home') }}" class="hover:text-blue-600 dark:hover:text-blue-400">Beranda</a></li>
                    <li>/</li>
                    <li><a href="{{ route('berita.index') }}" class="hover:text-blue-600 dark:hover:text-blue-400">Berita</a></li>
                    <li>/</li>
                    <li class="text-blue-600 dark:text-blue-400">{{ Str::limit($berita->judul, 50) }}</li>
                </ol>
            </nav>

            <!-- Article -->
            <article class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                @if($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-96 object-cover">
                @endif
                
                <div class="p-8">
                    <!-- Meta Info -->
                    <div class="flex items-center space-x-4 mb-6 text-gray-600 dark:text-gray-400">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ $berita->user->name ?? 'Admin' }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ $berita->published_at ? $berita->published_at->format('d F Y, H:i') : $berita->created_at->format('d F Y, H:i') }}</span>
                        </div>
                    </div>

                    <!-- Title -->
                    <h1 class="text-4xl font-bold mb-6 dark:text-white">{{ $berita->judul }}</h1>
                    
                    <!-- Content -->
                    <div class="prose prose-lg max-w-none dark:prose-invert">
                        {!! $berita->konten !!}
                    </div>
                </div>
            </article>

            <!-- Back Button -->
            <div class="mt-8 text-center">
                <a href="{{ route('berita.index') }}" class="inline-block bg-gray-600 dark:bg-gray-700 text-white px-8 py-3 rounded-lg hover:bg-gray-700 dark:hover:bg-gray-600 transition">
                    &larr; Kembali ke Daftar Berita
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
