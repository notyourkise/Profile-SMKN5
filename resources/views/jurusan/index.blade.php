@extends('layouts.app')

@section('title', 'Program Keahlian - SMKN 5 Samarinda')

@section('content')
<section class="py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-center mb-12 dark:text-white">Program Keahlian</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($jurusan as $item)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->nama }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                    <span class="text-6xl text-blue-600 dark:text-blue-400 font-bold">{{ $item->kode }}</span>
                </div>
                @endif
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="bg-blue-600 dark:bg-blue-700 text-white px-3 py-1 rounded text-sm font-semibold">{{ $item->kode }}</span>
                        <span class="text-gray-600 dark:text-gray-400 text-sm">{{ $item->durasi_tahun }} Tahun</span>
                    </div>
                    <h2 class="text-2xl font-bold mb-3 dark:text-white">{{ $item->nama }}</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">{{ Str::limit($item->deskripsi, 150) }}</p>
                    <a href="{{ route('jurusan.show', $item->id) }}" class="inline-block bg-blue-600 dark:bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-700 dark:hover:bg-blue-600 transition">
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
