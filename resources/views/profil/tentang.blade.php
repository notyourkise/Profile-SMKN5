@extends('layouts.app')

@section('title', 'Tentang SMK Negeri 5 Samarinda')

@section('content')

{{-- Hero Section with Overlapping Card --}}
<section class="relative w-full h-[300px] md:h-[500px] mb-[250px] md:mb-[250px] lg:mb-[200px] z-10">
    
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
        <div class="relative bg-[#1e5494] text-white rounded-xl shadow-2xl max-w-4xl mx-auto p-6 md:p-8 lg:p-10">
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
<section class="relative py-8 md:py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 md:px-6">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 md:gap-8 items-center">
            
            {{-- Left: Image (4 columns) --}}
            <div class="md:col-span-4 flex justify-center md:justify-start">
                <div class="w-48 h-64 sm:w-56 sm:h-72 md:w-72 md:h-96">
                    <img 
                        src="{{ asset('assets/images/pimpinan/yeni-ronalisa.png') }}" 
                        alt="Kepala Sekolah SMKN 5 Samarinda"
                        class="w-full h-full object-cover"
                    >
                </div>
            </div>

            {{-- Right: Content (8 columns) --}}
            <div class="md:col-span-8 text-center md:text-left">
                {{-- Quote Mark --}}
                <div class="text-blue-400 text-6xl leading-none font-serif mb-3">"</div>
                
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
                    <p class="font-bold text-gray-900 text-sm">Yeni Ronalisa., S.Si., M.Pd</p>
                    <p class="text-xs text-gray-500 uppercase tracking-wide">Kepala Sekolah</p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- Sejarah Timeline (UPDATED: Start 1992 + New 2024/2026) --}}
