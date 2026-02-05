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
                
                {{-- BAGIAN 2: KONTEN DESKRIPSI & KAPRODI --}}
                <div class="block relative clearfix mb-8">
                    
                    {{-- KARTU KAPRODI (FIXED SIZE) --}}
                    <div class="w-full md:w-[300px] md:float-left md:mr-8 mb-8">
                        <div class="w-full shadow-2xl rounded-xl overflow-hidden border border-gray-100" style="max-width: 300px; margin: 0 auto;">
                            <div class="relative bg-amber-500 group overflow-hidden" style="height: 300px; width: 100%;">
                                @if($currentKaprodi['foto'])
                                    <img 
                                        src="{{ asset('assets/images/kaprodi/' . $currentKaprodi['foto']) }}" 
                                        alt="{{ $currentKaprodi['nama'] }}"
                                        style="width: 100%; height: 100%; object-fit: cover; object-position: top;"
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
                                <div class="absolute bottom-0 left-0 w-full p-4 bg-gradient-to-t from-black/90 via-black/50 to-transparent text-center">
                                    <h3 class="text-white font-bold text-lg mb-1">{{ $currentKaprodi['nama'] }}</h3>
                                    <p class="text-amber-200 text-xs uppercase font-medium tracking-wider">Ketua Program Keahlian</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- TEKS DESKRIPSI --}}
                    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed text-justify">
                        @if(strtolower($item->kode) === 'tjkt')
                            <p class="mb-4"><strong>Teknik Jaringan Komputer dan Telekomunikasi (TJKT)</strong> merupakan program keahlian yang fokus mencetak tenaga profesional di bidang infrastruktur teknologi...</p>
                            <p class="mb-4">Kurikulum TJKT di SMKN 5 Samarinda dirancang secara komprehensif mencakup instalasi jaringan lokal (LAN/WAN), administrasi server...</p>
                            <p>Lulusan TJKT memiliki prospek karir yang sangat luas dan menjanjikan. Mereka dapat bekerja sebagai <strong>Network Engineer</strong>, <strong>System Administrator</strong>...</p>
                        @elseif(strtolower($item->kode) === 'dkv')
                            <p class="mb-4"><strong>Desain Komunikasi Visual (DKV)</strong> adalah program yang mempersiapkan siswa untuk menjadi desainer profesional yang mampu menciptakan karya visual kreatif...</p>
                            <p class="mb-4">Materi pembelajaran DKV mencakup berbagai bidang seperti desain grafis, ilustrasi digital, fotografi, videografi...</p>
                            <p>Prospek karir lulusan DKV sangat menjanjikan di industri kreatif yang terus berkembang pesat...</p>
                        @elseif(strtolower($item->kode) === 'mplb')
                             <p class="mb-4"><strong>Manajemen Perkantoran dan Layanan Bisnis (MPLB)</strong> adalah program keahlian yang mencetak tenaga administrasi modern...</p>
                             <p class="mb-4">Siswa MPLB dibekali dengan kompetensi kearsipan digital (E-Arsip), korespondensi bahasa Indonesia dan Inggris...</p>
                             <p>Peluang kerja lulusan MPLB sangat terbuka lebar di hampir semua sektor industri...</p>
                        @elseif(strtolower($item->kode) === 'pm')
                             <p class="mb-4"><strong>Pemasaran (Marketing)</strong> adalah ujung tombak dari setiap bisnis, dan program keahlian ini dirancang untuk mencetak tenaga pemasar yang handal...</p>
                             <p class="mb-4">Dalam proses pembelajaran, siswa diajarkan teknik riset pasar, strategi <strong>branding</strong>, <strong>copywriting</strong>...</p>
                             <p>Lulusan Pemasaran sangat dibutuhkan oleh perusahaan ritel, start-up, hingga korporasi multinasional...</p>
                        @elseif(strtolower($item->kode) === 'ps')
                             <p class="mb-4"><strong>Pekerjaan Sosial (Social Work)</strong> adalah program keahlian mulia yang mempersiapkan tenaga profesional dengan kepedulian sosial tinggi...</p>
                             <p class="mb-4">Kurikulum Pekerjaan Sosial mencakup psikologi dasar, teknik komunikasi terapeutik, perawatan lansia (<strong>caregiver</strong>)...</p>
                             <p>Lulusan Pekerjaan Sosial memiliki peran vital di masyarakat dan lembaga kemanusiaan...</p>
                        @else
                             <p class="mb-4">Program keahlian ini berkomitmen untuk mencetak lulusan yang kompeten, berkarakter, dan siap kerja sesuai standar industri...</p>
                             <p>Lulusan dari program ini memiliki peluang karir yang luas dan adaptif terhadap perubahan zaman...</p>
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