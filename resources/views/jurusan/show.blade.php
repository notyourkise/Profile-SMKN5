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
        
        @php
            $dataKaprodi = [
                'TJKT' => ['nama' => 'Fachrul Arland Suntoro, S.Kom.', 'foto' => 'kaprodi-tjkt.webp'],
                'DKV'  => ['nama' => 'Julia M.Y , S.Kom.', 'foto' => 'kaprodi-dkv.webp'],
                'MPLB' => ['nama' => 'Sumarsih, S.Pd', 'foto' => 'kaprodi-mplb.webp'],
                'PM'   => ['nama' => 'Yan Maulana Hariyanti, S.Pd', 'foto' => 'kaprodi-pm.webp'],
                'PS'   => ['nama' => 'Laila Latifah, S.Tr.Kep.', 'foto' => 'kaprodi-ps.webp'],
            ];
            $currentKaprodi = $dataKaprodi[$item->kode] ?? ['nama' => 'Kepala Program ' . $item->kode, 'foto' => null];

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
                            style="max-height: 128px; width: auto; object-fit: contain;"
                            class="{{ strtolower($item->kode) === 'mplb' ? 'bg-[#1e5494] p-4 rounded-xl' : '' }}"
                            onerror="this.style.display='none'"
                        >
                    </div>
                    <h2 class="text-2xl md:text-4xl lg:text-5xl font-bold text-slate-800">
                        {{ $item->nama }}
                    </h2>
                    <hr class="border-t-2 border-gray-300 w-full mt-6 md:mt-8 mb-8 md:mb-12">
                </div>
                
                {{-- BAGIAN 2: KONTEN DESKRIPSI & KAPRODI (FIXED GRID SYSTEM) --}}
