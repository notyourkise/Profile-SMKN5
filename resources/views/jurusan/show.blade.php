@extends('layouts.app')

@section('title', $jurusan->nama . ' - SMKN 5 Samarinda')

@section('content')
<section class="bg-[#1e5494] text-white py-16 pb-24">
    <div class="container mx-auto px-4">
        <nav class="mb-6">
            <ol class="flex space-x-2 text-white/80">
                <li><a href="{{ route('home') }}" class="hover:text-white">Beranda</a></li>
                <li>/</li>
                <li class="text-white font-semibold">Program Keahlian</li>
            </ol>
        </nav>
        <h1 class="text-4xl md:text-5xl font-bold">Program Keahlian</h1>
        <p class="mt-4 text-lg text-white/90">Jelajahi berbagai program keahlian yang tersedia di SMK Negeri 5 Samarinda</p>
    </div>
</section>

<section class="relative -mt-16 mb-8">
    <div class="container mx-auto px-4 flex justify-center">
        <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-2xl p-4 md:p-6 flex flex-wrap gap-2 md:gap-4 justify-center items-center overflow-x-auto max-w-full">
            @foreach($allJurusan as $item)
            <button 
                onclick="switchJurusan('{{ $item->kode }}')"
                id="btn-{{ $item->kode }}"
                class="px-4 md:px-8 py-2 md:py-3 rounded-full font-semibold text-sm md:text-base transition-all duration-300 shadow-md hover:shadow-lg whitespace-nowrap {{ $item->id === $jurusan->id ? 'bg-[#1e5494] text-white' : 'bg-gray-100 text-slate-700 hover:bg-gray-200' }}"
            >
                {{ $item->kode }}
            </button>
            @endforeach
        </div>
    </div>
</section>