<section id="sejarah" class="relative py-12 md:py-24 bg-gradient-to-b from-slate-900 via-gray-900 to-black overflow-hidden">
    {{-- Optional Grid Pattern Overlay --}}
    <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,.02)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,.02)_1px,transparent_1px)] bg-[size:50px_50px] opacity-20"></div>
    
    <div class="relative container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            
            {{-- Section Header --}}
            <div class="text-center mb-20">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 tracking-tight">Transformasi SMKN 5 Samarinda</h2>
                <p class="text-slate-400 max-w-2xl mx-auto">
                    Jejak langkah pengabdian dalam mencetak generasi emas Kalimantan Timur, dari masa ke masa.
                </p>
            </div>

            {{-- Timeline Container --}}
            <div class="relative mt-16">
                {{-- Center Vertical Line --}}
                <div class="hidden md:block absolute left-1/2 top-0 bottom-0 w-px bg-gradient-to-b from-blue-500/30 via-blue-500/50 to-blue-500/30 transform -translate-x-1/2"></div>

                <div class="space-y-16">
                    
                    {{-- 1. 1992: PENEGERIAN (KIRI) --}}
                    <div class="relative grid md:grid-cols-2 gap-4 md:gap-8 items-center">
                        <div class="md:text-right">
                            <div class="bg-white/5 backdrop-blur-sm border border-white/10 p-4 md:p-6 rounded-xl hover:border-blue-500/50 hover:bg-white/10 transition-all duration-300">
                                <div class="inline-block px-3 py-1 bg-blue-500 text-white text-sm font-bold rounded-lg mb-3 shadow-[0_0_15px_rgba(59,130,246,0.4)]">
                                    1992
                                </div>
                                <h3 class="text-xl font-bold text-white mb-2">Penegerian Sekolah</h3>
                                <p class="text-slate-400 text-sm leading-relaxed">
                                    Resmi beralih status menjadi Sekolah Negeri berdasarkan SK Mendikbud No. 0216/0/1992, menjadi tonggak awal dedikasi sebagai lembaga pendidikan pemerintah.
                                </p>
                            </div>
                        </div>
                        <div class="hidden md:block absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <div class="w-4 h-4 bg-blue-500 rounded-full shadow-[0_0_20px_rgba(59,130,246,0.8)]"></div>
                        </div>
                        <div></div>
                    </div>

                    {{-- 2. 1997: IDENTITAS BARU (KANAN) --}}
                    <div class="relative grid md:grid-cols-2 gap-8 items-center">
                        <div></div>
                        <div class="hidden md:block absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <div class="w-4 h-4 bg-blue-500 rounded-full shadow-[0_0_20px_rgba(59,130,246,0.8)]"></div>
                        </div>
                        <div>
                            <div class="bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-xl hover:border-blue-500/50 hover:bg-white/10 transition-all duration-300">
                                <div class="inline-block px-3 py-1 bg-blue-500 text-white text-sm font-bold rounded-lg mb-3 shadow-[0_0_15px_rgba(59,130,246,0.4)]">
                                    1997
                                </div>
                                <h3 class="text-xl font-bold text-white mb-2">Menjadi SMKN 5 Samarinda</h3>
                                <p class="text-slate-400 text-sm leading-relaxed">
                                    Berdasarkan keputusan Depdikbud Prov. Kaltim, nama sekolah resmi ditetapkan menjadi <strong>SMK Negeri 5 Samarinda</strong>, memperluas cakupan keahlian teknologi dan manajemen.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- 3. 2016: LISENSI LSP (KIRI) --}}
                    <div class="relative grid md:grid-cols-2 gap-8 items-center">
                        <div class="md:text-right">
                            <div class="bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-xl hover:border-blue-500/50 hover:bg-white/10 transition-all duration-300">
                                <div class="inline-block px-3 py-1 bg-blue-500 text-white text-sm font-bold rounded-lg mb-3 shadow-[0_0_15px_rgba(59,130,246,0.4)]">
                                    2016
                                </div>
                                <h3 class="text-xl font-bold text-white mb-2">Lisensi LSP-P1</h3>
                                <p class="text-slate-400 text-sm leading-relaxed">
                                    Mendapatkan lisensi resmi dari BNSP sebagai Lembaga Sertifikasi Profesi (LSP-P1), menjamin setiap lulusan memiliki sertifikat kompetensi yang diakui industri.
                                </p>
                            </div>
                        </div>
                        <div class="hidden md:block absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <div class="w-4 h-4 bg-blue-500 rounded-full shadow-[0_0_20px_rgba(59,130,246,0.8)]"></div>
                        </div>
                        <div></div>
                    </div>

                    {{-- 4. 2022: PUSAT KEUNGGULAN (KANAN) --}}
                    <div class="relative grid md:grid-cols-2 gap-8 items-center">
                        <div></div>
                        <div class="hidden md:block absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <div class="w-4 h-4 bg-blue-500 rounded-full shadow-[0_0_20px_rgba(59,130,246,0.8)]"></div>
                        </div>
                        <div>
                            <div class="bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-xl hover:border-blue-500/50 hover:bg-white/10 transition-all duration-300">
                                <div class="inline-block px-3 py-1 bg-blue-500 text-white text-sm font-bold rounded-lg mb-3 shadow-[0_0_15px_rgba(59,130,246,0.4)]">
                                    2022
                                </div>
                                <h3 class="text-xl font-bold text-white mb-2">SMK Pusat Keunggulan</h3>
                                <p class="text-slate-400 text-sm leading-relaxed">
                                    Ditetapkan Kemendikbudristek sebagai <strong>SMK Pusat Keunggulan (SMK PK)</strong>, menjadi sekolah rujukan nasional dengan kurikulum berbasis industri modern.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- 5. 2024: TEFA & IKN READY (KIRI - NEW!) --}}
                    <div class="relative grid md:grid-cols-2 gap-8 items-center">
                        <div class="md:text-right">
                            <div class="bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-xl hover:border-blue-500/50 hover:bg-white/10 transition-all duration-300">
                                <div class="inline-block px-3 py-1 bg-blue-500 text-white text-sm font-bold rounded-lg mb-3 shadow-[0_0_15px_rgba(59,130,246,0.4)]">
                                    2024
                                </div>
                                <h3 class="text-xl font-bold text-white mb-2">Teaching Factory & Penyangga IKN</h3>
                                <p class="text-slate-400 text-sm leading-relaxed">
                                    Optimalisasi <strong>Teaching Factory (TeFa)</strong> dan penguatan kerjasama industri untuk mencetak SDM berkualitas tinggi yang siap menjadi penyangga Ibu Kota Nusantara (IKN).
                                </p>
                            </div>
                        </div>
                        <div class="hidden md:block absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <div class="w-4 h-4 bg-blue-500 rounded-full shadow-[0_0_20px_rgba(59,130,246,0.8)]"></div>
                        </div>
                        <div></div>
                    </div>

                    {{-- 6. 2026: DIGITAL ASEAN (KANAN - NEW!) --}}
                    <div class="relative grid md:grid-cols-2 gap-8 items-center">
                        <div></div>
                        <div class="hidden md:block absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <div class="w-4 h-4 bg-blue-500 rounded-full shadow-[0_0_20px_rgba(59,130,246,0.8)]"></div>
                        </div>
                        <div>
                            <div class="bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-xl hover:border-blue-500/50 hover:bg-white/10 transition-all duration-300">
                                <div class="inline-block px-3 py-1 bg-blue-500 text-white text-sm font-bold rounded-lg mb-3 shadow-[0_0_15px_rgba(59,130,246,0.4)]">
                                    2026
                                </div>
                                <h3 class="text-xl font-bold text-white mb-2">Menuju ASEAN Smart School</h3>
                                <p class="text-slate-400 text-sm leading-relaxed">
                                    Transformasi total menuju ekosistem pendidikan digital (AI Ready) dan perluasan jaringan kerjasama internasional di kawasan ASEAN.
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
<section class="bg-white py-10 md:py-20">
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
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                
                {{-- VISI Card --}}
                <div class="bg-[#0a61aa] p-6 md:p-10 rounded-2xl shadow-lg flex flex-col justify-center">
                    {{-- UBAH DI SINI: text-blue-200 JADI text-white --}}
                    <div class="text-white text-sm font-bold tracking-widest mb-4 border-b border-white/40 pb-2 inline-block w-fit">VISI</div>
                    <p class="text-white text-lg md:text-xl font-medium leading-relaxed">
                        "Mewujudkan SMK Negeri 5 Samarinda sebagai lembaga pendidikan kejuruan yang unggul, berwawasan lingkungan, dan berkarakter dalam menghasilkan lulusan yang kompeten dan berdaya saing global."
                    </p>
                </div>

                {{-- MISI Card --}}
                <div class="bg-[#0a61aa] p-6 md:p-10 rounded-2xl shadow-lg">
                    {{-- UBAH DI SINI: text-blue-200 JADI text-white --}}
                    <div class="text-white text-sm font-bold tracking-widest mb-6 border-b border-white/40 pb-2 inline-block w-fit">MISI</div>
                    
                    <ol class="list-decimal list-outside pl-5 space-y-4 text-white marker:text-white marker:font-bold">
                        <li class="pl-2">
                            <span class="text-white text-base leading-relaxed block">
                                Menyelenggarakan pendidikan berbasis kompetensi dan pembentukan karakter yang kuat.
                            </span>
                        </li>
                        <li class="pl-2">
                            <span class="text-white text-base leading-relaxed block">
                                Mengembangkan kemitraan strategis dengan dunia usaha dan industri (DUDI).
                            </span>
                        </li>
                        <li class="pl-2">
                            <span class="text-white text-base leading-relaxed block">
                                Membangun budaya lingkungan hijau dan berkelanjutan di lingkungan sekolah.
                            </span>
                        </li>
                        <li class="pl-2">
                            <span class="text-white text-base leading-relaxed block">
                                Meningkatkan profesionalisme tenaga pendidik dan kependidikan secara berkelanjutan.
                            </span>
                        </li>
                    </ol>
                </div>

            </div>

        </div>
    </div>