<div style="display: grid; grid-template-columns: 1fr; gap: 2rem; margin-bottom: 2rem;" class="md:grid-cols-3">
    
                    {{-- KOLOM KIRI: KARTU KAPRODI --}}
                    <div style="width: 100%; max-width: 320px; margin: 0 auto;">
                        <div class="shadow-2xl rounded-xl overflow-hidden border border-gray-100">
                            {{-- Box Foto dengan ukuran terkunci --}}
                            <div style="position: relative; width: 100%; aspect-ratio: 1/1; background-color: #f59e0b; overflow: hidden;">
                                @if($currentKaprodi['foto'])
                                    <img 
                                        src="{{ asset('assets/images/kaprodi/' . $currentKaprodi['foto']) }}" 
                                        alt="{{ $currentKaprodi['nama'] }}"
                                        style="width: 100%; height: 100%; object-fit: cover; object-position: top;"
                                        onerror="this.style.display='none'; document.getElementById('ph-kaprodi-{{ $item->kode }}').classList.remove('hidden');"
                                    >
                                @endif
                
                                    {{-- Placeholder jika foto error/tidak ada --}}
                                    <div id="ph-kaprodi-{{ $item->kode }}" class="{{ $currentKaprodi['foto'] ? 'hidden' : '' }}" 
                                        style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: linear-gradient(to bottom right, #fbbf24, #d97706);">
                                        <span style="font-size: 5rem; font-weight: bold; color: rgba(255,255,255,0.2);">{{ substr($item->kode, 0, 1) }}</span>
                                    </div>

                                    {{-- Overlay Nama Kaprodi --}}
                                    <div style="position: absolute; bottom: 0; left: 0; width: 100%; padding: 1.5rem; background: linear-gradient(to top, rgba(0,0,0,0.9), transparent); text-align: center;">
                                        <h3 style="color: white; font-weight: bold; font-size: 1.1rem; margin-bottom: 0.25rem;">{{ $currentKaprodi['nama'] }}</h3>
                                        <p style="color: #fcd34d; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em;">Ketua Program Keahlian</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- KOLOM KANAN: TEKS DESKRIPSI (Mengambil 2/3 space di desktop) --}}
                        <div class="md:col-span-2">
                            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed text-justify">
                                {{-- Konten deskripsi panjang yang kemarin --}}
                                @if(strtolower($item->kode) === 'tjkt')
                                    <p class="mb-4"><strong>Teknik Jaringan Komputer dan Telekomunikasi (TJKT)</strong> ... (dan seterusnya)</p>
                                @endif
                                {{-- ... tambahkan @elseif lainnya sesuai kode sebelumnya ... --}}
                            </div>
                        </div>
                    </div>

                    {{-- TEKS DESKRIPSI LENGKAP --}}
                    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed text-justify">
                        @if(strtolower($item->kode) === 'tjkt')
                            <p class="mb-4"><strong>Teknik Jaringan Komputer dan Telekomunikasi (TJKT)</strong> adalah program keahlian unggulan di SMK Negeri 5 Samarinda yang dirancang untuk menjawab tantangan industri digital global. Jurusan ini memfokuskan pada penguasaan infrastruktur jaringan komunikasi, mulai dari transmisi data, administrasi server, hingga implementasi teknologi nirkabel tingkat lanjut. Mahasiswa dibimbing untuk memahami arsitektur jaringan masa depan yang menjadi tulang punggung revolusi industri 4.0.</p>
                            
                            <p class="mb-4">Kurikulum kami disusun secara integratif mencakup instalasi dan konfigurasi perangkat jaringan (Switch & Router), teknik pengkabelan serat optik (Fiber Optic), administrasi sistem jaringan berbasis Linux dan Windows Server, serta pemeliharaan infrastruktur telekomunikasi. Tidak hanya aspek fisik, siswa juga dibekali kemampuan dalam <strong>Cyber Security</strong> untuk mengamankan data dan jaringan dari berbagai ancaman siber yang kian kompleks.</p>
                            
                            <p class="mb-4">SMK Negeri 5 Samarinda bangga menjadi bagian dari <strong>MikroTik Academy</strong> dan bekerja sama dengan berbagai mitra industri terkemuka. Hal ini memungkinkan siswa mendapatkan sertifikasi industri internasional yang diakui secara global saat mereka lulus. Fasilitas laboratorium kami dilengkapi dengan perangkat standar industri (Rack Server, Mikrotik Core Router, Splicer FO) yang memberikan pengalaman belajar nyata layaknya bekerja di Data Center atau ISP profesional.</p>
                            
                            <p class="mb-4">Lulusan TJKT memiliki peluang karir yang sangat prestisius sebagai <strong>Network Engineer</strong>, <strong>System Administrator</strong>, <strong>Security Specialist</strong>, atau <strong>IT Support Engineer</strong>. Di tengah masifnya pembangunan Ibu Kota Nusantara (IKN) di Kalimantan Timur, kebutuhan akan ahli telekomunikasi sangat tinggi, menjadikan lulusan program ini garda terdepan dalam pembangunan infrastruktur digital nasional.</p>

                        @elseif(strtolower($item->kode) === 'dkv')
                            <p class="mb-4"><strong>Desain Komunikasi Visual (DKV)</strong> adalah muara kreatif bagi siswa yang ingin menggabungkan kekuatan estetika seni dengan efektivitas teknologi digital. Program ini mentransformasi ide kreatif menjadi solusi visual yang mampu menggerakkan pasar dan menyampaikan pesan secara persuasif. Di era konten visual seperti sekarang, DKV menjadi salah satu jurusan paling dinamis dan diminati oleh industri kreatif nasional maupun internasional.</p>
                            
                            <p class="mb-4">Siswa akan menguasai berbagai pilar utama desain, mulai dari desain grafis (branding & layout), ilustrasi digital, fotografi profesional, hingga produksi multimedia (video editing & motion graphics). Kami mengajarkan cara mengoperasikan standar software industri seperti <strong>Adobe Creative Cloud</strong> (Photoshop, Illustrator, Premiere, After Effects) serta teknik penggunaan peralatan kamera kelas sinematografi untuk menghasilkan karya berkualitas tinggi.</p>
                            
                            <p class="mb-4">Selain kemampuan teknis (hard skill), jurusan ini sangat menekankan pengembangan pemikiran desain (Design Thinking). Siswa dilatih untuk menganalisis perilaku konsumen, menyusun strategi kampanye visual, hingga presentasi karya secara profesional. Melalui program <strong>Teaching Factory (TeFa)</strong>, siswa dilibatkan dalam proyek nyata dari klien luar untuk membangun portofolio yang kompetitif sebelum benar-benar memasuki dunia kerja.</p>
                            
                            <p class="mb-4">Prospek karir lulusan DKV sangat luas, mencakup posisi sebagai <strong>Graphic Designer</strong>, <strong>Social Media Content Creator</strong>, <strong>Video Editor</strong>, <strong>UI/UX Designer</strong>, hingga <strong>Creative Director</strong>. Lulusan juga memiliki bekal kuat untuk menjadi technopreneur dengan membangun studio kreatif atau jasa agensi mandiri, memanfaatkan peluang ekonomi kreatif yang sedang meledak saat ini.</p>

                        @elseif(strtolower($item->kode) === 'mplb')
                             <p class="mb-4"><strong>Manajemen Perkantoran dan Layanan Bisnis (MPLB)</strong> di SMK Negeri 5 Samarinda merupakan program yang mengadaptasi standar manajemen modern berbasis digital. Jurusan ini tidak lagi sekadar mencetak tenaga admin konvensional, melainkan asisten manajerial yang profesional, komunikatif, dan mampu mengelola ekosistem bisnis digital secara efisien. MPLB menjadi inti dari kelancaran operasional setiap korporasi dan instansi pemerintahan.</p>
                             
                             <p class="mb-4">Kompetensi yang diajarkan meliputi manajemen dokumen elektronik (E-Filing), korespondensi bisnis dalam bahasa internasional, pengelolaan rapat dan acara formal, hingga administrasi keuangan perusahaan. Siswa dididik untuk menguasai teknologi perkantoran terkini, sistem otomatisasi kantor, serta manajemen sumber daya manusia yang berstandar nasional dan internasional.</p>
                             
                             <p class="mb-4">Penekanan khusus diberikan pada pembentukan karakter dan etika profesi yang kuat melalui pelatihan <strong>Grooming</strong> (penampilan diri profesional), etiket bisnis, dan <strong>Public Speaking</strong>. Kami memiliki laboratorium perkantoran modern yang disimulasikan sebagai ruang kerja korporat, sehingga siswa terbiasa dengan ritme kerja yang rapi, disiplin, dan berorientasi pada kepuasan pelanggan (Customer Excellence).</p>
                             
                             <p class="mb-4">Lulusan MPLB memiliki akses kerja yang merata di semua sektor industri, mulai dari perbankan, perhotelan, hingga instansi pemerintah. Mereka sangat dibutuhkan sebagai <strong>Executive Secretary</strong>, <strong>Human Resource Staff</strong>, <strong>Public Relations Assistant</strong>, hingga <strong>Front Office Manager</strong>. Kemampuan organisasi yang sistematis juga menjadi modal utama bagi mereka yang ingin melanjutkan studi ke jenjang pendidikan tinggi di bidang manajemen atau hukum.</p>

                        @elseif(strtolower($item->kode) === 'pm')
                             <p class="mb-4"><strong>Pemasaran (Marketing)</strong> adalah ujung tombak dari setiap rantai bisnis global. Program keahlian ini di SMK Negeri 5 Samarinda dirancang untuk mencetak tenaga pemasar yang handal, adaptif, dan jago dalam strategi penjualan di era digital. Fokus kami adalah memadukan psikologi konsumen dengan teknologi untuk menciptakan strategi pemasaran yang efektif, mulai dari pasar konvensional hingga pasar global di internet.</p>
                             
                             <p class="mb-4">Materi pembelajaran mencakup riset pasar, strategi branding, tata kelola ritel modern, hingga penguasaan <strong>Digital Marketing</strong> secara utuh. Siswa akan belajar cara mengoptimalkan <strong>Search Engine Optimization (SEO)</strong>, iklan media sosial (Social Media Ads), pengelolaan E-Commerce/Marketplace, hingga teknik Copywriting yang mampu menarik perhatian audiens secara masif.</p>
                             
                             <p class="mb-4">Siswa terlibat langsung dalam simulasi bisnis ritel sekolah dan praktik kewirausahaan mandiri. Hal ini bertujuan untuk melatih mentalitas tangguh, kepercayaan diri, dan kemampuan negosiasi tingkat tinggi. Kami bekerja sama dengan jaringan ritel besar dan platform digital untuk memastikan kurikulum yang diberikan selalu relevan dengan tren perilaku belanja konsumen yang terus berubah.</p>
                             
                             <p class="mb-4">Lulusan Pemasaran dipersiapkan untuk menjadi tenaga profesional sebagai <strong>Digital Marketer</strong>, <strong>Brand Specialist</strong>, <strong>Social Media Strategist</strong>, atau <strong>Retail Manager</strong>. Selain itu, lulusan memiliki peluang besar untuk sukses sebagai wirausahawan (entrepreneur) muda yang mampu membangun bisnis mandiri dengan memanfaatkan kanal digital sebagai alat pemasaran utamanya.</p>

                        @elseif(strtolower($item->kode) === 'ps')
                             <p class="mb-4"><strong>Pekerjaan Sosial (Social Work)</strong> merupakan program keahlian yang sangat vital dan menyentuh sisi kemanusiaan terdalam. Jurusan ini mendidik siswa untuk menjadi tenaga profesional di bidang kesejahteraan sosial yang memiliki empati tinggi, keterampilan konseling, dan kemampuan pendampingan masyarakat. Di tengah pesatnya pembangunan fisik, peran tenaga sosial sangat dibutuhkan untuk menjaga keseimbangan kesejahteraan masyarakat.</p>
                             
                             <p class="mb-4">Kurikulum kami mencakup pemahaman psikologi perkembangan manusia, teknik komunikasi terapeutik, manajemen kasus sosial, hingga pelayanan perawatan sosial bagi kelompok rentan seperti lansia (Caregiver) dan anak berkebutuhan khusus. Siswa juga dilatih untuk memahami regulasi kebijakan sosial pemerintah dan cara mengorganisir bantuan kemanusiaan dalam situasi bencana atau krisis sosial.</p>
                             
                             <p class="mb-4">Siswa jurusan Pekerjaan Sosial SMKN 5 Samarinda secara rutin melaksanakan praktik lapangan di berbagai panti sosial, lembaga rehabilitasi, rumah sakit, dan lembaga kemanusiaan tingkat nasional. Pengalaman langsung ini membentuk karakter siswa yang sabar, solutif, dan memiliki dedikasi tinggi dalam membantu individu maupun kelompok dalam memecahkan masalah kehidupan mereka.</p>
                             
                             <p class="mb-4">Prospek karir lulusan sangat luas di lembaga-lembaga kemanusiaan, Dinas Sosial, kementerian, hingga Non-Governmental Organization (LSM) internasional. Lulusan dapat bekerja sebagai <strong>Social Worker</strong>, <strong>Pendamping Program Pemerintah (seperti PKH)</strong>, <strong>Professional Caregiver</strong>, atau tenaga konsultan sosial. Profesi ini bukan hanya menjanjikan karir yang stabil, tetapi juga memberikan kepuasan batin yang tak ternilai melalui pengabdian kepada sesama.</p>

                        @else
                             <p class="mb-4">Program keahlian ini berkomitmen penuh untuk mencetak lulusan yang tidak hanya unggul dalam kompetensi teknis (hard skill), tetapi juga memiliki karakter yang kuat (soft skill) sesuai kebutuhan dunia industri masa depan. Dengan kurikulum yang selalu diperbarui mengikuti tren teknologi global, kami memastikan setiap siswa siap menghadapi tantangan persaingan kerja yang kian kompetitif.</p>
                             
                             <p class="mb-4">Didukung oleh fasilitas laboratorium standar industri dan tenaga pendidik yang merupakan praktisi di bidangnya, proses pembelajaran dilakukan dengan pendekatan yang interaktif dan berbasis proyek (Project Based Learning). Siswa akan mendapatkan pengalaman nyata melalui program Praktik Kerja Lapangan (PKL) di perusahaan-perusahaan mitra strategis kami, membangun jembatan antara teori di sekolah dengan realitas di dunia kerja.</p>
                             
                             <p class="mb-4">Lulusan dari program ini disiapkan untuk menjadi tenaga kerja profesional yang mandiri, kreatif, dan inovatif. Bekal sertifikasi keahlian dan jejaring industri yang kami miliki memberikan keuntungan lebih bagi lulusan untuk mendapatkan karir yang cemerlang atau melanjutkan ke jenjang perguruan tinggi impian mereka.</p>
                        @endif
                    </div>
                </div>

                {{-- MIKROTIK ACADEMY (KHUSUS TJKT) --}}
                @if(strtolower($item->kode) === 'tjkt')
                    <div class="clear-both mb-16 pt-6 text-center animate-fade-in"> 
                        <div class="inline-flex items-center gap-3 px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg">
                            <span class="text-xs text-slate-500">Supported by <span class="font-bold text-slate-700">MikroTik Academy</span></span>
                            <div class="h-4 w-px bg-slate-300"></div>
                            <a href="{{ route('mikrotik.index') }}" class="text-xs font-bold text-[#1e5494] hover:underline hover:text-blue-800 transition-colors">
                                Selengkapnya
                            </a>
                        </div>
                    </div>
                @else
                    <div class="clear-both"></div>
                @endif

                {{-- BAGIAN 3: DAFTAR GURU PRODUKTIF --}}
                <div class="mt-8 w-full">
                    <div class="flex items-center mb-8">
                        <div class="w-1.5 h-8 bg-[#1e5494] mr-4 rounded-full"></div>
                        <h3 class="text-2xl md:text-3xl font-bold text-slate-800">Guru Produktif & Staf Pengajar</h3>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 w-full gap-0 rounded-2xl overflow-hidden shadow-2xl">
                        @foreach($listGuru as $guru)
                        <div class="relative w-full aspect-square bg-[#0b3fa5] group overflow-hidden border-r border-b border-white/10" style="max-width: 100%;">
                            <img 
                                src="{{ asset('assets/images/guruprodi/' . strtolower($item->kode) . '/' . $guru['foto']) }}" 
                                alt="{{ $guru['nama'] }}"
                                style="width: 100%; height: 100%; object-fit: cover; object-position: top;"
                                onerror="this.style.display='none'; document.getElementById('ph-guru-{{ $loop->index }}-{{ $item->kode }}').classList.remove('hidden');"
                            >
                            <div id="ph-guru-{{ $loop->index }}-{{ $item->kode }}" class="hidden w-full h-full flex items-center justify-center bg-gradient-to-br from-[#1e5494] to-[#0b3fa5] absolute inset-0 -z-10">
                                <span class="text-6xl font-bold text-white/20 select-none">{{ substr($guru['nama'], 0, 1) }}</span>
                            </div>
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/0 transition-all duration-500"></div>
                            <div class="absolute bottom-0 left-0 w-full p-3 md:p-4 bg-gradient-to-t from-black/90 via-black/50 to-transparent text-center">
                                <h3 class="text-white font-bold text-xs md:text-sm lg:text-base leading-tight mb-1">{{ $guru['nama'] }}</h3>
                                <p class="text-blue-200 text-[9px] md:text-[10px] lg:text-xs uppercase font-medium tracking-wide">{{ $guru['mapel'] }}</p>
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