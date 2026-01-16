@extends('layouts.app')

@section('title', 'Tentang SMK Negeri 5 Samarinda')

@section('content')

{{-- Hero Section with Overlapping Card --}}
<section class="relative w-full h-[500px] mb-[200px] md:mb-[250px] z-10">
    
    {{-- 1. Background Image (Layer Paling Bawah) --}}
    <img 
        src="{{ asset('images/drone-smk-1.webp') }}" 
        alt="Pemandangan udara SMKN 5 Samarinda"
        class="absolute inset-0 w-full h-full object-cover z-0"
    >
    
    {{-- 2. Dark Overlay (Agar teks putih terbaca jelas) --}}
    <div class="absolute inset-0 bg-black/50 z-10"></div>
    
    {{-- 3. Overlapping Card (Kartu menumpuk di perbatasan foto) --}}
    <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 w-full px-4 z-20">
        <div class="relative bg-[#1e5494] text-white rounded-xl shadow-2xl max-w-4xl mx-auto p-8 md:p-10">
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

{{-- Sambutan Kepala Sekolah Section --}}
<section class="relative py-16 bg-white">
    <div class="max-w-4xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
            
            {{-- Left: Image (4 columns) --}}
            <div class="md:col-span-4 flex justify-center md:justify-start">
                <div class="w-48 h-60 overflow-hidden rounded-xl shadow-lg">
                    <img 
                        src="{{ asset('images/kepala-sekolah.webp') }}" 
                        alt="Kepala Sekolah SMKN 5 Samarinda"
                        class="w-full h-full object-cover"
                    >
                </div>
            </div>

            {{-- Right: Content (8 columns) --}}
            <div class="md:col-span-8 text-center md:text-left">
                {{-- Quote Mark --}}
                <div class="text-gray-200 text-6xl leading-none font-serif mb-3">"</div>
                
                {{-- Headline --}}
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 leading-tight">
                    Mewujudkan Generasi Unggul & Kompeten
                </h2>
                
                {{-- Body Text --}}
                <div class="space-y-3 text-gray-600 leading-relaxed text-sm mb-6 text-justify">
                    <p>
                        Selamat datang di <strong class="text-gray-900">SMK Negeri 5 Samarinda</strong>. 
                        Kami berkomitmen memberikan pendidikan kejuruan berkualitas yang mengintegrasikan kompetensi teknis dengan pembentukan karakter kuat.
                    </p>
                    <p>
                        Dengan didukung tenaga pendidik profesional, fasilitas modern, dan kemitraan strategis dengan dunia industri, kami terus berinovasi untuk menghasilkan lulusan yang kompeten dan siap bersaing global.
                    </p>
                </div>
                
                {{-- Signature Info --}}
                <div class="mt-6 pt-4 border-t border-gray-200">
                    <p class="font-bold text-gray-900 text-sm">Maryono S.Pd</p>
                    <p class="text-xs text-gray-500 uppercase tracking-wide">Kepala Sekolah</p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- Sejarah Timeline --}}