<section class="py-8 md:py-16 bg-white min-h-[600px]">
    <div class="container mx-auto px-4">
        @foreach($allJurusan as $item)
        
        {{-- ========================================================== --}}
        {{--  BAGIAN 1: KONFIGURASI DATA (KAPRODI & GURU PRODUKTIF)    --}}
        {{-- ========================================================== --}}
        @php
            // 1. Data Kaprodi
            $dataKaprodi = [
                'TJKT' => ['nama' => 'Fachrul Arland Suntoro, S.Kom.', 'foto' => 'kaprodi-tjkt.webp'],
                'DKV'  => ['nama' => 'Julia M.Y , S.Kom.', 'foto' => 'kaprodi-dkv.webp'],
                'MPLB' => ['nama' => 'Sumarsih, S.Pd', 'foto' => 'kaprodi-mplb.webp'],
                'PM'   => ['nama' => 'Yan Maulana Hariyanti, S.Pd', 'foto' => 'kaprodi-pm.webp'],
                'PS'   => ['nama' => 'Laila Latifah, S.Tr.Kep.', 'foto' => 'kaprodi-ps.webp'],
            ];
            $currentKaprodi = $dataKaprodi[$item->kode] ?? ['nama' => 'Kepala Program ' . $item->kode, 'foto' => null];

            // 2. Data Guru Produktif
            $listGuru = [];
            
            if($item->kode == 'TJKT') {
                $listGuru = [
                    ['nama' => 'Andre Puji Purwadi, S.Kom', 'mapel' => 'Kejuruan TJKT', 'foto' => 'Andre.webp'],
                    ['nama' => 'Husaini, S.Kom', 'mapel' => 'Kejuruan TJKT', 'foto' => 'Husaini.webp'],
                    ['nama' => 'Rizki Febrianto, S.Kom', 'mapel' => 'Kejuruan TJKT', 'foto' => 'Rizki.webp'],
                    ['nama' => 'Jiono, S.Pd', 'mapel' => 'Kejuruan TJKT', 'foto' => 'Jiono.webp'],
                ];
            } elseif($item->kode == 'DKV') {
                $listGuru = [
                    ['nama' => 'Muhammad Akbar Herianto, S.Kom', 'mapel' => 'Kejuruan DKV', 'foto' => 'akbar.webp'],
                    ['nama' => 'Hari Siswanto, MM', 'mapel' => 'Kejuruan DKV', 'foto' => 'hari.webp'],
                    ['nama' => 'Kartini, S.Kom', 'mapel' => 'Kejuruan DKV', 'foto' => 'kartini.webp'],
                ];
            } elseif($item->kode == 'MPLB') {
                 $listGuru = [
                    ['nama' => 'Holida Rahmi, S.Pd', 'mapel' => 'Kearsipan', 'foto' => 'holida.webp'],
                    ['nama' => 'Ibnu Luthfi Syaari, S.Pd', 'mapel' => 'Teknologi Perkantoran', 'foto' => 'ibnu.webp'],
                    ['nama' => 'Indria Isriani, S.Pd', 'mapel' => 'Public Relations', 'foto' => 'indria.webp'],
                    ['nama' => 'Rinda Cahyo Ningtyas, S.Pd', 'mapel' => 'Pelayanan Prima', 'foto' => 'rinda.webp'],
                    ['nama' => 'Neni Riska Utami, S.Kom, S.Pd', 'mapel' => 'Pelayanan Prima', 'foto' => 'riska.webp'],
                ];
            } elseif($item->kode == 'PM') {
                 $listGuru = [
                    ['nama' => 'Jamal Idris, S.Pd', 'mapel' => 'Kejuruan PM', 'foto' => 'jamal.webp'],
                    ['nama' => 'MISNIAH, S.Pd', 'mapel' => 'Kejuruan PM', 'foto' => 'misniah.webp'],
                    ['nama' => 'Tri Susanti Wulandari, S.E', 'mapel' => 'Kejuruan PM', 'foto' => 'tri.webp'],
                    ['nama' => 'Rismiyono, S.Pd', 'mapel' => 'Kejuruan PM', 'foto' => 'rismiyono.webp'],
                    ['nama' => 'Tutut Handayani, S.E', 'mapel' => 'Kejuruan PM', 'foto' => 'tutut.webp'],
                ];
            } elseif($item->kode == 'PS') {
                 $listGuru = [
                    ['nama' => 'Ananda Rezki Aditya', 'mapel' => 'Kejuruan PS', 'foto' => 'ananda.webp'],
                    ['nama' => 'Mutia Rahma Eliza', 'mapel' => 'Kejuruan PS', 'foto' => 'mutia.webp'],
                    ['nama' => 'Siska Dwi Novita Sari', 'mapel' => 'Kejuruan PS', 'foto' => 'siska.webp'],
                    ['nama' => 'Dra. Palmuri', 'mapel' => 'Kejuruan PS', 'foto' => 'palmuri.webp'],
                    ['nama' => 'Dra. Fatimah', 'mapel' => 'Kejuruan PS', 'foto' => 'fatimah.webp'],
                    ['nama' => 'Agus Setiaji, S.Psi', 'mapel' => 'Kejuruan PS', 'foto' => 'agus.webp'],
                ];
            }
        @endphp

        <div id="content-{{ $item->kode }}" class="{{ $item->id === $jurusan->id ? '' : 'hidden' }} animate-fade-in">
            <div class="max-w-5xl mx-auto">
                
                {{-- Header Jurusan --}}
                <div class="text-center mb-8 md:mb-12">
                    <div class="mb-4 md:mb-6 flex justify-center">
                        <img 
                            src="{{ asset('assets/images/logo-jurusan/logo-jurusan-' . strtolower($item->kode) . '.webp') }}" 
                            alt="Logo {{ $item->kode }}" 
                            class="h-24 md:h-32 w-auto object-contain {{ strtolower($item->kode) === 'mplb' ? 'bg-[#1e5494] p-4 rounded-xl' : '' }}"
                            onerror="this.style.display='none'"
                        >
                    </div>
                    <h2 class="text-2xl md:text-4xl lg:text-5xl font-bold text-slate-800">
                        {{ $item->nama }}
                    </h2>
                    <hr class="border-t-2 border-gray-300 w-full mt-6 md:mt-8 mb-8 md:mb-12">
                </div>
                
                {{-- ========================================================== --}}
                {{--  BAGIAN 2: KONTEN DESKRIPSI & KAPRODI (WRAP LAYOUT)       --}}
                {{-- ========================================================== --}}
                {{-- KEMBALI KE BLOCK untuk support Float Wrapping --}}
                <div class="block relative clearfix mb-8">
                    
                    {{-- KARTU KAPRODI --}}
                    {{-- Pada mobile: full width, pada md+: float kiri dengan max-width --}}
                    <div class="w-full md:w-[320px] md:float-left md:mr-6 lg:mr-10 mb-6">
                        <div class="w-full shadow-2xl rounded-xl overflow-hidden border border-gray-100">
                            {{-- Kaprodi Oranye --}}
                            <div class="relative w-full aspect-square bg-amber-500 group overflow-hidden">
                                @if($currentKaprodi['foto'])
                                    <img 
                                        src="{{ asset('assets/images/kaprodi/' . $currentKaprodi['foto']) }}" 
                                        alt="{{ $currentKaprodi['nama'] }}"
                                        class="w-full h-full object-cover object-top"
                                        onerror="this.style.display='none'; document.getElementById('ph-kaprodi-{{ $item->kode }}').classList.remove('hidden');"
                                    >
                                    <div id="ph-kaprodi-{{ $item->kode }}" class="hidden w-full h-full flex items-center justify-center bg-gradient-to-br from-amber-400 to-amber-600 absolute inset-0 -z-10">
                                        <span class="text-8xl font-bold text-white/10 select-none">{{ substr($item->kode, 0, 1) }}</span>
                                    </div>
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-amber-400 to-amber-600">
                                        <span class="text-8xl font-bold text-white/10 select-none">{{ substr($item->kode, 0, 1) }}</span>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-black/40 group-hover:bg-black/0 transition-all duration-500"></div>
                                <div class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-black/90 via-black/50 to-transparent text-center">
                                    <h3 class="text-white font-bold text-xl mb-1">{{ $currentKaprodi['nama'] }}</h3>
                                    <p class="text-amber-200 text-sm uppercase font-medium tracking-wider">Ketua Program Keahlian</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- TEKS DESKRIPSI --}}
                    {{-- Tidak perlu flex-grow, biarkan default block agar wrapping terjadi --}}
                    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed text-justify">
                        @if(strtolower($item->kode) === 'tjkt')
                            <p class="mb-4"><strong>Teknik Jaringan Komputer dan Telekomunikasi (TJKT)</strong> merupakan program keahlian yang fokus mencetak tenaga profesional di bidang infrastruktur teknologi. Di era digital yang serba terkoneksi ini, kebutuhan akan ahli jaringan yang mampu merancang, mengamankan, dan memelihara sistem komunikasi data menjadi sangat krusial, baik di perusahaan swasta maupun instansi pemerintahan.</p>
                            <p class="mb-4">Kurikulum TJKT di SMKN 5 Samarinda dirancang secara komprehensif mencakup instalasi jaringan lokal (LAN/WAN), administrasi server berbasis Linux dan Windows, teknologi Fiber Optik, hingga keamanan siber (<strong>Cyber Security</strong>). Siswa juga dibekali sertifikasi industri internasional seperti MikroTik dan Cisco, serta pemahaman mendalam tentang teknologi nirkabel dan <strong>Internet of Things (IoT)</strong>.</p>
                            <p>Lulusan TJKT memiliki prospek karir yang sangat luas dan menjanjikan. Mereka dapat bekerja sebagai <strong>Network Engineer</strong>, <strong>System Administrator</strong>, <strong>IT Support Specialist</strong>, <strong>Fiber Optic Technician</strong>, atau konsultan keamanan jaringan. Selain itu, bekal kewirausahaan yang diberikan memungkinkan lulusan untuk membuka usaha jasa instalasi jaringan (ISP) atau service center perangkat komputer secara mandiri.</p>
                        @elseif(strtolower($item->kode) === 'dkv')
                            <p class="mb-4"><strong>Desain Komunikasi Visual (DKV)</strong> adalah program yang mempersiapkan siswa untuk menjadi desainer profesional yang mampu menciptakan karya visual kreatif dan inovatif. Program ini menggabungkan seni, desain, dan teknologi untuk menghasilkan komunikasi visual yang efektif dalam menyampaikan pesan kepada audiens melalui berbagai media, baik cetak maupun digital.</p>
                            <p class="mb-4">Materi pembelajaran DKV mencakup berbagai bidang seperti desain grafis, ilustrasi digital, fotografi, videografi, animasi 2D dan 3D, motion graphics, hingga <strong>UI/UX Design</strong>. Siswa dilatih menggunakan standar software industri seperti Adobe Creative Cloud (Photoshop, Illustrator, Premiere) dan peralatan fotografi modern untuk menghasilkan karya yang estetik dan fungsional sesuai kebutuhan pasar.</p>
                            <p>Prospek karir lulusan DKV sangat menjanjikan di industri kreatif yang terus berkembang pesat. Lulusan dapat bekerja sebagai <strong>Graphic Designer</strong>, <strong>Illustrator</strong>, <strong>Video Editor</strong>, <strong>Content Creator</strong>, <strong>Social Media Specialist</strong>, <strong>Brand Identity Designer</strong>, atau membuka studio kreatif sendiri (Creative Agency). Kemampuan visual yang kuat menjadi aset utama lulusan untuk bersaing di era konten digital saat ini.</p>
                        @elseif(strtolower($item->kode) === 'mplb')
                             <p class="mb-4"><strong>Manajemen Perkantoran dan Layanan Bisnis (MPLB)</strong> adalah program keahlian yang mencetak tenaga administrasi modern yang terampil, rapi, dan komunikatif. Program ini mentransformasi peran staf administrasi konvensional menjadi manajer informasi yang mampu mengelola dokumen digital, merencanakan agenda bisnis, dan memberikan pelayanan prima kepada relasi perusahaan.</p>
                             <p class="mb-4">Siswa MPLB dibekali dengan kompetensi kearsipan digital (E-Arsip), korespondensi bahasa Indonesia dan Inggris, manajemen rapat, serta teknologi perkantoran terkini. Selain hard skill, program ini sangat menekankan pada pengembangan soft skill seperti <strong>public speaking</strong>, etika profesi, <strong>grooming</strong> (penampilan diri), dan <strong>customer service excellence</strong> untuk membangun citra positif perusahaan.</p>
                             <p>Peluang kerja lulusan MPLB sangat terbuka lebar di hampir semua sektor industri. Lulusan dapat mengisi posisi strategis sebagai Sekretaris Eksekutif, Staf Administrasi, <strong>Front Office</strong>, <strong>Customer Service Representative</strong>, Resepsionis Hotel, hingga Asisten Manajer. Keterampilan organisasi yang kuat juga menjadi modal berharga bagi lulusan yang ingin melanjutkan studi ke jenjang perguruan tinggi.</p>
                        @elseif(strtolower($item->kode) === 'pm')
                             <p class="mb-4"><strong>Pemasaran (Marketing)</strong> adalah ujung tombak dari setiap bisnis, dan program keahlian ini dirancang untuk mencetak tenaga pemasar yang handal di era ekonomi digital. Fokus utama jurusan ini adalah memadukan strategi pemasaran konvensional dengan <strong>Digital Marketing</strong> untuk memperluas jangkauan pasar dan meningkatkan penjualan produk atau jasa secara efektif.</p>
                             <p class="mb-4">Dalam proses pembelajaran, siswa diajarkan teknik riset pasar, strategi <strong>branding</strong>, <strong>copywriting</strong>, pengelolaan <strong>marketplace</strong> (E-Commerce), hingga optimasi media sosial (<strong>Social Media Marketing</strong>). Siswa juga aktif melakukan praktik penjualan langsung dan simulasi bisnis ritel modern untuk melatih mental negosiasi, kepercayaan diri, dan kemampuan analisis perilaku konsumen.</p>
                             <p>Lulusan Pemasaran sangat dibutuhkan oleh perusahaan ritel, start-up, hingga korporasi multinasional. Karir yang dapat ditempuh antara lain sebagai <strong>Digital Marketer</strong>, <strong>Social Media Specialist</strong>, <strong>Sales Executive</strong>, <strong>Content Planner</strong>, atau <strong>Store Manager</strong>. Selain bekerja, lulusan PM memiliki mental wirausaha yang kuat untuk membangun bisnis <strong>online shop</strong> atau agensi pemasaran mereka sendiri.</p>
                        @elseif(strtolower($item->kode) === 'ps')
                             <p class="mb-4"><strong>Pekerjaan Sosial (Social Work)</strong> adalah program keahlian mulia yang mempersiapkan tenaga profesional dengan kepedulian sosial tinggi untuk menangani berbagai masalah kesejahteraan masyarakat. Jurusan ini melatih siswa untuk menjadi fasilitator, konselor, dan pendamping yang mampu memberikan solusi nyata bagi individu, kelompok, atau komunitas yang membutuhkan.</p>
                             <p class="mb-4">Kurikulum Pekerjaan Sosial mencakup psikologi dasar, teknik komunikasi terapeutik, perawatan lansia (<strong>caregiver</strong>), pendampingan anak berkebutuhan khusus, serta manajemen bencana. Siswa sering dilibatkan dalam praktik lapangan di panti sosial, rumah sakit, dan lembaga rehabilitasi untuk mengasah empati dan keterampilan penanganan kasus secara langsung di lapangan.</p>
                             <p>Lulusan Pekerjaan Sosial memiliki peran vital di masyarakat dan lembaga kemanusiaan. Karir yang dapat dijalani meliputi <strong>Social Worker</strong> di Dinas Sosial, Pendamping Program Keluarga Harapan (PKH), <strong>Caregiver</strong> di panti werdha atau rumah sakit, aktivis NGO (LSM), hingga tenaga penyuluh masyarakat. Profesi ini menawarkan kepuasan batin yang tinggi dalam membantu sesama.</p>
                        @else
                             <p class="mb-4">Program keahlian ini berkomitmen untuk mencetak lulusan yang kompeten, berkarakter, dan siap kerja sesuai standar industri. Dengan fasilitas laboratorium yang lengkap dan tenaga pengajar yang berpengalaman, siswa dibimbing untuk menguasai keterampilan teknis maupun non-teknis yang dibutuhkan di dunia kerja modern saat ini.</p>
                             <p class="mb-4">Kurikulum yang diterapkan selalu diselaraskan dengan perkembangan teknologi dan kebutuhan dunia usaha/dunia industri (DUDI). Siswa tidak hanya belajar teori di kelas, tetapi juga melaksanakan praktik intensif, kunjungan industri, dan program Praktik Kerja Lapangan (PKL) untuk mendapatkan pengalaman nyata di lingkungan profesional.</p>
                             <p>Lulusan dari program ini memiliki peluang karir yang luas dan adaptif terhadap perubahan zaman. Bekal sertifikasi kompetensi yang dimiliki menjadi nilai tambah saat melamar pekerjaan atau melanjutkan pendidikan ke jenjang yang lebih tinggi. Bergabunglah bersama kami untuk meraih masa depan yang gemilang.</p>
                        @endif
                    </div>
                </div>

                {{-- ========================================================== --}}
                {{--  BAGIAN SISIPAN: MIKROTIK ACADEMY (KHUSUS TJKT)           --}}
                {{--  Posisi: Di bawah teks deskripsi (Clear Float)            --}}
                {{-- ========================================================== --}}
                @if(strtolower($item->kode) === 'tjkt')
                    <div class="clear-both mb-16 pt-6 text-center animate-fade-in"> 
                        <div class="inline-flex items-center gap-3 px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg">
                            <span class="text-xs text-slate-500">Supported by <span class="font-bold text-slate-700">MikroTik Academy</span></span>
                            <div class="h-4 w-px bg-slate-300"></div>
                            {{-- UPDATE LINK DI SINI --}}
                            <a href="{{ route('mikrotik.index') }}" class="text-xs font-bold text-[#1e5494] hover:underline hover:text-blue-800 transition-colors">
                                Selengkapnya
                            </a>
                        </div>
                    </div>
                @else
                {{-- Untuk jurusan lain, beri jarak clear float agar Guru tidak nabrak --}}
                <div class="clear-both"></div>
                @endif

                {{-- ========================================================== --}}
                {{--  BAGIAN 3: DAFTAR GURU PRODUKTIF (NEW SECTION)            --}}
                {{-- ========================================================== --}}
                <div class="mt-8 w-full">
                    {{-- Judul Section --}}
                    <div class="flex items-center mb-8">
                        <div class="w-1.5 h-8 bg-[#1e5494] mr-4 rounded-full"></div>
                        <h3 class="text-2xl md:text-3xl font-bold text-slate-800">Guru Produktif & Staf Pengajar</h3>
                    </div>

                    {{-- Grid Container (grid-cols-2 md:grid-cols-5) --}}
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 w-full gap-0 rounded-2xl overflow-hidden shadow-2xl">
                        
                        @foreach($listGuru as $guru)
                        {{-- Kartu Guru (Biru) --}}
                        <div class="relative w-full aspect-square bg-[#0b3fa5] group overflow-hidden border-r border-b border-white/10">
                            
                            {{-- Foto Guru (WEBP) --}}
                            <img 
                                src="{{ asset('assets/images/guruprodi/' . strtolower($item->kode) . '/' . $guru['foto']) }}" 
                                alt="{{ $guru['nama'] }}"
                                class="w-full h-full object-cover object-top"
                                onerror="this.style.display='none'; document.getElementById('ph-guru-{{ $loop->index }}-{{ $item->kode }}').classList.remove('hidden');"
                            >

                            {{-- Placeholder jika foto tidak ada --}}
                            <div id="ph-guru-{{ $loop->index }}-{{ $item->kode }}" class="hidden w-full h-full flex items-center justify-center bg-gradient-to-br from-[#1e5494] to-[#0b3fa5] absolute inset-0 -z-10">
                                <span class="text-6xl font-bold text-white/20 select-none">{{ substr($guru['nama'], 0, 1) }}</span>
                            </div>

                            {{-- Overlay Gelap --}}
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/0 transition-all duration-500"></div>
                            
                            {{-- Info Guru --}}
                            <div class="absolute bottom-0 left-0 w-full p-3 md:p-4 bg-gradient-to-t from-black/90 via-black/50 to-transparent text-center">
                                <h3 class="text-white font-bold text-xs md:text-sm lg:text-base leading-tight mb-1">{{ $guru['nama'] }}</h3>
                                <p class="text-blue-200 text-[9px] md:text-[10px] lg:text-xs uppercase font-medium tracking-wide">
                                    {{ $guru['mapel'] }}
                                </p>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</section>

<script>
function switchJurusan(kode) {
    const allButtons = document.querySelectorAll('[id^="btn-"]');
    const allContents = document.querySelectorAll('[id^="content-"]');
    
    allContents.forEach(el => el.classList.add('hidden'));
    
    allButtons.forEach(btn => {
        btn.classList.remove('bg-[#1e5494]', 'text-white', 'scale-105', 'shadow-lg');
        btn.classList.add('bg-gray-100', 'text-slate-700', 'hover:bg-gray-200');
    });

    const selectedContent = document.getElementById(`content-${kode}`);
    const selectedBtn = document.getElementById(`btn-${kode}`);

    if (selectedContent) selectedContent.classList.remove('hidden');
    
    if (selectedBtn) {
        selectedBtn.classList.remove('bg-gray-100', 'text-slate-700', 'hover:bg-gray-200');
        selectedBtn.classList.add('bg-[#1e5494]', 'text-white', 'scale-105', 'shadow-lg');
    }
    
    window.scrollTo({ top: 0, behavior: 'smooth' });
}
</script>
@endsection