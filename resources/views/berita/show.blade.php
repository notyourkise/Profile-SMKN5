@extends('layouts.app')

@section('title', $berita->judul . ' - SMKN 5 Samarinda')

@section('content')
<!-- Article Detail - Portal News Style -->
<section class="py-4 md:py-8 bg-gray-50">
    <div class="container mx-auto px-4 max-w-7xl">
        
        <!-- Breadcrumb -->
        <nav class="mb-4 md:mb-6">
            <ol class="flex items-center space-x-2 text-sm text-gray-500">
                <li>
                    <a href="{{ route('home') }}" class="hover:text-blue-600 transition">
                        <i class="fa-solid fa-house text-xs"></i> Home
                    </a>
                </li>
                <li><i class="fa-solid fa-chevron-right text-xs"></i></li>
                <li>
                    <a href="{{ route('berita.index') }}" class="hover:text-blue-600 transition">Berita</a>
                </li>
                <li><i class="fa-solid fa-chevron-right text-xs"></i></li>
                <li class="text-gray-700 font-medium line-clamp-1">{{ Str::limit($berita->judul, 60) }}</li>
            </ol>
        </nav>

        <!-- Main Grid Layout: 70% Content + 30% Sidebar -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-8">
            
            <!-- LEFT COLUMN: Main Content (70%) -->
            <div class="lg:col-span-2">
                <article class="bg-white rounded-xl overflow-hidden">
                    
                    <!-- Article Header -->
                    <div class="p-4 md:p-6 lg:p-8 pb-3 md:pb-4">
                        <!-- Meta Info -->
                        <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 mb-4">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-user text-blue-600"></i>
                                <span>{{ $berita->user->name ?? 'Admin SMKN 5' }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-calendar-days text-blue-600"></i>
                                <span>{{ $berita->published_at ? $berita->published_at->translatedFormat('d F Y, H:i') : $berita->created_at->translatedFormat('d F Y, H:i') }}</span>
                            </div>
                        </div>

                        <!-- Title -->
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight mb-6">
                            {{ $berita->judul }}
                        </h1>
                    </div>

                    <!-- Featured Image -->
                    @if($berita->gambar)
                    <div class="px-4 md:px-6 lg:px-8 mb-4 md:mb-6">
                        <img 
                            src="{{ asset('storage/' . $berita->gambar) }}" 
                            alt="{{ $berita->judul }}" 
                            class="w-full aspect-video object-cover rounded-xl shadow-md"
                        >
                    </div>
                    @endif
                    
                    <!-- Article Content -->
                    <div class="px-4 md:px-6 lg:px-8 pb-6 md:pb-8">
                        <div class="prose prose-base md:prose-lg max-w-none
                                    prose-headings:text-gray-900 prose-headings:font-bold
                                    prose-p:text-gray-700 prose-p:leading-relaxed prose-p:text-[1.1rem]
                                    prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline
                                    prose-strong:text-gray-900
                                    prose-ul:text-gray-700 prose-ol:text-gray-700
                                    prose-img:rounded-lg prose-img:shadow-md
                                    prose-blockquote:border-l-4 prose-blockquote:border-blue-600 prose-blockquote:bg-blue-50 prose-blockquote:py-2 prose-blockquote:px-4">
                            {!! $berita->konten !!}
                        </div>
                    </div>

                    <!-- Share & Back Button -->
                    <div class="px-4 md:px-6 lg:px-8 pb-6 md:pb-8 pt-4 md:pt-6 border-t border-gray-200">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                            <!-- Share Buttons -->
                            <div class="flex items-center gap-3 flex-wrap">
                                <span class="text-sm font-semibold text-gray-700">Bagikan:</span>
                                
                                <!-- Copy Link -->
                                <button onclick="copyToClipboard('{{ url()->current() }}')" 
                                   class="w-10 h-10 rounded-full bg-gray-600 text-white flex items-center justify-center hover:bg-gray-700 transition">
                                    <i class="fa-solid fa-link"></i>
                                </button>
                                
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                                   target="_blank"
                                   class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 transition">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                                
                                <a href="https://www.instagram.com/" 
                                   target="_blank"
                                   class="w-10 h-10 rounded-full bg-gradient-to-r from-purple-500 via-pink-500 to-orange-500 text-white flex items-center justify-center hover:opacity-90 transition">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                                
                                <a href="https://wa.me/?text={{ urlencode($berita->judul . ' - ' . url()->current()) }}" 
                                   target="_blank"
                                   class="w-10 h-10 rounded-full bg-green-600 text-white flex items-center justify-center hover:bg-green-700 transition">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </div>

                            <!-- Back Button -->
                            <a href="{{ route('berita.index') }}" 
                               class="inline-flex items-center gap-2 px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition font-medium">
                                <i class="fa-solid fa-arrow-left"></i>
                                Kembali ke Berita
                            </a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- RIGHT COLUMN: Sidebar (30%) -->
            <aside class="lg:col-span-1">
                <!-- Recent News Widget -->
                <div class="bg-white rounded-xl p-4 md:p-6 lg:sticky lg:top-24">
                    <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-4 md:mb-6 pb-2 md:pb-3 border-b-2 border-blue-600">
                        <i class="fa-solid fa-newspaper text-blue-600 mr-2"></i>
                        Berita Terbaru
                    </h3>

                    @if($recentNews->count() > 0)
                    <div class="space-y-5">
                        @foreach($recentNews as $news)
                        <a href="{{ route('berita.show', $news->slug) }}" 
                           class="flex gap-3 md:gap-4 group hover:bg-gray-50 p-2 md:p-3 rounded-lg transition">
                            <!-- Thumbnail -->
                            @if($news->gambar)
                            <div class="flex-shrink-0">
                                <img 
                                    src="{{ asset('storage/' . $news->gambar) }}" 
                                    alt="{{ $news->judul }}"
                                    class="w-16 h-16 md:w-20 md:h-20 object-cover rounded-lg shadow-sm group-hover:shadow-md transition"
                                >
                            </div>
                            @endif
                            
                            <!-- Content -->
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-gray-900 text-sm leading-tight mb-2 line-clamp-2 group-hover:text-blue-600 transition">
                                    {{ $news->judul }}
                                </h4>
                                <div class="flex items-center gap-2 text-xs text-gray-500">
                                    <i class="fa-solid fa-calendar-days"></i>
                                    <span>{{ $news->published_at ? $news->published_at->diffForHumans() : $news->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    @else
                    <p class="text-gray-500 text-sm text-center py-8">
                        <i class="fa-solid fa-inbox text-3xl mb-3 block text-gray-300"></i>
                        Belum ada berita lainnya
                    </p>
                    @endif

                    <!-- View All Button -->
                    <div class="mt-6 pt-5 border-t border-gray-200">
                        <a href="{{ route('berita.index') }}" 
                           class="block text-center py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium text-sm">
                            Lihat Semua Berita
                            <i class="fa-solid fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </aside>

        </div>
    </div>
</section>

<script>
function copyToClipboard(text) {
    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(text).then(function() {
            // Success notification
            const button = event.target.closest('button');
            const originalHTML = button.innerHTML;
            button.innerHTML = '<i class="fa-solid fa-check"></i>';
            button.classList.add('bg-green-600');
            button.classList.remove('bg-gray-600');
            
            setTimeout(function() {
                button.innerHTML = originalHTML;
                button.classList.remove('bg-green-600');
                button.classList.add('bg-gray-600');
            }, 2000);
        }).catch(function(err) {
            console.error('Failed to copy:', err);
            alert('Gagal menyalin link');
        });
    } else {
        // Fallback for older browsers
        const textArea = document.createElement('textarea');
        textArea.value = text;
        textArea.style.position = 'fixed';
        textArea.style.left = '-999999px';
        document.body.appendChild(textArea);
        textArea.select();
        try {
            document.execCommand('copy');
            alert('Link berhasil disalin!');
        } catch (err) {
            console.error('Failed to copy:', err);
            alert('Gagal menyalin link');
        }
        document.body.removeChild(textArea);
    }
}
</script>
@endsection
