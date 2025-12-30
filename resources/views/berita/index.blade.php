@extends('layouts.app')

@section('title', 'Berita - SMKN 5 Samarinda')

@section('content')
<section class="py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-center mb-12 dark:text-white">Berita & Artikel</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($berita as $item)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                @if($item->gambar)
                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                    <svg class="w-16 h-16 text-gray-400 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                    </svg>
                </div>
                @endif
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm text-gray-500 dark:text-gray-400">
                            {{ $item->published_at ? $item->published_at->format('d M Y') : $item->created_at->format('d M Y') }}
                        </span>
                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $item->status === 'published' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300' }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </div>
                    <h2 class="text-xl font-bold mb-2 dark:text-white">{{ $item->judul }}</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">{{ Str::limit(strip_tags($item->konten), 120) }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                            {{ $item->user->name ?? 'Admin' }}
                        </span>
                        <a href="{{ route('berita.show', $item->slug) }}" class="text-blue-600 dark:text-blue-400 font-semibold hover:text-blue-800 dark:hover:text-blue-300">
                            Baca &rarr;
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-16">
                <p class="text-gray-500 dark:text-gray-400 text-xl">Belum ada berita yang dipublikasikan.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($berita->hasPages())
        <div class="mt-12">
            {{ $berita->links() }}
        </div>
        @endif
    </div>
</section>
@endsection