</section>

{{-- Leadership Team (Square Cards, Equal Sizes) --}}
<section class="w-full bg-slate-50 pt-16 pb-0">
    
    {{-- Section Header --}}
    <div class="text-center mb-16 px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Pimpinan Sekolah</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">
            Struktur kepemimpinan SMK Negeri 5 Samarinda
        </p>
    </div>

    {{-- Top Tier: Kepala Sekolah (Centered, Same Size as Bottom Cards) --}}
    <div class="flex justify-center w-full mb-0">
        <div class="relative w-full md:w-1/3 lg:w-[20%] aspect-square bg-amber-500 group overflow-hidden shadow-xl z-10">
            <img 
                class="w-full h-full object-cover"  
                src="{{ asset('assets/images/pimpinan/yeni-ronalisa.png') }}" 
                alt="Kepala Sekolah"
                onerror="this.src='https://placehold.co/400x400/f59e0b/FFFFFF?text=KEPALA+SEKOLAH'"
            >
            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/0 transition-all duration-500"></div>
            <div class="absolute bottom-0 left-0 w-full p-4 bg-gradient-to-t from-black/80 to-transparent text-center">
                <h3 class="text-white font-bold text-lg md:text-xl">Yeni Ronalisa., S.Si., M.Pd</h3>
                <p class="text-amber-300 text-xs md:text-sm uppercase font-bold tracking-wider">Kepala Sekolah</p>
            </div>
        </div>
    </div>

    {{-- Bottom Tier: 5 Wakil Kepala Sekolah (Full Width, Edge-to-Edge) --}}
    <div class="grid grid-cols-2 md:grid-cols-5 w-full gap-0">
        
        {{-- Wakasek 1: Kurikulum --}}
        <div class="relative w-full aspect-square bg-[#0b3fa5] group overflow-hidden border-r border-white/10">
            <img 
                class="w-full h-full object-cover" 
                src="{{ asset('assets/images/pimpinan/waka-kurikulum.webp') }}" 
                alt="Wakil Kepala Sekolah Kurikulum"
            >
            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/0 transition-all duration-500"></div>
            <div class="absolute bottom-0 left-0 w-full p-4 bg-gradient-to-t from-black/80 to-transparent text-center">
                <h3 class="text-white font-bold text-base md:text-lg">Dwi Susilowati, S.Kom</h3>
                <p class="text-blue-200 text-[10px] md:text-xs uppercase font-medium mt-1">Waka. Kurikulum</p>
            </div>
        </div>

        {{-- Wakasek 2: Sarpras --}}
        <div class="relative w-full aspect-square bg-[#0b3fa5] group overflow-hidden border-r border-white/10">
            <img 
                class="w-full h-full object-cover" 
                src="{{ asset('assets/images/pimpinan/waka-sarpras.webp') }}" 
                alt="Wakil Kepala Sekolah Sarpras"
            >
            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/0 transition-all duration-500"></div>
            <div class="absolute bottom-0 left-0 w-full p-4 bg-gradient-to-t from-[#0f2d52] to-transparent text-center">
                <h3 class="text-white font-bold text-base md:text-lg">Hari Siswanto, S.Si, M.M</h3>
                <p class="text-blue-200 text-[10px] md:text-xs uppercase font-medium mt-1">Waka. Sarpras</p>
            </div>
        </div>

        {{-- Wakasek 3: Kesiswaan --}}
        <div class="relative w-full aspect-square bg-[#0b3fa5] group overflow-hidden border-r border-white/10">
            <img 
                class="w-full h-full object-cover" 
                src="{{ asset('assets/images/pimpinan/waka-kesiswaan.webp') }}" 
                alt="Wakil Kepala Sekolah Kesiswaan"
            >
            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/0 transition-all duration-500"></div>
            <div class="absolute bottom-0 left-0 w-full p-4 bg-gradient-to-t from-[#0f2d52] to-transparent text-center">
                <h3 class="text-white font-bold text-base md:text-lg">Rismiyono, S.Pd</h3>
                <p class="text-blue-200 text-[10px] md:text-xs uppercase font-medium mt-1">Waka. Kesiswaan</p>
            </div>
        </div>

        {{-- Wakasek 4: Humas --}}
        <div class="relative w-full aspect-square bg-[#0b3fa5] group overflow-hidden border-r border-white/10">
            <img 
                class="w-full h-full object-cover" 
                src="{{ asset('assets/images/pimpinan/waka-humas.webp') }}" 
                alt="Wakil Kepala Sekolah Humas"
            >
            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/0 transition-all duration-500"></div>
            <div class="absolute bottom-0 left-0 w-full p-4 bg-gradient-to-t from-[#0f2d52] to-transparent text-center">
                <h3 class="text-white font-bold text-base md:text-lg">Husaini, S.Kom</h3>
                <p class="text-blue-200 text-[10px] md:text-xs uppercase font-medium mt-1">Waka. Humas</p>
            </div>
        </div>

        {{-- Wakasek 5: SDM --}}
        <div class="relative w-full aspect-square bg-[#0b3fa5] group overflow-hidden">
            <img 
                class="w-full h-full object-cover" 
                src="{{ asset('assets/images/pimpinan/waka-sdm.webp') }}" 
                alt="Wakil Kepala Sekolah SDM"
            >
            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/0 transition-all duration-500"></div>
            <div class="absolute bottom-0 left-0 w-full p-4 bg-gradient-to-t from-[#0f2d52] to-transparent text-center">
                <h3 class="text-white font-bold text-base md:text-lg">Dhona Puji Utami, M.Pd</h3>
                <p class="text-blue-200 text-[10px] md:text-xs uppercase font-medium mt-1">Waka. SDM</p>
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

