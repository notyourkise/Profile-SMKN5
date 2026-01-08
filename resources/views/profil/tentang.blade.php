@extends('layouts.app')

@section('title', 'Tentang SMK Negeri 5 Samarinda')

@section('content')

{{-- Hero Section with Overlapping Card --}}
<section class="relative mb-32 md:mb-40">
    {{-- Image Container --}}
    <div class="relative h-[450px] w-full bg-cover bg-center bg-no-repeat" 
         style="background-image: url('{{ asset('images/hero-drone-school.webp') }}');">
        {{-- Light Overlay (agar foto tidak terlalu silau) --}}
        <div class="absolute inset-0 bg-black/30"></div>
    </div>
    
    {{-- Overlapping Card (Kartu menumpuk di perbatasan foto) --}}
    <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 w-full px-4">
        <div class="bg-[#1e5494] text-white rounded-xl shadow-2xl max-w-4xl mx-auto p-8 md:p-10">
            {{-- Badge --}}
            <div class="mb-4">
                <span class="inline-block px-4 py-1 bg-white/20 text-white text-sm font-semibold rounded-full">
                    Profil Sekolah
                </span>
            </div>
            
            {{-- Judul Utama --}}
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6 leading-tight">
                SMK Negeri 5 Samarinda
            </h1>
            
            {{-- Deskripsi --}}
            <p class="text-base md:text-lg text-white/90 leading-relaxed mb-8">
                Lembaga pendidikan kejuruan terkemuka di Kalimantan Timur yang berkomitmen mencetak lulusan kompeten, berkarakter, dan siap menghadapi tantangan global.
            </p>
            
            {{-- Tombol --}}
            <a href="#sejarah" class="inline-flex items-center gap-2 px-6 py-3 bg-white text-[#1e5494] font-bold rounded-lg hover:bg-gray-100 transition-colors shadow-lg">
                <span>Jelajahi Lebih Lanjut</span>
                <i class="fa-solid fa-arrow-down"></i>
            </a>
        </div>
    </div>
</section>

{{-- Intro Section (Asymmetric Grid) --}}
<section class="py-20 md:py-28 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                
                {{-- Left: Sambutan Text --}}
                <div>
                    <div class="mb-6">
                        <span class="inline-block px-4 py-2 bg-[#1e5494]/10 text-[#1e5494] text-sm font-semibold rounded-full">
                            Sambutan Kepala Sekolah
                        </span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                        Membangun Generasi Unggul & Berkarakter
                    </h2>
                    <div class="space-y-4 text-gray-600 leading-relaxed text-lg">
                        <p>
                            Selamat datang di <strong class="text-gray-900">SMK Negeri 5 Samarinda</strong>. 
                            Kami berkomitmen memberikan pendidikan kejuruan berkualitas yang mengintegrasikan kompetensi teknis dengan pembentukan karakter kuat.
                        </p>
                        <p>
                            Dengan didukung oleh tenaga pendidik profesional, fasilitas modern, dan kemitraan strategis dengan dunia industri, 
                            kami terus berinovasi untuk menghasilkan lulusan yang siap bersaing di tingkat nasional maupun global.
                        </p>
                        <p class="text-[#1e5494] font-semibold italic">
                            "Pendidikan bukan sekadar mengisi wadah, tetapi menyalakan api semangat untuk masa depan gemilang."
                        </p>
                    </div>
                    <div class="mt-8 pt-8 border-t border-gray-200">
                        <div class="flex items-center gap-4">
                            <img 
                                src="{{ asset('images/kepsek.webp') }}" 
                                alt="Kepala Sekolah" 
                                class="w-16 h-16 rounded-full object-cover border-2 border-[#1e5494]"
                                onerror="this.src='https://via.placeholder.com/64/1e5494/ffffff?text=KS'"
                            >
                            <div>
                                <p class="font-bold text-gray-900">Hariyadi, S.Pd., M.Pd.</p>
                                <p class="text-sm text-gray-500">Kepala Sekolah</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right: Statistics Cards --}}
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-gradient-to-br from-[#1e5494] to-[#0f2c4a] rounded-2xl p-8 text-white shadow-xl hover:scale-105 transition-transform">
                        <div class="text-5xl font-bold mb-2">39+</div>
                        <p class="text-blue-200">Tahun Pengalaman</p>
                    </div>
                    <div class="bg-gradient-to-br from-green-600 to-green-700 rounded-2xl p-8 text-white shadow-xl hover:scale-105 transition-transform">
                        <div class="text-5xl font-bold mb-2">1500+</div>
                        <p class="text-green-200">Siswa Aktif</p>
                    </div>
                    <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl p-8 text-white shadow-xl hover:scale-105 transition-transform">
                        <div class="text-5xl font-bold mb-2">5</div>
                        <p class="text-orange-200">Kompetensi Keahlian</p>
                    </div>
                    <div class="bg-gradient-to-br from-purple-600 to-purple-700 rounded-2xl p-8 text-white shadow-xl hover:scale-105 transition-transform">
                        <div class="text-5xl font-bold mb-2">90%+</div>
                        <p class="text-purple-200">Tingkat Kelulusan</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- Sejarah Timeline --}}
