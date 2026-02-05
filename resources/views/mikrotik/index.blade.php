@extends('layouts.app')

@section('title', 'MikroTik Academy - SMKN 5 Samarinda')

@section('content')
{{-- HEADER SECTION --}}
<section class="bg-[#1e5494] text-white py-16 pb-24">
    <div class="container mx-auto px-4">
        <nav class="mb-6">
            <ol class="flex space-x-2 text-white/80">
                <li><a href="{{ route('home') }}" class="hover:text-white">Beranda</a></li>
                <li>/</li>
                <li><a href="{{ route('jurusan.show', 'TJKT') }}" class="hover:text-white">TJKT</a></li>
                <li>/</li>
                <li class="text-white font-semibold">MikroTik Academy</li>
            </ol>
        </nav>
        <h1 class="text-4xl md:text-5xl font-bold">MikroTik Academy</h1>
        <p class="mt-4 text-lg text-white/90">Program sertifikasi industri internasional untuk siswa Teknik Jaringan Komputer</p>
    </div>
</section>

{{-- CONTENT SECTION --}}
<section class="relative -mt-16 mb-8 md:mb-16">
    <div class="container mx-auto px-4">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden p-6 md:p-8 lg:p-12">
            
            <div class="flex flex-col md:flex-row gap-8 md:gap-12 items-start">
                
                {{-- KOLOM KIRI: FOTO PEMBINA (STYLE WAKA) --}}
                <div class="w-full md:w-[350px] flex-shrink-0 order-1 md:order-2">
                    <div class="sticky top-8">
                        {{-- Container Foto dengan Style Waka --}}
                        <div class="relative w-full aspect-[3/4] bg-[#0b3fa5] rounded-xl overflow-hidden shadow-2xl border border-white/10 group">
                            
                            {{-- Foto Trainer --}}
                            {{-- UPDATE PATH: assets/images/pegawai/mikrotik-trainer.webp --}}
                            <img 
                                src="{{ asset('assets/images/pegawai/mikrotik-trainer.webp') }}" 
                                alt="Pembina MikroTik Academy"
                                class="w-full h-full object-cover object-top"
                                onerror="this.style.display='none'; document.getElementById('ph-pembina').classList.remove('hidden');"
                            >

                            {{-- Placeholder jika foto error --}}
                            <div id="ph-pembina" class="hidden absolute inset-0 flex flex-col items-center justify-center text-white/50">
                                <svg class="w-16 h-16 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                <span class="text-sm">Foto Pembina Tidak Ditemukan</span>
                            </div>

                            {{-- Overlay Gelap (Efek Hover) --}}
                            <div class="absolute inset-0 bg-black/30 group-hover:bg-black/0 transition-all duration-500"></div>

                            {{-- Teks Overlay di Bawah (Persis Waka) --}}
                            <div class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-black/90 via-black/50 to-transparent text-center">
                                <h3 class="text-white font-bold text-xl mb-1">Fachrul Arland Suntoro, S.Kom.</h3>
                                <p class="text-blue-200 text-sm uppercase tracking-wider font-medium">Academy Trainer</p>
                            </div>
                        </div>

                        {{-- Tombol Download Silabus/Materi (Opsional) --}}
                        <div class="mt-6 space-y-3">
                            <a href="#" class="block w-full py-3 px-4 bg-slate-50 border border-slate-200 text-slate-700 font-semibold rounded-lg text-center hover:bg-slate-100 transition">
                                📄 Kurikulum MTCNA
                            </a>
                        </div>
                    </div>
                </div>

                {{-- KOLOM KANAN: DESKRIPSI (TEXT) --}}
                <div class="flex-grow order-2 md:order-1">
                    <h2 class="text-3xl font-bold text-slate-800 mb-6 border-l-4 border-[#1e5494] pl-4">
                        Tentang Program
                    </h2>
                    
                    {{-- AREA TEXT DESKRIPSI --}}
                    <div class="prose prose-lg text-slate-700 leading-relaxed text-justify w-full max-w-none">
                        <p>
                            <strong>MikroTik Academy SMK Negeri 5 Samarinda</strong> adalah program kerjasama pendidikan antara sekolah dengan MikroTik (Latvia) untuk menyelenggarakan pendidikan dan pelatihan jaringan komputer berbasis perangkat MikroTik di lingkungan sekolah.
                        </p>
                        <p>
                            [SILAKAN PASTE DESKRIPSI LENGKAP YANG SUDAH ANDA SIAPKAN DI SINI. TULIS SAJA SEPANJANG APAPUN, LAYOUT AKAN MENYESUAIKAN OTOMATIS KE BAWAH].
                        </p>
                        <p>
                            Melalui program ini, siswa TJKT akan dibekali dengan kurikulum standar industri <strong>MTCNA (MikroTik Certified Network Associate)</strong>. Siswa tidak hanya belajar teori, tetapi juga melakukan praktik konfigurasi router secara langsung menggunakan perangkat laboratorium yang memadai.
                        </p>
                        
                        <h3 class="text-xl font-bold text-slate-800 mt-8 mb-4">Keuntungan Bagi Siswa</h3>
                        <ul class="list-disc pl-5 space-y-2">
                            <li>Mendapatkan sertifikat internasional MTCNA yang diakui dunia kerja.</li>
                            <li>Memiliki kompetensi teknis yang relevan dengan kebutuhan ISP dan perusahaan IT.</li>
                            <li>Kesempatan berkarir lebih luas sebagai Network Engineer.</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection