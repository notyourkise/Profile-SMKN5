@extends('layouts.app')

@section('title', 'Ekstrakurikuler - SMKN 5 Samarinda')

@section('content')

{{-- 
    STYLE MANUAL (FIX LAYOUT MOBILE) 
    Ini memaksa layout menjadi 'Column' di HP dan 'Row' di Laptop
    tanpa tergantung build Tailwind server yang error.
--}}
<style>
    /* Wrapper Utama */
    .ekskul-layout-fix {
        display: flex;
        flex-direction: column; /* Default HP: Atas-Bawah */
        gap: 2.5rem; /* Jarak antar elemen */
        width: 100%;
    }

    /* Kolom Kiri (Deskripsi) */
    .ekskul-col-desc {
        width: 100%;
    }

    /* Kolom Kanan (Pembina) */
    .ekskul-col-card {
        width: 100%;
        flex-shrink: 0;
    }

    /* Media Query untuk Tablet/Laptop (Layar > 768px) */
    @media (min-width: 768px) {
        .ekskul-layout-fix {
            flex-direction: row; /* Ubah jadi Samping-Sampingan */
            align-items: flex-start;
        }
        .ekskul-col-desc {
            width: 66.666667%; /* Lebar 2/3 */
        }
        .ekskul-col-card {
            width: 33.333333%; /* Lebar 1/3 */
            position: sticky;
            top: 2rem;
        }
    }
</style>

{{-- HEADER SECTION --}}
<section class="bg-[#1e5494] text-white py-16 pb-24">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-bold">Ekstrakurikuler</h1>
        <p class="mt-4 text-base md:text-lg text-white/90">Wadah pengembangan bakat, minat, dan karakter siswa</p>
    </div>
</section>