<section id="sejarah" class="py-20 md:py-28 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            
            {{-- Section Header --}}
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 bg-[#1e5494]/10 text-[#1e5494] text-sm font-semibold rounded-full mb-4">
                    Perjalanan Kami
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Sejarah Singkat</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Jejak perjalanan panjang SMK Negeri 5 Samarinda dalam membangun pendidikan kejuruan berkualitas
                </p>
            </div>

            {{-- Timeline (Zig-zag Desktop, Left Mobile) --}}
            <div class="relative">
                {{-- Vertical Line (Hidden on Mobile) --}}
                <div class="hidden md:block absolute left-1/2 top-0 bottom-0 w-0.5 bg-[#1e5494]/30 transform -translate-x-1/2"></div>

                <div class="space-y-12">
                    
                    {{-- Timeline Item 1 (Right on Desktop) --}}
                    <div class="relative grid md:grid-cols-2 gap-8 items-center">
                        <div class="md:text-right"></div>
                        <div class="relative">
                            {{-- Dot --}}
                            <div class="hidden md:block absolute -left-12 top-1/2 transform -translate-y-1/2 w-6 h-6 bg-[#1e5494] rounded-full border-4 border-white shadow-lg"></div>
                            <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-200 hover:shadow-xl transition-shadow">
                                <div class="inline-block px-3 py-1 bg-[#1e5494] text-white text-sm font-bold rounded-lg mb-3">1987</div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Berdirinya SMK Negeri 5</h3>
                                <p class="text-gray-600">
                                    SMK Negeri 5 Samarinda didirikan sebagai lembaga pendidikan kejuruan untuk memenuhi kebutuhan tenaga terampil di Kalimantan Timur.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Timeline Item 2 (Left on Desktop) --}}
                    <div class="relative grid md:grid-cols-2 gap-8 items-center">
                        <div class="md:order-1 relative">
                            {{-- Dot --}}
                            <div class="hidden md:block absolute -right-12 top-1/2 transform -translate-y-1/2 w-6 h-6 bg-green-600 rounded-full border-4 border-white shadow-lg"></div>
                            <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-200 hover:shadow-xl transition-shadow">
                                <div class="inline-block px-3 py-1 bg-green-600 text-white text-sm font-bold rounded-lg mb-3">2005</div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Akreditasi A Pertama Kali</h3>
                                <p class="text-gray-600">
                                    Meraih akreditasi A untuk pertama kalinya sebagai pengakuan atas kualitas pendidikan yang diberikan.
                                </p>
                            </div>
                        </div>
                        <div class="md:order-2"></div>
                    </div>

                    {{-- Timeline Item 3 (Right on Desktop) --}}
                    <div class="relative grid md:grid-cols-2 gap-8 items-center">
                        <div class="md:text-right"></div>
                        <div class="relative">
                            {{-- Dot --}}
                            <div class="hidden md:block absolute -left-12 top-1/2 transform -translate-y-1/2 w-6 h-6 bg-orange-500 rounded-full border-4 border-white shadow-lg"></div>
                            <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-200 hover:shadow-xl transition-shadow">
                                <div class="inline-block px-3 py-1 bg-orange-500 text-white text-sm font-bold rounded-lg mb-3">2015</div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Kerjasama Industri</h3>
                                <p class="text-gray-600">
                                    Membangun kemitraan strategis dengan berbagai perusahaan nasional dan internasional untuk program magang siswa.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Timeline Item 4 (Left on Desktop) --}}
                    <div class="relative grid md:grid-cols-2 gap-8 items-center">
                        <div class="md:order-1 relative">
                            {{-- Dot --}}
                            <div class="hidden md:block absolute -right-12 top-1/2 transform -translate-y-1/2 w-6 h-6 bg-purple-600 rounded-full border-4 border-white shadow-lg"></div>
                            <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-200 hover:shadow-xl transition-shadow">
                                <div class="inline-block px-3 py-1 bg-purple-600 text-white text-sm font-bold rounded-lg mb-3">2026</div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Era Digital & Smart School</h3>
                                <p class="text-gray-600">
                                    Implementasi sistem digital learning, smart classroom, dan modernisasi fasilitas untuk menghadapi Industri 4.0.
                                </p>
                            </div>
                        </div>
                        <div class="md:order-2"></div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

