{{-- Agenda SMK Section with Gradient Background --}}
<section class="relative py-20 overflow-hidden bg-gradient-to-br from-[#1e5494] via-[#2563ab] to-[#f6ad55]">
    
    {{-- Abstract Wave Decorations --}}
    <div class="absolute inset-0 opacity-10">
        <svg class="absolute bottom-0 left-0 w-full h-64" viewBox="0 0 1440 320" fill="white">
            <path d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,170.7C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
            
            {{-- Left: Swiper Slider (Calendar Cards) --}}
            <div class="w-full lg:w-1/2">
                <div class="swiper agendaSwiper max-w-md mx-auto lg:mx-0">
                    <div class="swiper-wrapper">
                        
                        @forelse($agendas ?? [] as $agenda)
                        <div class="swiper-slide">
                            {{-- Calendar-Style Card --}}
                            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-300 hover:scale-105">
                                
                                {{-- Header (Blue Background with Date) --}}
                                <div class="bg-[#1e5494] text-white text-center py-6 px-6">
                                    <div class="text-5xl font-bold mb-1">
                                        {{ \Carbon\Carbon::parse($agenda->date)->format('d') }}
                                    </div>
                                    <div class="text-lg font-semibold uppercase tracking-wide">
                                        {{ \Carbon\Carbon::parse($agenda->date)->translatedFormat('F Y') }}
                                    </div>
                                    <div class="text-sm opacity-90 mt-1">
                                        {{ \Carbon\Carbon::parse($agenda->date)->translatedFormat('l') }}
                                    </div>
                                </div>
                                
                                {{-- Body (White Background with Event Details) --}}
                                <div class="p-6 bg-white">
                                    <h3 class="text-xl font-bold text-gray-800 mb-3 leading-tight">
                                        {{ $agenda->title }}
                                    </h3>
                                    
                                    <div class="flex items-center gap-2 text-gray-600">
                                        <i class="fa-solid fa-clock text-[#1e5494]"></i>
                                        <span class="text-sm">{{ $agenda->time ?? 'Sepanjang Hari' }}</span>
                                    </div>
                                    
                                    @if($agenda->location)
                                    <div class="flex items-center gap-2 text-gray-600 mt-2">
                                        <i class="fa-solid fa-location-dot text-[#1e5494]"></i>
                                        <span class="text-sm">{{ $agenda->location }}</span>
                                    </div>
                                    @endif
                                </div>
                                
                            </div>
                        </div>
                        @empty
                        <div class="swiper-slide">
                            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden p-12 text-center">
                                <i class="fa-solid fa-calendar-xmark text-6xl text-gray-300 mb-4"></i>
                                <p class="text-gray-500 text-lg">Tidak ada agenda tersedia</p>
                            </div>
                        </div>
                        @endforelse
                        
                    </div>
                    
                    {{-- Navigation --}}
                    <div class="swiper-button-prev agenda-button-prev"></div>
                    <div class="swiper-button-next agenda-button-next"></div>
                    
                    {{-- Pagination --}}
                    <div class="swiper-pagination mt-8"></div>
                </div>
            </div>
            
            {{-- Right: Title & CTA Button --}}
            <div class="w-full lg:w-1/2 text-center lg:text-right">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 leading-tight drop-shadow-lg">
                    Agenda SMK
                </h2>
                <p class="text-white/90 text-lg mb-8 leading-relaxed">
                    Pantau kegiatan dan event penting di lingkungan SMKN 5 Samarinda
                </p>
                <a href="{{ route('agenda.index') }}" 
                   class="inline-flex items-center gap-3 px-8 py-4 bg-white/20 backdrop-blur-md border-2 border-white/50 hover:bg-white/30 text-white font-bold rounded-full transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:scale-105">
                    <span>Selengkapnya</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
            
        </div>
        
    </div>
</section>

{{-- Swiper CSS & JS (Reuse if already loaded) --}}
@push('styles')
@once('swiper-css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endonce

<style>
    /* Custom Navigation for Agenda Swiper */
    .agenda-button-prev,
    .agenda-button-next {
        width: 50px;
        height: 50px;
        background-color: white;
        border-radius: 50%;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        color: #1e5494;
        transition: all 0.3s ease;
    }
    
    .agenda-button-prev:hover,
    .agenda-button-next:hover {
        background-color: #1e5494;
        color: white;
        transform: scale(1.15);
    }
    
    .agenda-button-prev::after,
    .agenda-button-next::after {
        font-size: 18px;
        font-weight: bold;
    }
    
    /* Pagination Dots */
    .agendaSwiper .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        background-color: white;
        opacity: 0.5;
    }
    
    .agendaSwiper .swiper-pagination-bullet-active {
        opacity: 1;
        background-color: #f6ad55;
        transform: scale(1.3);
    }
</style>
@endpush

@push('scripts')
@once('swiper-js')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
@endonce

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Agenda Swiper
    const agendaSwiper = new Swiper('.agendaSwiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: {{ ($agendas ?? collect())->count() > 1 ? 'true' : 'false' }},
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        speed: 800,
        navigation: {
            nextEl: '.agenda-button-next',
            prevEl: '.agenda-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
});
</script>
@endpush
