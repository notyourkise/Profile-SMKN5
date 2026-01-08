@extends('layouts.app')

@section('title', 'Berita - SMKN 5 Samarinda')

@section('content')
<section class="py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-center mb-12 dark:text-white">Berita & Artikel</h1>
        
        @if(request('q'))
            <div class="text-center mb-8">
                <p class="text-gray-600 dark:text-gray-400">
                    Hasil pencarian untuk: <span class="font-semibold text-green-600">"{{ request('q') }}"</span>
                </p>
            </div>
        @endif

        @if($berita->isEmpty())
            <!-- Empty State - Custom Chibi Design -->
            <div class="flex flex-col items-center justify-center py-16">
                <!-- Cute Chibi Illustration -->
                <img 
                    src="{{ asset('images/no-search-result.webp') }}" 
                    alt="Tidak ada hasil pencarian" 
                    class="w-48 md:w-56 mb-6"
                    style="animation-duration: 2s;"
                >
                
                <!-- Empty State Message -->
                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-200 text-center">
                    @if(request('q'))
                        Yah, pencarian "{{ request('q') }}" tidak ditemukan
                    @else
                        Sepertinya belum ada berita nih...
                    @endif
                </h3>
                <p class="text-gray-500 dark:text-gray-400 mt-2 text-center max-w-md">
                    @if(request('q'))
                        Kami belum punya berita dengan kata kunci tersebut. Coba cari yang lain ya!
                    @else
                        Belum ada berita yang dipublikasikan saat ini.
                    @endif
                </p>
                
                @if(request('q'))
                    <!-- Back to All News Button -->
                    <a 
                        href="{{ route('berita.index') }}" 
                        class="mt-6 px-6 py-2.5 bg-green-600 text-white rounded-full hover:bg-green-700 transition-colors duration-300 font-medium"
                    >
                        Lihat Semua Berita
                    </a>
                @endif
            </div>
        @else
            <!-- News Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($berita as $item)
                <a href="{{ route('berita.show', $item->slug) }}" 
                   class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 cursor-pointer block">
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
                        <h2 class="text-xl font-bold mb-2 dark:text-white line-clamp-2">{{ $item->judul }}</h2>
                        <p class="text-gray-600 dark:text-gray-300 mb-4 line-clamp-3">{{ Str::limit(strip_tags($item->konten), 120) }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                                {{ $item->user->name ?? 'Admin' }}
                            </span>
                            <span class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-lg hover:from-orange-600 hover:to-orange-700 transition-all shadow-md hover:shadow-lg">
                                Baca Berita
                                <i class="fa-solid fa-arrow-right"></i>
                            </span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

        <!-- Pagination -->
        @if($berita->hasPages())
            <div class="mt-12">
                {{ $berita->links() }}
            </div>
        @endif
        @endif
    </div>
</section>
@endsection
