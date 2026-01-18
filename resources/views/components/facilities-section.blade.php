{{-- Facilities Section with Background Slideshow (Fade Effect) --}}
<section class="relative h-[400px] md:h-[500px] w-full overflow-hidden">
    
    {{-- Layer 1 (Bottom): Swiper Background Slideshow --}}
    <div class="absolute inset-0 z-0">
        <div class="swiper facilitiesSwiper h-full w-full">
            <div class="swiper-wrapper">
                {{-- Slide 1: Lab TJKT --}}
                <div class="swiper-slide">
                    <img 
                        src="{{ asset('assets/images/facilities/lab-tjkt.webp') }}" 
                        alt="Laboratorium TJKT" 
                        class="w-full h-full object-cover"
                    >
                </div>
                
                {{-- Slide 2: Lab PS --}}
                <div class="swiper-slide">
                    <img 
                        src="{{ asset('assets/images/facilities/lab-ps.webp') }}" 
                        alt="Laboratorium Pekerjaan Sosial" 
                        class="w-full h-full object-cover"
                    >
                </div>
                
                {{-- Slide 3: Musholla --}}
                <div class="swiper-slide">
                    <img 
                        src="{{ asset('assets/images/facilities/musholla.webp') }}" 
                        alt="Musholla" 
                        class="w-full h-full object-cover"
                    >
                </div>
                
                {{-- Slide 4: Gedung Sekolah --}}
                <div class="swiper-slide">
                    <img 
                        src="{{ asset('assets/images/facilities/gedung-sekolah.webp') }}" 
                        alt="Gedung Sekolah" 
                        class="w-full h-full object-cover"
                    >
                </div>
                
                {{-- Slide 5: Ruang Kelas --}}
                <div class="swiper-slide">
                    <img 
                        src="{{ asset('assets/images/facilities/ruang-kelas.webp') }}" 
                        alt="Ruang Kelas" 
                        class="w-full h-full object-cover"
                    >
                </div>
            </div>
        </div>
    </div>
    
    {{-- Layer 2 (Middle): Black Transparent Overlay --}}
    <div class="absolute inset-0 bg-black/60 z-10"></div>
    
    {{-- Layer 3 (Top): Content Text & Button --}}
    <div class="relative z-20 h-full flex items-center justify-center">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center text-white">
                
                {{-- Title --}}
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-6 leading-tight drop-shadow-lg">
                    Fasilitas Lengkap & Modern
                </h2>
                
                {{-- Description --}}
                <p class="text-lg md:text-xl text-gray-100 max-w-3xl mx-auto mb-8 leading-relaxed drop-shadow-md">
                    Dilengkapi dengan 4 laboratorium kejuruan, ruang kelas nyaman, musholla, dan fasilitas penunjang lainnya untuk mendukung pembelajaran siswa.
                </p>
                
                {{-- CTA Button --}}
                <a href="{{ route('facilities.index') }}" 
                   class="inline-flex items-center gap-3 px-8 py-4 bg-[#1e5494] hover:bg-[#163d6f] text-white font-bold rounded-full transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:scale-105">
                    <i class="fa-solid fa-images text-lg"></i>
                    <span>Jelajahi Fasilitas</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
                
            </div>
        </div>
    </div>
    
</section>

{{-- Swiper CSS & JS (Only load once, check if not already loaded) --}}
@push('styles')
@once('swiper-css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    /* Ensure smooth fade transition for facilities slideshow */
    .facilitiesSwiper .swiper-slide {
        opacity: 0 !important;
        transition-property: opacity;
    }
    
    .facilitiesSwiper .swiper-slide-active {
        opacity: 1 !important;
    }
    
    /* Prevent layout shift during fade */
    .facilitiesSwiper .swiper-wrapper {
        transition-timing-function: ease-in-out;
    }
</style>
@endonce
@endpush

@push('scripts')
@once('swiper-js')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
@endonce

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Facilities Background Swiper with Fade Effect
    const facilitiesSwiper = new Swiper('.facilitiesSwiper', {
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        speed: 1000,
        allowTouchMove: false,
        simulateTouch: false,
        touchRatio: 0,
        grabCursor: false,
    });
});
</script>
@endpush