{{-- Temukan Kami: Location & Maps --}}
<section class="relative w-full py-24 mb-32">
    
    {{-- Blue Background Block (Top 60% Only) --}}
    <div class="absolute top-0 left-0 w-full h-[60%] bg-[#1e5494] -z-10 rounded-b-[50px]"></div>
    
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            
            {{-- Section Header --}}
            <div class="text-left mb-12">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">Temukan Kami!</h2>
                <p class="text-white/90 text-lg max-w-2xl">
                    Kunjungi kampus kami dan lihat fasilitas unggulan.
                </p>
            </div>

            {{-- Content Grid: Separated Image and Map --}}
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 items-start">
                
                {{-- Left Column: Image (75% - 3 cols) --}}
                <div class="lg:col-span-3 relative h-[400px] rounded-2xl overflow-visible">
                    
                    {{-- Image Container --}}
                    <div class="w-full h-full rounded-2xl overflow-hidden shadow-2xl">
                        <img 
                            src="{{ asset('images/drone-smk-1.webp') }}" 
                            alt="SMKN 5 Samarinda Aerial View" 
                            class="w-full h-full object-cover"
                        >
                    </div>
                    
                    {{-- Floating Yellow Card (Hanging Below) --}}
                    <div class="absolute -bottom-12 left-1/2 transform -translate-x-1/2 z-20 w-[90%] md:w-[450px] bg-amber-400 p-6 rounded-xl shadow-xl text-slate-900 text-center">
                        <h3 class="font-bold text-xl mb-2">SMK Negeri 5 Samarinda</h3>
                        <p class="text-sm font-medium mb-1 leading-relaxed opacity-90">
                            Jl. Wahid Hasyim I No.75, Sempaja Selatan, Samarinda Utara, Kalimantan Timur 75119
                        </p>
                        <p class="text-sm font-semibold mb-4 opacity-90">
                            Senin - Jumat: 07.15 – 16.00 WITA
                        </p>
                        <a 
                            href="https://www.google.com/maps/dir/?api=1&destination=SMK+Negeri+5+Samarinda,+Jl.+Wahid+Hasyim+I+No.75" 
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-block bg-white text-slate-900 px-6 py-2 rounded-full font-bold text-sm hover:bg-slate-100 transition shadow-md"
                        >
                            Buka di Maps
                        </a>
                    </div>
                    
                </div>

                {{-- Right Column: Map (25% - 1 col) --}}
                <div class="lg:col-span-1 h-[300px] lg:h-[400px] bg-white rounded-2xl shadow-2xl overflow-hidden">
                    <iframe 
                        src="https://maps.google.com/maps?q=SMK+Negeri+5+Samarinda&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection