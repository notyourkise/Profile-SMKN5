{{-- News Release Section with Swiper Slider --}}
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-7xl mx-auto">
        
        {{-- Section Header with Decorative Line --}}
        <div class="mb-12 relative pb-3">
            <div class="flex justify-between items-center">
                <div class="relative">
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-3">
                        Rilis Berita
                    </h2>
                    {{-- Orange Accent Line under Title --}}
                    <div class="absolute bottom-0 left-0 h-1 w-32 bg-[#f0ad4e]"></div>
                </div>
                
                {{-- Button "Berita Lainnya" --}}
                <a 
                    href="{{ route('berita.index') }}" 
                    class="inline-flex items-center gap-2 bg-[#1e5494] hover:bg-[#163d6f] text-white px-6 py-3 rounded-lg font-semibold transition shadow-md hover:shadow-lg"
                >
                    <span>Berita Lainnya</span>
                    <i class="fa-solid fa-chevron-right text-sm"></i>
                </a>
            </div>
            {{-- Gray Line across container --}}
            <div class="absolute bottom-0 left-0 right-0 h-px bg-gray-300"></div>
        </div>

        {{-- Featured News (Full Width Card with Image Background) --}}
        @if($beritaTerbaru->isNotEmpty())
        <div class="mb-12">
            <a href="{{ route('berita.show', $beritaTerbaru->first()->slug) }}" class="block group">
                <div class="relative h-[400px] lg:h-[500px] rounded-2xl overflow-hidden shadow-xl">
                    {{-- Background Image --}}
                    @if($beritaTerbaru->first()->gambar)
                    <img 
                        src="{{ asset('storage/' . $beritaTerbaru->first()->gambar) }}" 
                        alt="{{ $beritaTerbaru->first()->judul }}" 
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                    >
                    @else
                    <div class="w-full h-full bg-gradient-to-br from-blue-900 to-blue-700"></div>
                    @endif
                    
                    {{-- Dark Blue Gradient Overlay (Bottom) --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/95 via-blue-900/60 to-transparent"></div>
                    
                    {{-- Content --}}
                    <div class="absolute bottom-0 left-0 right-0 p-8 lg:p-12">
                        {{-- Badge Featured --}}
                        <div class="mb-4">
                            <span class="inline-block px-4 py-2 bg-white/20 backdrop-blur-md text-white rounded-lg text-sm font-bold border border-white/30">
                                <i class="fa-solid fa-star mr-1"></i>Featured
                            </span>
                        </div>
                        
                        {{-- Title --}}
                        <h3 class="text-3xl lg:text-5xl font-bold text-white mb-4 leading-tight max-w-4xl">
                            {{ $beritaTerbaru->first()->judul }}
                        </h3>
                        
                        {{-- Read More Link --}}
                        <div class="inline-flex items-center gap-2 text-white font-semibold text-lg group-hover:gap-3 transition-all">
                            <span>Mulai Baca</span>
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endif

        {{-- News Slider Section --}}
        <div class="relative">
            {{-- Swiper Container --}}
            <div class="swiper newsSwiper">
                <div class="swiper-wrapper pb-12">
                    @forelse($beritaTerbaru->skip(1)->take(6) as $berita)
                    <div class="swiper-slide">
                        <a href="{{ route('berita.show', $berita->slug) }}" class="block group">
                            <div class="bg-white overflow-hidden h-full flex flex-col">
                                {{-- Thumbnail with Badge --}}
                                <div class="relative h-56 overflow-hidden rounded-2xl mb-4">
                                    @if($berita->gambar)
                                    <img 
                                        src="{{ asset('storage/' . $berita->gambar) }}" 
                                        alt="{{ $berita->judul }}" 
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    >
                                    @else
                                    <div class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                        <i class="fa-solid fa-image text-4xl text-gray-300"></i>
                                    </div>
                                    @endif
                                    
                                    {{-- Badge "Berita" --}}
                                    <div class="absolute top-4 left-4">
                                        <span class="inline-block px-3 py-1 bg-white text-gray-800 rounded-md text-xs font-bold shadow-md">
                                            Berita
                                        </span>
                                    </div>
                                </div>

                                {{-- Content --}}
                                <div class="flex-1 flex flex-col">
                                    {{-- Title (Max 2 Lines) --}}
                                    <h4 class="text-xl font-bold text-gray-900 mb-3 leading-tight line-clamp-2 group-hover:text-[#1e5494] transition-colors">
                                        {{ $berita->judul }}
                                    </h4>

                                    {{-- Date --}}
                                    <div class="flex items-center gap-2 text-sm text-gray-500 mt-auto">
                                        <i class="fa-solid fa-calendar-days"></i>
                                        <span>{{ $berita->published_at ? $berita->published_at->format('d M Y') : 'Baru' }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @empty
                    <div class="swiper-slide">
                        <div class="bg-white rounded-xl shadow-md p-12 text-center">
                            <i class="fa-solid fa-newspaper text-4xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500">Belum ada berita lainnya</p>
                        </div>
                    </div>
                    @endforelse
                </div>
                
                {{-- Swiper Scrollbar --}}
                <div class="swiper-scrollbar"></div>
            </div>
        </div>

        </div>
    </div>
</section>

{{-- Swiper CSS CDN --}}
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    /* Custom Swiper Styles */
    .newsSwiper {
        padding: 0 5px 5px 5px;
    }
    
    .newsSwiper .swiper-slide {
        height: auto;
    }

    /* Grab Cursor for Better UX */
    .newsSwiper .swiper-wrapper {
        cursor: grab;
    }

    .newsSwiper .swiper-wrapper:active {
        cursor: grabbing;
    }

    /* Line Clamp Utility */
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Custom Scrollbar Styling */
    .newsSwiper .swiper-scrollbar {
        background: #e5e7eb;
        height: 4px;
        border-radius: 2px;
    }

    .newsSwiper .swiper-scrollbar-drag {
        background: #1e5494;
        border-radius: 2px;
    }
</style>
@endpush

{{-- Swiper JS CDN & Initialization --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const newsSwiper = new Swiper('.newsSwiper', {
            // Slides Configuration
            slidesPerView: 1,
            spaceBetween: 20,
            loop: false,
            rewind: false,
            centeredSlides: false,
            
            // Touch & Mouse Interaction
            grabCursor: true,
            touchEventsTarget: 'container',
            allowTouchMove: true,
            simulateTouch: true,
            touchRatio: 1,
            touchAngle: 45,
            longSwipes: true,
            longSwipesRatio: 0.5,
            longSwipesMs: 300,
            
            // Scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
                draggable: true,
                dragSize: 100,
            },
            
            // Responsive Breakpoints
            breakpoints: {
                // Mobile
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                // Tablet & Desktop
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            },

            // Effects
            speed: 800,
            
            // Mouse wheel (optional, untuk scroll dengan mouse wheel)
            mousewheel: {
                forceToAxis: true,
                sensitivity: 1,
                releaseOnEdges: true,
            },
        });
    });
</script>
@endpush
