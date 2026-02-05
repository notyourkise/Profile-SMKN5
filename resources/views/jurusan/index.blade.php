@extends('layouts.app')

@section('title', 'Program Keahlian - SMKN 5 Samarinda')

@section('content')
<section class="py-8 md:py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl md:text-4xl font-bold text-center mb-8 md:mb-12 dark:text-white">Program Keahlian</h1>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 md:gap-8">
            @forelse($jurusan as $item)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->nama }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-primary/10 dark:bg-gray-700 flex items-center justify-center">
                    <span class="text-6xl text-primary dark:text-secondary font-bold">{{ $item->kode }}</span>
                </div>
                @endif
                <div class="p-4 md:p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="bg-primary dark:bg-primary text-white px-2 md:px-3 py-1 rounded text-xs md:text-sm font-semibold">{{ $item->kode }}</span>
                        <span class="text-gray-600 dark:text-gray-400 text-xs md:text-sm">{{ $item->durasi_tahun }} Tahun</span>
                    </div>
                    <h2 class="text-xl md:text-2xl font-bold mb-2 md:mb-3 dark:text-white">{{ $item->nama }}</h2>
                    <p class="text-sm md:text-base text-gray-600 dark:text-gray-300 mb-3 md:mb-4">{{ Str::limit($item->deskripsi, 150) }}</p>
                    <a href="{{ route('jurusan.show', $item->kode) }}" class="inline-block bg-primary dark:bg-primary text-white px-6 py-2 rounded hover:bg-secondary dark:hover:bg-secondary transition">
                        Lihat Detail
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-16">
                <p class="text-gray-500 dark:text-gray-400 text-xl">Belum ada data program keahlian.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