{{-- Visi Misi (3 Column Grid) --}}
<section class="py-20 md:py-28 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
            
            {{-- Section Header --}}
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 bg-[#1e5494]/10 text-[#1e5494] text-sm font-semibold rounded-full mb-4">
                    Arah & Tujuan
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Visi & Misi</h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                {{-- Visi Card (Span 1 Column) --}}
                <div class="lg:col-span-1 bg-gradient-to-br from-[#1e5494] to-[#0f2c4a] rounded-2xl p-8 text-white shadow-xl hover:scale-105 transition-transform">
                    <div class="mb-6">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm mb-4">
                            <i class="fa-solid fa-eye text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold">Visi</h3>
                    </div>
                    <p class="text-blue-100 leading-relaxed">
                        Mewujudkan SMK Negeri 5 Samarinda sebagai lembaga pendidikan kejuruan yang unggul, berwawasan lingkungan, dan berkarakter dalam menghasilkan lulusan yang kompeten dan berdaya saing global.
                    </p>
                </div>

                {{-- Misi Cards (Span 2 Columns) --}}
                <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    {{-- Misi Card 1 --}}
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200 hover:shadow-xl hover:scale-105 transition-all">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-green-600 rounded-full flex items-center justify-center">
                                <i class="fa-solid fa-graduation-cap text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-2">Pendidikan Berkualitas</h4>
                                <p class="text-gray-600 text-sm">
                                    Menyelenggarakan pendidikan berbasis kompetensi dan pembentukan karakter yang kuat
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Misi Card 2 --}}
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200 hover:shadow-xl hover:scale-105 transition-all">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center">
                                <i class="fa-solid fa-handshake text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-2">Kemitraan DUDI</h4>
                                <p class="text-gray-600 text-sm">
                                    Mengembangkan kemitraan strategis dengan dunia usaha dan industri
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Misi Card 3 --}}
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200 hover:shadow-xl hover:scale-105 transition-all">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center">
                                <i class="fa-solid fa-leaf text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-2">Lingkungan Hijau</h4>
                                <p class="text-gray-600 text-sm">
                                    Membangun budaya lingkungan hijau dan berkelanjutan
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Misi Card 4 --}}
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200 hover:shadow-xl hover:scale-105 transition-all">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center">
                                <i class="fa-solid fa-chalkboard-user text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-2">SDM Profesional</h4>
                                <p class="text-gray-600 text-sm">
                                    Meningkatkan profesionalisme tenaga pendidik dan kependidikan
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>

