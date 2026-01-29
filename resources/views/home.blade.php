@extends('layouts.app')

@section('title', 'Beranda - SMKN 5 Samarinda')

@section('content')
<!-- Hero Section - Full Screen Parallax -->
<section class="relative h-screen w-full bg-fixed bg-center bg-cover bg-no-repeat -mt-20" style="background-image: url('{{ asset('images/drone-smk-2.webp') }}')">
    <!-- Gradient Overlay (Dark Bottom → Transparent Top) -->
    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/60 to-black/10"></div>
    
    <!-- Content Container -->
    <div class="relative z-10 h-full flex items-end pb-20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl">
                <!-- Headline -->
                <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight drop-shadow-lg leading-tight">
                    SMK NEGERI 5 SAMARINDA
                </h1>
                
                <!-- Subheadline -->
                <p class="mt-4 text-lg md:text-xl text-gray-200 max-w-2xl font-medium drop-shadow-md">
                    Mewujudkan Lingkungan Belajar Unggul, Hijau, dan Berkarakter dengan Fasilitas Terlengkap.
                </p>
                
                <!-- CTA Buttons -->
                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <!-- Primary Button (Green) -->
                    <a href="https://smkn5smr.sch.id/portal" target="_blank" class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-full font-bold transition shadow-lg flex items-center justify-center gap-2">
                        <span>Portal SMKN 5</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    
                    <!-- Secondary Button (Outline White) -->
                    <a href="#jurusan" class="backdrop-blur-md bg-white/10 border-2 border-white/70 text-white hover:bg-white/20 px-8 py-3 rounded-full font-bold transition flex items-center justify-center gap-2">
                        <span>Kompetensi Keahlian</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
@include('components.statistics-section')

<!-- Headmaster Welcome Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <!-- Left Column: Headmaster Photo -->
                <div class="order-2 lg:order-1 flex justify-center">
                    <div class="w-64 md:w-80 lg:w-96">
                        <!-- Main Image - No Border, No Background -->
                        <img 
                            src="{{ asset('/assets/images/pimpinan/yeni-ronalisa.png') }}" 
                            alt="Kepala Sekolah SMKN 5 Samarinda" 
                            class="w-full h-auto object-contain"
                            onerror="this.src='https://via.placeholder.com/400x450/10b981/ffffff?text=Kepala+Sekolah'"
                        >
                    </div>
                </div>
                
                <!-- Right Column: Welcome Message -->
                <div class="order-1 lg:order-2">
                    <!-- Section Title -->
                    <div class="mb-6">
                        <span class="inline-block px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-semibold mb-4">
                            <i class="fa-solid fa-user-tie mr-2"></i>Sambutan
                        </span>
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">
                            Sambutan Kepala Sekolah
                        </h2>
                        <div class="w-20 h-1 bg-gradient-to-r from-green-600 to-teal-600"></div>
                    </div>
                    
                    <!-- Headmaster Info -->
                    <div class="mb-6">
                        <h3 class="text-xl font-bold text-gray-800">Yeni Ronalisa., S.Si., M.Pd</h3>
                        <p class="text-gray-600">Kepala Sekolah SMK Negeri 5 Samarinda</p>
                    </div>
                    
                    <!-- Quote -->
                    <div class="mb-6 pl-4 border-l-4 border-green-600">
                        <p class="text-lg italic text-gray-700 leading-relaxed">
                            "Pendidikan bukan sekadar mengisi wadah, tetapi menyalakan api semangat untuk masa depan yang gemilang."
                        </p>
                    </div>
                    
                    <!-- Welcome Text -->
                    <div class="space-y-4 text-gray-700 leading-relaxed text-justify">
                        <p>
                            Selamat datang di website resmi <strong>SMK Negeri 5 Samarinda</strong>. 
                            Kami berkomitmen mencetak lulusan yang kompeten, berkarakter, dan siap bersaing di dunia industri global.
                        </p>
                        <p>
                            Dengan didukung oleh tenaga pendidik profesional, fasilitas modern, dan kemitraan dengan berbagai industri terkemuka, 
                            kami terus berinovasi dalam memberikan pendidikan kejuruan yang berkualitas dan relevan dengan kebutuhan dunia kerja.
                        </p>
                        <p>
                            Mari bersama-sama kita wujudkan generasi muda yang unggul, berakhlak mulia, dan siap berkontribusi bagi kemajuan bangsa.
                        </p>
                    </div>
                    
                    <!-- Signature (Optional) -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <p class="font-semibold text-gray-800">Yeni Ronalisa., S.Si., M.Pd</p>
                        <p class="text-sm text-gray-600">Kepala Sekolah</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>

<!-- Berita Section (Swiper Slider) -->
@include('components.news-slider-section')

<!-- Fasilitas Section (Background Slideshow with Fade) -->
@include('components.facilities-section')

<!-- Alumni Testimonials Section -->
@include('components.alumni-testimonials-section')

<!-- Agenda Sekolah Section (Scrollable List) -->
@include('components.agenda-list-section')
@endsection