<section id="sejarah" class="relative py-24 bg-gradient-to-b from-slate-900 via-gray-900 to-black overflow-hidden">
    {{-- Optional Grid Pattern Overlay --}}
    <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,.02)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,.02)_1px,transparent_1px)] bg-[size:50px_50px] opacity-20"></div>
    
    <div class="relative container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            
            {{-- Section Header --}}
            <div class="text-center mb-20">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 tracking-tight">Transformasi SMKN 5 Samarinda</h2>
                <p class="text-slate-400 max-w-2xl mx-auto">
                    Evolusi sekolah dari masa ke masa dalam memberikan pendidikan kejuruan terbaik
                </p>
            </div>

            {{-- Timeline Container --}}
            <div class="relative mt-16">
                {{-- Center Vertical Line --}}
                <div class="hidden md:block absolute left-1/2 top-0 bottom-0 w-px bg-gradient-to-b from-blue-500/30 via-blue-500/50 to-blue-500/30 transform -translate-x-1/2"></div>

                <div class="space-y-16">
                    
                    {{-- Timeline Item 1 (Left) --}}
                    <div class="relative grid md:grid-cols-2 gap-8 items-center">
                        {{-- Left Content --}}
                        <div class="md:text-right">
                            <div class="bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-xl hover:border-blue-500/50 hover:bg-white/10 transition-all duration-300">
                                <div class="inline-block px-3 py-1 bg-blue-500 text-white text-sm font-bold rounded-lg mb-3 shadow-[0_0_15px_rgba(59,130,246,0.4)]">
                                    1987
                                </div>
                                <h3 class="text-xl font-bold text-white mb-2">Berdirinya SMK Negeri 5</h3>
                                <p class="text-slate-400 text-sm leading-relaxed">
                                    SMK Negeri 5 Samarinda didirikan sebagai lembaga pendidikan kejuruan untuk memenuhi kebutuhan tenaga terampil di Kalimantan Timur.
                                </p>
                            </div>
                        </div>
                        {{-- Center Marker --}}
                        <div class="hidden md:block absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <div class="w-4 h-4 bg-blue-500 rounded-full shadow-[0_0_20px_rgba(59,130,246,0.8)]"></div>
                        </div>
                        {{-- Right Empty --}}
                        <div></div>
                    </div>

                    {{-- Timeline Item 2 (Right) --}}
                    <div class="relative grid md:grid-cols-2 gap-8 items-center">
                        {{-- Left Empty --}}
                        <div></div>
                        {{-- Center Marker --}}
                        <div class="hidden md:block absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <div class="w-4 h-4 bg-blue-500 rounded-full shadow-[0_0_20px_rgba(59,130,246,0.8)]"></div>
                        </div>
                        {{-- Right Content --}}
                        <div>
                            <div class="bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-xl hover:border-blue-500/50 hover:bg-white/10 transition-all duration-300">
                                <div class="inline-block px-3 py-1 bg-blue-500 text-white text-sm font-bold rounded-lg mb-3 shadow-[0_0_15px_rgba(59,130,246,0.4)]">
                                    2005
                                </div>
                                <h3 class="text-xl font-bold text-white mb-2">Akreditasi A Pertama Kali</h3>
                                <p class="text-slate-400 text-sm leading-relaxed">
                                    Meraih akreditasi A untuk pertama kalinya sebagai pengakuan atas kualitas pendidikan yang diberikan.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Timeline Item 3 (Left) --}}
                    <div class="relative grid md:grid-cols-2 gap-8 items-center">
                        {{-- Left Content --}}
                        <div class="md:text-right">
                            <div class="bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-xl hover:border-blue-500/50 hover:bg-white/10 transition-all duration-300">
                                <div class="inline-block px-3 py-1 bg-blue-500 text-white text-sm font-bold rounded-lg mb-3 shadow-[0_0_15px_rgba(59,130,246,0.4)]">
                                    2015
                                </div>
                                <h3 class="text-xl font-bold text-white mb-2">Kerjasama Industri</h3>
                                <p class="text-slate-400 text-sm leading-relaxed">
                                    Membangun kemitraan strategis dengan berbagai perusahaan nasional dan internasional untuk program magang siswa.
                                </p>
                            </div>
                        </div>
                        {{-- Center Marker --}}
                        <div class="hidden md:block absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <div class="w-4 h-4 bg-blue-500 rounded-full shadow-[0_0_20px_rgba(59,130,246,0.8)]"></div>
                        </div>
                        {{-- Right Empty --}}
                        <div></div>
                    </div>

                    {{-- Timeline Item 4 (Right) --}}
                    <div class="relative grid md:grid-cols-2 gap-8 items-center">
                        {{-- Left Empty --}}
                        <div></div>
                        {{-- Center Marker --}}
                        <div class="hidden md:block absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <div class="w-4 h-4 bg-blue-500 rounded-full shadow-[0_0_20px_rgba(59,130,246,0.8)]"></div>
                        </div>
                        {{-- Right Content --}}
                        <div>
                            <div class="bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-xl hover:border-blue-500/50 hover:bg-white/10 transition-all duration-300">
                                <div class="inline-block px-3 py-1 bg-blue-500 text-white text-sm font-bold rounded-lg mb-3 shadow-[0_0_15px_rgba(59,130,246,0.4)]">
                                    2026
                                </div>
                                <h3 class="text-xl font-bold text-white mb-2">Era Digital & Smart School</h3>
                                <p class="text-slate-400 text-sm leading-relaxed">
                                    Implementasi sistem digital learning, smart classroom, dan modernisasi fasilitas untuk menghadapi Industri 4.0.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

{{-- Visi Misi (Clean White Background) --}}
<section class="bg-white py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            
            {{-- Section Header --}}
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Visi & Misi</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Landasan dan arah pengembangan SMK Negeri 5 Samarinda
                </p>
            </div>

            {{-- Grid Container --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                {{-- VISI Card --}}
                <div class="bg-[#0a61aa] p-10 rounded-2xl shadow-lg">
                    <div class="text-blue-200 text-sm font-bold tracking-widest mb-4">VISI</div>
                    <p class="text-white text-base leading-relaxed">
                        Mewujudkan SMK Negeri 5 Samarinda sebagai lembaga pendidikan kejuruan yang unggul, berwawasan lingkungan, dan berkarakter dalam menghasilkan lulusan yang kompeten dan berdaya saing global.
                    </p>
                </div>

                {{-- MISI Card --}}
                <div class="bg-[#0a61aa] p-10 rounded-2xl shadow-lg">
                    <div class="text-blue-200 text-sm font-bold tracking-widest mb-6">MISI</div>
                    
                    <ul class="space-y-4">
                        <li>
                            <span class="text-white text-base leading-relaxed">
                                Menyelenggarakan pendidikan berbasis kompetensi dan pembentukan karakter yang kuat
                            </span>
                        </li>
                        <li>
                            <span class="text-white text-base leading-relaxed">
                                Mengembangkan kemitraan strategis dengan dunia usaha dan industri
                            </span>
                        </li>
                        <li>
                            <span class="text-white text-base leading-relaxed">
                                Membangun budaya lingkungan hijau dan berkelanjutan
                            </span>
                        </li>
                        <li>
                            <span class="text-white text-base leading-relaxed">
                                Meningkatkan profesionalisme tenaga pendidik dan kependidikan
                            </span>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </div>
</section>

{{-- Leadership Team (Hierarchical Layout) --}}
<section class="py-20 bg-slate-50">
    <div class="container mx-auto px-4">
        
        {{-- Section Header --}}
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Pimpinan Sekolah</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Struktur kepemimpinan SMK Negeri 5 Samarinda
            </p>
        </div>

        {{-- Tier 1: Kepala Sekolah --}}
        <div class="flex justify-center mb-16">
            <div class="bg-white p-6 rounded-xl shadow-lg text-center w-[280px] flex flex-col items-center">
                <img 
                    class="w-full h-72 object-cover rounded-lg mb-4" 
                    src="{{ asset('images/kepsek.webp') }}" 
                    alt="Kepala Sekolah"
                    onerror="this.src='https://placehold.co/400x500/1e5494/FFFFFF?text=KEPSEK'"
                >
                <h3 class="font-bold text-slate-800 text-lg mb-1">Maryono S.Pd</h3>
                <p class="text-sm text-[#1e5494] font-semibold uppercase tracking-wide">Kepala Sekolah</p>
            </div>
        </div>

        {{-- Tier 2: 5 Wakil Kepala Sekolah --}}
        <div class="flex flex-wrap justify-center gap-6 md:gap-8 max-w-7xl mx-auto">
            
            {{-- Wakasek 1 --}}
            <div class="bg-white p-4 rounded-xl shadow-md text-center w-[220px] flex flex-col items-center">
                <img 
                    class="w-full h-56 object-cover rounded-lg mb-4" 
                    src="https://placehold.co/300x400/cbd5e1/334155?text=WAKASEK+1" 
                    alt="Wakil Kepala Sekolah"
                >
                <h3 class="font-bold text-slate-800 mb-1">Nama Wakil 1</h3>
                <p class="text-xs text-[#1e5494] font-medium">Waka. Kurikulum</p>
            </div>

            {{-- Wakasek 2 --}}
            <div class="bg-white p-4 rounded-xl shadow-md text-center w-[220px] flex flex-col items-center">
                <img 
                    class="w-full h-56 object-cover rounded-lg mb-4" 
                    src="https://placehold.co/300x400/cbd5e1/334155?text=WAKASEK+2" 
                    alt="Wakil Kepala Sekolah"
                >
                <h3 class="font-bold text-slate-800 mb-1">Nama Wakil 2</h3>
                <p class="text-xs text-[#1e5494] font-medium">Waka. Kesiswaan</p>
            </div>

            {{-- Wakasek 3 --}}
            <div class="bg-white p-4 rounded-xl shadow-md text-center w-[220px] flex flex-col items-center">
                <img 
                    class="w-full h-56 object-cover rounded-lg mb-4" 
                    src="https://placehold.co/300x400/cbd5e1/334155?text=WAKASEK+3" 
                    alt="Wakil Kepala Sekolah"
                >
                <h3 class="font-bold text-slate-800 mb-1">Nama Wakil 3</h3>
                <p class="text-xs text-[#1e5494] font-medium">Waka. Sarpras</p>
            </div>

            {{-- Wakasek 4 --}}
            <div class="bg-white p-4 rounded-xl shadow-md text-center w-[220px] flex flex-col items-center">
                <img 
                    class="w-full h-56 object-cover rounded-lg mb-4" 
                    src="https://placehold.co/300x400/cbd5e1/334155?text=WAKASEK+4" 
                    alt="Wakil Kepala Sekolah"
                >
                <h3 class="font-bold text-slate-800 mb-1">Nama Wakil 4</h3>
                <p class="text-xs text-[#1e5494] font-medium">Waka. Humas</p>
            </div>

            {{-- Wakasek 5 --}}
            <div class="bg-white p-4 rounded-xl shadow-md text-center w-[220px] flex flex-col items-center">
                <img 
                    class="w-full h-56 object-cover rounded-lg mb-4" 
                    src="https://placehold.co/300x400/cbd5e1/334155?text=WAKASEK+5" 
                    alt="Wakil Kepala Sekolah"
                >
                <h3 class="font-bold text-slate-800 mb-1">Nama Wakil 5</h3>
                <p class="text-xs text-[#1e5494] font-medium">Waka. Mutu</p>
            </div>

        </div>

    </div>
</section>

{{-- Tugas dan Fungsi Section --}}
<section class="bg-gray-50 py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
            
            {{-- Two-Tone Split Card --}}
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col lg:flex-row">
                
                {{-- Left Panel: Tugas (White Background) --}}
                <div class="w-full lg:w-1/2 p-10 md:p-16 bg-white">
                    <h2 class="text-3xl font-bold text-[#1e5494] mb-6">Tugas</h2>
                    <p class="text-slate-600 leading-relaxed text-lg">
                        Melaksanakan pendidikan kejuruan tingkat menengah untuk menghasilkan tamatan yang kompeten, berkarakter, dan siap kerja sesuai dengan kebutuhan dunia usaha dan dunia industri.
                    </p>
                </div>

                {{-- Right Panel: Fungsi (Blue Background) --}}
                <div class="w-full lg:w-1/2 p-10 md:p-16 bg-[#1e5494] text-white">
                    <h2 class="text-3xl font-bold mb-6">Fungsi</h2>
                    <ol class="space-y-3 list-decimal list-inside">
                        <li class="text-white/90 text-lg leading-relaxed">
                            Pelaksanaan pendidikan dan pelatihan berbasis kompetensi
                        </li>
                        <li class="text-white/90 text-lg leading-relaxed">
                            Pelaksanaan kemitraan dengan dunia kerja dan industri
                        </li>
                        <li class="text-white/90 text-lg leading-relaxed">
                            Pengelolaan layanan administrasi pendidikan
                        </li>
                        <li class="text-white/90 text-lg leading-relaxed">
                            Pengembangan minat dan bakat peserta didik
                        </li>
                        <li class="text-white/90 text-lg leading-relaxed">
                            Penyelenggaraan sertifikasi kompetensi profesi
                        </li>
                    </ol>
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