{{-- Leadership Team (4 Column Grid) --}}
<section class="py-20 md:py-28 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            
            {{-- Section Header --}}
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 bg-[#1e5494]/10 text-[#1e5494] text-sm font-semibold rounded-full mb-4">
                    Tim Pimpinan
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Kepemimpinan Sekolah</h2>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                
                {{-- Kepala Sekolah --}}
                <div class="text-center group">
                    <div class="mb-4 relative inline-block">
                        <img 
                            src="{{ asset('images/kepsek.webp') }}" 
                            alt="Kepala Sekolah" 
                            class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-[#1e5494] shadow-lg group-hover:scale-110 transition-transform"
                            onerror="this.src='https://via.placeholder.com/128/1e5494/ffffff?text=KS'"
                        >
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2">
                            <div class="px-3 py-1 bg-[#1e5494] text-white text-xs font-bold rounded-full shadow-lg">
                                Kepala Sekolah
                            </div>
                        </div>
                    </div>
                    <h4 class="font-bold text-gray-900 mt-6">Hariyadi, S.Pd., M.Pd.</h4>
                    <p class="text-sm text-[#1e5494]">Kepala Sekolah</p>
                </div>

                {{-- Wakasek 1 --}}
                <div class="text-center group">
                    <div class="mb-4 relative inline-block">
                        <img 
                            src="https://i.pravatar.cc/128?img=12" 
                            alt="Wakil Kepala Sekolah" 
                            class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-[#1e5494] shadow-lg group-hover:scale-110 transition-transform"
                        >
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2">
                            <div class="px-3 py-1 bg-green-600 text-white text-xs font-bold rounded-full shadow-lg">
                                Wakasek
                            </div>
                        </div>
                    </div>
                    <h4 class="font-bold text-gray-900 mt-6">Nama Wakasek 1</h4>
                    <p class="text-sm text-[#1e5494]">Wakil Kurikulum</p>
                </div>

                {{-- Wakasek 2 --}}
                <div class="text-center group">
                    <div class="mb-4 relative inline-block">
                        <img 
                            src="https://i.pravatar.cc/128?img=47" 
                            alt="Wakil Kepala Sekolah" 
                            class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-[#1e5494] shadow-lg group-hover:scale-110 transition-transform"
                        >
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2">
                            <div class="px-3 py-1 bg-orange-500 text-white text-xs font-bold rounded-full shadow-lg">
                                Wakasek
                            </div>
                        </div>
                    </div>
                    <h4 class="font-bold text-gray-900 mt-6">Nama Wakasek 2</h4>
                    <p class="text-sm text-[#1e5494]">Wakil Kesiswaan</p>
                </div>

                {{-- Wakasek 3 --}}
                <div class="text-center group">
                    <div class="mb-4 relative inline-block">
                        <img 
                            src="https://i.pravatar.cc/128?img=33" 
                            alt="Wakil Kepala Sekolah" 
                            class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-[#1e5494] shadow-lg group-hover:scale-110 transition-transform"
                        >
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2">
                            <div class="px-3 py-1 bg-purple-600 text-white text-xs font-bold rounded-full shadow-lg">
                                Wakasek
                            </div>
                        </div>
                    </div>
                    <h4 class="font-bold text-gray-900 mt-6">Nama Wakasek 3</h4>
                    <p class="text-sm text-[#1e5494]">Wakil Sarpras</p>
                </div>

            </div>

        </div>
    </div>
</section>

{{-- Location Maps --}}
<section class="py-20 md:py-28 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            
            {{-- Section Header --}}
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-2 bg-[#1e5494]/10 text-[#1e5494] text-sm font-semibold rounded-full mb-4">
                    Kunjungi Kami
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Lokasi Sekolah</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Jl. Wahid Hasyim I No.75, RT.08, Sempaja Sel., Kec. Samarinda Utara, Kota Samarinda, Kalimantan Timur 75119
                </p>
            </div>

            {{-- Map Container --}}
            <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.656978!2d117.1569!3d-0.4769!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67f1e!2sSMK+Negeri+5+Samarinda!5e0!3m2!1sen!2sid!4v1234567890" 
                    width="100%" 
                    height="500" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"
                    class="w-full"
                ></iframe>
                
                {{-- Custom Info Window Overlay --}}
                <div class="absolute top-6 left-6 bg-white rounded-xl shadow-xl p-6 max-w-sm">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-[#1e5494] rounded-full flex items-center justify-center">
                            <i class="fa-solid fa-location-dot text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 mb-2">SMK Negeri 5 Samarinda</h3>
                            <p class="text-sm text-gray-600 mb-3">
                                Jl. Wahid Hasyim I No.75, Sempaja Selatan
                            </p>
                            <a 
                                href="https://maps.app.goo.gl/your-google-maps-link" 
                                target="_blank"
                                class="inline-flex items-center gap-2 text-[#1e5494] hover:text-[#0f2c4a] text-sm font-semibold"
                            >
                                <span>Buka di Google Maps</span>
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
