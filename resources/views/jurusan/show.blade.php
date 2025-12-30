@extends('layouts.app')

@section('title', $jurusan->nama . ' - SMKN 5 Samarinda')

@section('content')
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Breadcrumb -->
            <nav class="mb-8">
                <ol class="flex space-x-2 text-gray-600 dark:text-gray-400">
                    <li><a href="{{ route('home') }}" class="hover:text-blue-600 dark:hover:text-blue-400">Beranda</a></li>
                    <li>/</li>
                    <li><a href="{{ route('jurusan.index') }}" class="hover:text-blue-600 dark:hover:text-blue-400">Jurusan</a></li>
                    <li>/</li>
                    <li class="text-blue-600 dark:text-blue-400">{{ $jurusan->nama }}</li>
                </ol>
            </nav>

            <!-- Jurusan Header -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden mb-8">
                @if($jurusan->image)
                <img src="{{ asset('storage/' . $jurusan->image) }}" alt="{{ $jurusan->nama }}" class="w-full h-96 object-cover">
                @else
                <div class="w-full h-96 bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                    <span class="text-9xl text-blue-600 dark:text-blue-400 font-bold">{{ $jurusan->kode }}</span>
                </div>
                @endif
                
                <div class="p-8">
                    <div class="flex items-center space-x-4 mb-4">
                        <span class="bg-blue-600 dark:bg-blue-700 text-white px-4 py-2 rounded font-bold text-lg">{{ $jurusan->kode }}</span>
                        <span class="text-gray-600 dark:text-gray-400">Durasi: {{ $jurusan->durasi_tahun }} Tahun</span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $jurusan->is_active ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' }}">
                            {{ $jurusan->is_active ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </div>
                    
                    <h1 class="text-4xl font-bold mb-6 dark:text-white">{{ $jurusan->nama }}</h1>
                    
                    <div class="prose max-w-none">
                        <h2 class="text-2xl font-bold mb-4 dark:text-white">Deskripsi Program</h2>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">{{ $jurusan->deskripsi }}</p>
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div class="text-center">
                <a href="{{ route('jurusan.index') }}" class="inline-block bg-gray-600 dark:bg-gray-700 text-white px-8 py-3 rounded-lg hover:bg-gray-700 dark:hover:bg-gray-600 transition">
                    &larr; Kembali ke Daftar Jurusan
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