{{-- NAVIGATION & CONTENT SECTION --}}
<section class="relative -mt-12 mb-20">
    <div class="container mx-auto px-4">
        
        {{-- MENU TABS (Scrollable Fix) --}}
        {{-- Kita tambah style="overflow-x: auto" manual biar server nurut --}}
        <div class="bg-white rounded-xl shadow-lg p-2 mb-10" style="overflow-x: auto; white-space: nowrap;">
            <div class="flex flex-nowrap md:flex-wrap justify-start md:justify-center gap-2 min-w-max md:min-w-0">
                @php
                    $menus = [
                        'osis' => 'OSIS',
                        'pramuka' => 'Pramuka',
                        'paskas' => 'Paskas',
                        'basket' => 'Basket',
                        'futsal' => 'Futsal',
                        'voli' => 'Voli',
                        'badminton' => 'Badminton',
                        'tari' => 'Seni Tari',
                        'teater' => 'Teater',
                        'band' => 'Band Musik',
                        'alam' => 'Sahabat Alam',
                        'pmr' => 'PMR',
                        'rohis' => 'Rohis'
                    ];
                @endphp

                @foreach($menus as $key => $label)
                <button onclick="switchEkskul('{{ $key }}')" id="btn-{{ $key }}" 
                    class="px-5 py-2.5 rounded-lg font-semibold text-sm transition-all duration-300 border border-transparent inline-block
                    {{ $key === 'osis' ? 'bg-[#1e5494] text-white shadow-md' : 'text-slate-600 hover:bg-gray-100' }}">
                    {{ $label }}
                </button>
                @endforeach
            </div>
        </div>

        {{-- CONTENT AREA --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 md:p-10 min-h-[400px]">
            
            @php
                // Master Data Ekskul
                $dataEkskul = [
                    'osis' => [
                        'judul' => 'Organisasi Siswa Intra Sekolah (OSIS)',
                        'deskripsi' => 'OSIS adalah organisasi induk tingkat sekolah yang menjadi wadah aspirasi siswa. Di SMKN 5 Samarinda, OSIS berperan aktif dalam menyelenggarakan berbagai kegiatan sekolah, mulai dari Class Meeting, Peringatan Hari Besar, hingga kegiatan sosial. Anggota OSIS dilatih untuk memiliki jiwa kepemimpinan (leadership), manajemen organisasi, dan kemampuan komunikasi publik yang baik.',
                        'pembina' => 'Jiono, S.Pd',
                        'jadwal' => 'Jumat, 14.00 WITA'
                    ],
                    'pramuka' => [
                        'judul' => 'Praja Muda Karana (Pramuka)',
                        'deskripsi' => 'Ekstrakurikuler wajib yang membentuk karakter disiplin, mandiri, dan cinta tanah air. Kegiatan Pramuka di SMKN 5 Samarinda mencakup latihan baris-berbaris, pionering, survival, hingga perkemahan. Pramuka menjadi garda terdepan dalam pembentukan moral dan etika siswa.',
                        'pembina' => '...',
                        'jadwal' => 'Jumat, 15.30 WITA'
                    ],
                    'paskas' => [
                        'judul' => 'Pasukan Pengibar Bendera Sekolah (Paskas)',
                        'deskripsi' => 'Wadah bagi siswa yang memiliki ketertarikan dalam tata upacara bendera dan kedisiplinan tinggi. Anggota Paskas dilatih fisik, mental, dan teknik baris-berbaris (PBB) yang presisi untuk bertugas pada upacara bendera setiap hari Senin dan hari besar nasional.',
                        'pembina' => '...',
                        'jadwal' => 'Selasa & Kamis, 16.00 WITA'
                    ],
                    'basket' => [
                        'judul' => 'Bola Basket',
                        'deskripsi' => 'Klub Basket SMKN 5 Samarinda fokus pada pengembangan teknik dasar (dribbling, shooting, passing) hingga strategi permainan tim. Selain latihan rutin, tim basket aktif mengikuti kompetisi DBL dan turnamen antar pelajar se-Kalimantan Timur untuk mengasah mental bertanding.',
                        'pembina' => 'Ibnu Luthfi Syaari, S.Pd',
                        'jadwal' => 'Rabu & Sabtu, 16.00 WITA'
                    ],
                    'futsal' => [
                        'judul' => 'Futsal',
                        'deskripsi' => 'Salah satu ekskul paling populer yang mengutamakan kerjasama tim, kecepatan, dan taktik. Latihan mencakup peningkatan stamina fisik, teknik penguasaan bola, dan skema permainan. Tim Futsal SMKN 5 rutin melakukan sparing partner dengan sekolah lain.',
                        'pembina' => '...',
                        'jadwal' => 'Senin & Kamis, 16.00 WITA'
                    ],
                    'voli' => [
                        'judul' => 'Bola Voli',
                        'deskripsi' => 'Mewadahi siswa yang hobi bermain voli untuk mengembangkan potensi atletik mereka. Latihan difokuskan pada teknik service, passing, smash, dan blocking, serta kekompakan tim di lapangan.',
                        'pembina' => '...',
                        'jadwal' => 'Selasa & Jumat, 16.00 WITA'
                    ],
                    'badminton' => [
                        'judul' => 'Badminton (Bulu Tangkis)',
                        'deskripsi' => 'Ekstrakurikuler yang melatih kelincahan, refleks, dan teknik pukulan. Terbuka bagi siswa putra dan putri, baik untuk sekadar hobi maupun prestasi di ajang O2SN.',
                        'pembina' => '...',
                        'jadwal' => 'Sabtu, 08.00 WITA'
                    ],
                    'tari' => [
                        'judul' => 'Seni Tari Tradisional & Modern',
                        'deskripsi' => 'Sanggar tari sekolah yang melestarikan budaya daerah melalui tari tradisional Dayak dan Kutai, serta mengeksplorasi kreativitas melalui tari kreasi modern. Tim tari sering tampil mengisi acara resmi sekolah dan undangan eksternal.',
                        'pembina' => '...',
                        'jadwal' => 'Rabu, 14.00 WITA'
                    ],
                    'teater' => [
                        'judul' => 'Seni Teater',
                        'deskripsi' => 'Mengasah kemampuan olah vokal, olah rasa, dan olah tubuh. Siswa belajar seni peran, penulisan naskah, hingga manajemen panggung. Teater menjadi sarana ekspresi diri yang positif bagi siswa.',
                        'pembina' => '...',
                        'jadwal' => 'Kamis, 15.00 WITA'
                    ],
                    'band' => [
                        'judul' => 'Band & Seni Musik',
                        'deskripsi' => 'Komunitas musisi sekolah yang terdiri dari vokalis, gitaris, bassist, drummer, dan keyboardist. Kegiatan meliputi latihan aransemen lagu, jamming session, dan persiapan tampil di pensi atau festival musik.',
                        'pembina' => '...',
                        'jadwal' => 'Sabtu, 10.00 WITA'
                    ],
                    'alam' => [
                        'judul' => 'Sahabat Alam (Pecinta Alam)',
                        'deskripsi' => 'Kelompok siswa peduli lingkungan yang kegiatannya meliputi pelestarian alam, daur ulang sampah, penghijauan sekolah (Green School), serta kegiatan outdoor seperti hiking dan observasi alam. Membentuk karakter yang menghargai semesta.',
                        'pembina' => 'Riza Fahlevi, S.Pd.I',
                        'jadwal' => 'Minggu (Tentative)'
                    ],
                    'pmr' => [
                        'judul' => 'Palang Merah Remaja (PMR)',
                        'deskripsi' => 'Membekali siswa dengan kemampuan Pertolongan Pertama (PP), kesiapsiagaan bencana, dan kepedulian sosial. Anggota PMR bertugas sebagai tim kesehatan saat upacara dan event sekolah.',
                        'pembina' => '...',
                        'jadwal' => 'Jumat, 14.00 WITA'
                    ],
                    'rohis' => [
                        'judul' => 'Kerohanian Islam (Rohis)',
                        'deskripsi' => 'Wadah kajian Islam, tahsin Al-Quran, dan kegiatan keagamaan lainnya untuk membentuk pribadi siswa yang beriman, bertakwa, dan berakhlak mulia.',
                        'pembina' => '...',
                        'jadwal' => 'Jumat, 11.30 WITA'
                    ]
                ];
            @endphp

            @foreach($dataEkskul as $key => $data)
            <div id="content-{{ $key }}" class="ekskul-content {{ $key === 'osis' ? '' : 'hidden' }} animate-fade-in">
                
                {{-- MENGGUNAKAN CLASS FIX LAYOUT DISINI --}}
                <div class="ekskul-layout-fix">
                    
                    {{-- KOLOM KIRI: Deskripsi --}}
                    <div class="ekskul-col-desc">
                        <div class="mb-6 pb-4 border-b border-gray-100">
                            <h2 class="text-2xl md:text-3xl font-bold text-slate-800 leading-tight">{{ $data['judul'] }}</h2>
                        </div>
                        
                        <div class="prose prose-lg text-slate-600 leading-relaxed text-justify mb-8 text-sm md:text-base">
                            <p>{{ $data['deskripsi'] }}</p>
                        </div>

                        {{-- Box Jadwal Latihan --}}
                        <div class="bg-blue-50 border-l-4 border-[#1e5494] p-4 rounded-r-lg inline-flex items-center gap-3 w-full md:w-auto">
                            <div class="bg-white p-2 rounded-full shadow-sm text-[#1e5494] shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-blue-800 uppercase tracking-wider">Jadwal Latihan</h4>
                                <p class="text-sm font-medium text-blue-900">{{ $data['jadwal'] }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- KOLOM KANAN: Card Pembina Simple --}}
                    <div class="ekskul-col-card">
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                            {{-- Header Card --}}
                            <div class="bg-gradient-to-r from-slate-800 to-slate-900 px-6 py-4">
                                <h3 class="text-white font-bold text-lg flex items-center gap-2">
                                    <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    Pembina
                                </h3>
                            </div>
                            
                            {{-- Body Card --}}
                            <div class="p-6 text-center">
                                <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl shadow-inner border border-slate-200">
                                    {{-- Avatar Inisial --}}
                                    <span class="font-bold text-slate-400 select-none">
                                        {{ substr($data['pembina'], 0, 1) }}
                                    </span>
                                </div>
                                
                                <h4 class="text-xl font-bold text-slate-800 mb-1">{{ $data['pembina'] }}</h4>
                                <div class="h-1 w-12 bg-amber-400 mx-auto rounded-full mb-3"></div>
                                <p class="text-sm text-slate-500 font-medium bg-slate-50 py-1 px-3 rounded-full inline-block border border-slate-200">
                                    Pembina Ekstrakurikuler
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

{{-- SCRIPT --}}
<script>
function switchEkskul(key) {
    // 1. Hide all content
    document.querySelectorAll('.ekskul-content').forEach(el => {
        el.classList.add('hidden');
    });

    // 2. Reset all buttons
    document.querySelectorAll('[id^="btn-"]').forEach(btn => {
        btn.classList.remove('bg-[#1e5494]', 'text-white', 'shadow-md');
        btn.classList.add('text-slate-600', 'hover:bg-gray-100');
    });

    // 3. Show selected content
    document.getElementById('content-' + key).classList.remove('hidden');

    // 4. Activate button
    const activeBtn = document.getElementById('btn-' + key);
    activeBtn.classList.remove('text-slate-600', 'hover:bg-gray-100');
    activeBtn.classList.add('bg-[#1e5494]', 'text-white', 'shadow-md');
}
</script>

@endsection