@extends('layouts.app')

@section('title', 'MikroTik Academy - SMKN 5 Samarinda')

@section('content')
{{-- 1. HEADER SECTION --}}
<section class="bg-[#1e5494] text-white py-16 pb-24">
    <div class="container mx-auto px-4">
        <nav class="mb-6">
            <ol class="flex space-x-2 text-white/80 text-sm">
                <li><a href="{{ route('home') }}" class="hover:text-white">Beranda</a></li>
                <li>/</li>
                <li><a href="{{ route('jurusan.show', 'TJKT') }}" class="hover:text-white">TJKT</a></li>
                <li>/</li>
                <li class="text-white font-semibold">MikroTik Academy</li>
            </ol>
        </nav>
        <h1 class="text-4xl md:text-5xl font-bold">MikroTik Academy</h1>
        <p class="mt-4 text-lg text-white/90 max-w-2xl">Program sertifikasi industri internasional untuk siswa Teknik Jaringan Komputer dan Telekomunikasi.</p>
    </div>
</section>

{{-- 2. CONTENT SECTION --}}
<section class="relative -mt-12 mb-16">
    <div class="container mx-auto px-4">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden p-6 md:p-10 lg:p-12 border border-gray-100">
            
            <div class="flex flex-col md:flex-row gap-10 lg:gap-16 items-start">
                
                {{-- KOLOM KIRI: DESKRIPSI (TEXT) --}}
                <div class="flex-grow order-2 md:order-1">
                    
                    {{-- LOGO ACADEMY (Lebar penuh sesuai kolom deskripsi) --}}
                    <div style="margin-bottom: 2rem; width: 100%;">
                        <div style="background-color: white; border-radius: 1rem; overflow: hidden; border: 1px solid #e5e7eb; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
                            <img 
                                src="{{ asset('assets/images/logo-jurusan/mikrotik-academy.jpg') }}" 
                                alt="MikroTik Academy Banner" 
                                {{-- Lebar 100% mengikuti kontainer deskripsi --}}
                                style="width: 100%; height: auto; display: block;"
                                onerror="this.style.display='none'"
                            >
                        </div>
                    </div>

                    <h2 class="text-3xl font-bold text-slate-800 mb-8 border-l-4 border-[#1e5494] pl-4">
                        Tentang Program
                    </h2>
                    
                    <div class="prose prose-lg text-slate-700 leading-relaxed text-justify w-full max-w-none">
                        <p class="mb-6">
                            <strong>MikroTik Academy SMK Negeri 5 Samarinda</strong> adalah inisiatif pendidikan prestisius hasil kolaborasi resmi antara sekolah dengan <strong>MikroTikls, SIA (MikroTik)</strong> yang berbasis di Latvia. Program ini dirancang khusus untuk mengintegrasikan kurikulum jaringan kelas dunia ke dalam pembelajaran siswa SMK, khususnya pada kompetensi keahlian Teknik Jaringan Komputer dan Telekomunikasi (TJKT).
                        </p>

                        <p class="mb-6">
                            Melalui program ini, SMK Negeri 5 Samarinda telah tersertifikasi sebagai institusi yang berhak menyelenggarakan pelatihan dan ujian internasional <strong>MTCNA (MikroTik Certified Network Associate)</strong>. Kurikulum ini membekali siswa dengan pemahaman mendalam mengenai routing, switching, wireless, firewall, hingga manajemen bandwidth menggunakan sistem operasi <strong>RouterOS</strong>.
                        </p>

                        <p class="mb-6">
                            Proses pembelajaran dilakukan dengan metode praktis yang intensif di laboratorium jaringan. Siswa tidak hanya mempelajari konsep teoretis, tetapi langsung melakukan simulasi topologi jaringan nyata menggunakan perangkat keras routerboard asli dari MikroTik. Hal ini memastikan lulusan memiliki ketajaman analisis teknis yang siap diaplikasikan langsung di industri telekomunikasi masa kini.
                        </p>
                        
                        <div class="bg-slate-50 p-6 rounded-xl border border-slate-100 mb-8">
                            <h3 class="text-xl font-bold text-slate-800 mt-0 mb-4">Manfaat Sertifikasi Internasional</h3>
                            <ul class="list-disc pl-5 space-y-3">
                                <li><strong>Validasi Keahlian:</strong> Pengakuan resmi dari industri global atas kemampuan merancang dan mengelola jaringan berbasis MikroTik.</li>
                                <li><strong>Keunggulan Kompetitif:</strong> Memiliki nilai tawar yang jauh lebih tinggi di pasar kerja dibandingkan lulusan tanpa sertifikasi.</li>
                                <li><strong>Jaringan Global:</strong> Menjadi bagian dari komunitas profesional IT internasional dengan ID sertifikat yang dapat divalidasi secara online.</li>
                                <li><strong>Kesiapan Karir:</strong> Menjadi bekal utama untuk berkarir sebagai Network Engineer atau System Administrator.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- KOLOM KANAN: FOTO TRAINER (FIXED SIZE) --}}
                <div class="w-full md:w-[320px] flex-shrink-0 order-1 md:order-2">
                    <div class="sticky top-8">
                        {{-- Card Trainer dengan Efek Hover --}}
                        <div class="relative w-full max-w-[320px] mx-auto aspect-[4/5] bg-[#0b3fa5] group overflow-hidden rounded-2xl shadow-2xl border border-white/10">
                            
                            {{-- Image --}}
                            <img 
                                class="w-full h-full object-cover object-top" 
                                src="{{ asset('assets/images/pegawai/trainer.webp') }}" 
                                alt="Fachrul Arland Suntoro, S.Kom - MikroTik Academy Trainer"
                                onerror="this.style.display='none'; this.nextElementSibling.classList.remove('hidden');"
                            >
                            
                            {{-- Placeholder jika gambar error --}}
                            <div class="hidden absolute inset-0 flex items-center justify-center bg-gradient-to-br from-blue-900 to-blue-950">
                                <span class="text-8xl font-bold text-white/10">MT</span>
                            </div>
                            
                            {{-- Dark Overlay dengan Hover Effect --}}
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/0 transition-all duration-500"></div>
                            
                            {{-- Text Info dengan Gradient Background --}}
                            <div class="absolute bottom-0 left-0 w-full p-5 bg-gradient-to-t from-[#0f2d52] to-transparent text-center">
                                <h3 class="text-white font-bold text-lg">Fachrul Arland Suntoro, S.Kom</h3>
                                <p class="text-blue-200 text-xs uppercase font-medium mt-1 tracking-wide">Academy Trainer</p>
                            </div>
                        </div>

                        {{-- Button Link ke Official MikroTik --}}
                        <div class="mt-6">
                            <a href="https://mikrotik.com/training/academy" target="_blank" class="flex items-center justify-center gap-2 w-full py-3 px-4 bg-[#1e5494] text-white font-bold rounded-lg hover:bg-blue-800 transition shadow-lg text-sm">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>
                                Official MikroTik Academy
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<style>
    .animate-fade-in { animation: fadeIn 0.8s ease-out forwards; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    .prose p { margin-bottom: 1.5rem; }
</style>
@endsection