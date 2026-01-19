{{-- Alumni Testimonials Section with Swiper --}}
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Section Header --}}
        <div class="mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-[#1e5494] mb-3">
                Jejak Alumni SMKN 5
            </h2>
            <div class="flex gap-0 h-1">
                <div class="w-48 bg-yellow-400"></div>
                <div class="flex-1 bg-gray-300"></div>
            </div>
        </div>

        {{-- Swiper Container --}}
        <div class="relative max-w-6xl mx-auto">
            <div class="swiper alumniSwiper">
                <div class="swiper-wrapper">
                    
                    {{-- Slide 1: Alumni TJKT --}}
                    <div class="swiper-slide">
                        <div class="grid grid-cols-0 lg:grid-cols-2 gap-10 items-center">
                            {{-- Left: Photo --}}
                            <div class="flex justify-center lg:justify-end">
                                <img 
                                    src="{{ asset('assets/images/alumni/ando.jpg') }}" 
                                    alt="Muhammad Ariando F - Alumni TJKT 2023" 
                                    class="w-full max-w-md h-[414px] object-cover rounded-xl shadow-lg"
                                >
                            </div>
                            
                            {{-- Right: Testimonial --}}
                            <div class="text-center lg:text-left">
                                {{-- Quote Icon --}}
                                <i class="fa-solid fa-quote-left text-5xl text-[#1e5494] mb-6 opacity-20"></i>
                                
                                {{-- Headline --}}
                                <h3 class="text-2xl font-bold text-[#1e5494] mb-4 leading-tight">
                                    Skill Praktik di Sekolah Sangat Terpakai di Dunia Kerja
                                </h3>
                                
                                {{-- Body Testimonial --}}
                                <p class="text-gray-600 leading-relaxed mb-8 text-justify">
                                    Saat ini saya masih menempuh pendidikan perkuliahan dan bekerja secara freelance sebagai Information Technology Engineer (IT Engineer). Pengetahuan dan keterampilan yang saya peroleh selama masa pendidikan mendukung pelaksanaan pekerjaan yang saya jalani.
                                </p>
                                
                                {{-- Profile Info --}}
                                <div class="border-t-2 border-yellow-400 pt-4 inline-block">
                                    <p class="text-lg font-bold text-[#1e5494]">Muhammad Ariando F (TJKT 2023)</p>
                                    <p class="text-sm text-gray-500">IT Engineer</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Slide 2: Alumni TJKT --}}
                    <div class="swiper-slide">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                            {{-- Left: Photo --}}
                            <div class="flex justify-center lg:justify-end">
                                <img 
                                    src="{{ asset('assets/images/alumni/haikall.jpg') }}" 
                                    alt="Fikri Haikal - Alumni TJKT" 
                                    class="w-full max-w-md h-[414px] object-cover rounded-xl shadow-lg"
                                >
                            </div>
                            
                            {{-- Right: Testimonial --}}
                            <div class="text-center lg:text-left">
                                {{-- Quote Icon --}}
                                <i class="fa-solid fa-quote-left text-5xl text-[#1e5494] mb-6 opacity-20"></i>
                                
                                {{-- Headline --}}
                                <h3 class="text-2xl font-bold text-[#1e5494] mb-4 leading-tight">
                                    Belajar Teknologi Informasi dan Jaringan Langsung dari Praktisi Industri
                                </h3>
                                
                                {{-- Body Testimonial --}}
                                <p class="text-gray-600 leading-relaxed mb-8 text-justify">
                                    Saat ini saya masih menempuh pendidikan dan bekerja freelance sebagai Fullstack Web Developer dan Cybersecurity Enthusiast. Pengalaman praktik selama sekolah, seperti membangun aplikasi, mengelola database, dan memahami keamanan sistem, sangat membantu saya beradaptasi dan meningkatkan kemampuan di dunia kerja.
                                </p>
                                
                                {{-- Profile Info --}}
                                <div class="border-t-2 border-yellow-400 pt-4 inline-block">
                                    <p class="text-lg font-bold text-[#1e5494]">Fikri Haikal TJKT 2023</p>
                                    <p class="text-sm text-gray-500">Fullstack Developer & Cybersecurity Enthusiast</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Slide 3: Alumni MPLB --}}
                    <div class="swiper-slide">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                            {{-- Left: Photo --}}
                            <div class="flex justify-center lg:justify-end">
                                <img 
                                    src="https://i.pravatar.cc/400?img=33" 
                                    alt="Ahmad Rizki - Alumni MPLB" 
                                    class="w-full max-w-md h-auto rounded-xl shadow-lg"
                                >
                            </div>
                            
                            {{-- Right: Testimonial --}}
                            <div class="text-center lg:text-left">
                                {{-- Quote Icon --}}
                                <i class="fa-solid fa-quote-left text-5xl text-[#1e5494] mb-6 opacity-20"></i>
                                
                                {{-- Headline --}}
                                <h3 class="text-2xl font-bold text-[#1e5494] mb-4 leading-tight">
                                    Bekal Logistik & Supply Chain dari SMKN 5
                                </h3>
                                
                                {{-- Body Testimonial --}}
                                <p class="text-gray-600 leading-relaxed mb-8 text-justify">
                                    Saat ini saya bekerja di PT Pupuk Kaltim sebagai Logistic Coordinator. 
                                    Pembelajaran tentang manajemen pergudangan, distribusi, dan sistem inventory di sekolah 
                                    memberikan fondasi kuat untuk berkembang di industri manufaktur.
                                </p>
                                
                                {{-- Profile Info --}}
                                <div class="border-t-2 border-yellow-400 pt-4 inline-block">
                                    <p class="text-lg font-bold text-[#1e5494]">Ahmad Rizki (MPLB 2022)</p>
                                    <p class="text-sm text-gray-500">Logistic Coordinator di PT Pupuk Kaltim</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Navigation Buttons --}}
            <div class="swiper-button-prev alumni-button-prev"></div>
            <div class="swiper-button-next alumni-button-next"></div>
            
            {{-- Pagination --}}
            <div class="swiper-pagination mt-24"></div>
        </div>

    </div>
</section>

{{-- Swiper CSS & JS (Reuse existing if loaded, otherwise load) --}}
@push('styles')
@once('swiper-css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endonce

<style>
    /* Custom Navigation Button Styles */
    .alumni-button-prev,
    .alumni-button-next {
        width: 40px;
        height: 40px;
        background-color: white;
        border-radius: 50%;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        color: #1e5494;
        transition: all 0.3s ease;
    }
    
    /* Posisi button jauh di luar container */
    .alumni-button-prev {
        left: -70px;
    }
    
    .alumni-button-next {
        right: -70px;
    }
    
    /* Untuk layar sedang */
    @media (max-width: 1536px) {
        .alumni-button-prev {
            left: -50px;
        }
        
        .alumni-button-next {
            right: -50px;
        }
    }
    
    /* Untuk layar kecil, sembunyikan button */
    @media (max-width: 1024px) {
        .alumni-button-prev,
        .alumni-button-next {
            display: none;
        }
    }
    
    .alumni-button-prev:hover,
    .alumni-button-next:hover {
        background-color: #1e5494;
        color: white;
        transform: scale(1.1);
    }
    
    .alumni-button-prev::after,
    .alumni-button-next::after {
        font-size: 16px;
        font-weight: bold;
    }
    
    /* Pagination Dots */
    .alumniSwiper .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        background-color: #1e5494;
        opacity: 0.3;
    }
    
    .alumniSwiper .swiper-pagination-bullet-active {
        opacity: 1;
        background-color: #f59e0b;
    }
</style>
@endpush

@push('scripts')
@once('swiper-js')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
@endonce

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Alumni Testimonials Swiper
    const alumniSwiper = new Swiper('.alumniSwiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        speed: 800,
        navigation: {
            nextEl: '.alumni-button-next',
            prevEl: '.alumni-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
});
</script>
@endpush
