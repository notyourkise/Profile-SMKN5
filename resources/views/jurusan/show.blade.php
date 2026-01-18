@extends('layouts.app')

@section('title', $jurusan->nama . ' - SMKN 5 Samarinda')

@section('content')
<!-- Header Section -->
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

<!-- Floating Toggle Menu -->
<section class="relative -mt-16 mb-8">
    <div class="container mx-auto px-4 flex justify-center">
        <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-2xl p-6 flex flex-wrap gap-4 justify-center items-center">
            @foreach($allJurusan as $item)
            <button 
                onclick="switchJurusan('{{ $item->kode }}')"
                id="btn-{{ $item->kode }}"
                class="px-8 py-3 rounded-full font-semibold transition-all duration-300 shadow-md hover:shadow-lg {{ $item->id === $jurusan->id ? 'bg-[#1e5494] text-white' : 'bg-gray-100 text-slate-700 hover:bg-gray-200' }}"
            >
                {{ $item->kode }}
            </button>
            @endforeach
        </div>
    </div>
</section>

<!-- Jurusan Content -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        @foreach($allJurusan as $item)
        <div id="content-{{ $item->kode }}" class="{{ $item->id === $jurusan->id ? '' : 'hidden' }}">
            <div class="max-w-4xl mx-auto">
                
                {{-- Logo dan Nama Jurusan --}}
                <div class="text-center mb-8">
                    <div class="mb-6 flex justify-center">
                        <img 
                            src="{{ asset('assets/images/logo-jurusan/logo-jurusan-' . strtolower($item->kode) . '.webp') }}" 
                            alt="Logo {{ $item->kode }}" 
                            class="h-40 w-auto object-contain {{ strtolower($item->kode) === 'mplb' ? 'bg-[#1e5494] p-4 rounded-xl' : '' }}"
                        >
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-slate-800">{{ $item->nama }}</h2>
                </div>
                
                {{-- Horizontal Line Separator --}}
                <hr class="border-t-2 border-gray-300 mb-8">
                
                {{-- Konten Deskripsi --}}
                <div class="prose prose-lg max-w-none">
                    @if(strtolower($item->kode) === 'tjkt')
                        <p class="text-gray-700 leading-relaxed text-justify mb-4">
                            Program Keahlian Teknik Jaringan Komputer dan Telekomunikasi (TJKT) merupakan salah satu program unggulan di SMK Negeri 5 Samarinda yang mempersiapkan peserta didik untuk menjadi tenaga profesional di bidang teknologi informasi dan komunikasi. Program ini dirancang untuk menghasilkan lulusan yang kompeten dalam merancang, menginstalasi, mengonfigurasi, dan memelihara jaringan komputer serta sistem telekomunikasi.
                        </p>
                        <p class="text-gray-700 leading-relaxed text-justify mb-4">
                            Dalam pembelajaran TJKT, siswa akan mempelajari berbagai kompetensi meliputi instalasi dan konfigurasi jaringan komputer, administrasi sistem operasi jaringan, pemrograman web dan mobile, cyber security, cloud computing, Internet of Things (IoT), serta teknologi telekomunikasi terkini. Siswa juga dibekali dengan kemampuan troubleshooting dan problem solving dalam menangani permasalahan jaringan dan sistem komputer.
                        </p>
                        <p class="text-gray-700 leading-relaxed text-justify">
                            Lulusan TJKT memiliki peluang karir yang sangat luas di era digital ini, antara lain sebagai Network Administrator, System Administrator, Network Engineer, IT Support, Web Developer, Mobile Application Developer, Database Administrator, atau berwirausaha di bidang jasa instalasi dan maintenance jaringan komputer. Program ini juga membekali siswa untuk melanjutkan pendidikan ke jenjang yang lebih tinggi di bidang Teknik Informatika, Sistem Informasi, atau Teknik Komputer.
                        </p>
                    @elseif(strtolower($item->kode) === 'dkv')
                        <p class="text-gray-700 leading-relaxed text-justify mb-4">
                            Program Keahlian Desain Komunikasi Visual (DKV) adalah program yang mempersiapkan siswa untuk menjadi desainer profesional yang mampu menciptakan karya visual kreatif dan inovatif. Program ini menggabungkan seni, desain, dan teknologi untuk menghasilkan komunikasi visual yang efektif dalam berbagai media, baik cetak maupun digital.
                        </p>
                        <p class="text-gray-700 leading-relaxed text-justify mb-4">
                            Materi pembelajaran DKV mencakup berbagai bidang seperti desain grafis, ilustrasi digital, fotografi, videografi, animasi 2D dan 3D, motion graphics, desain UI/UX, multimedia interaktif, hingga branding dan advertising. Siswa akan dilatih menggunakan software industri seperti Adobe Photoshop, Illustrator, After Effects, Premiere Pro, CorelDRAW, dan aplikasi desain modern lainnya. Pembelajaran juga menekankan pada kreativitas, estetika, dan pemahaman terhadap prinsip-prinsip desain.
                        </p>
                        <p class="text-gray-700 leading-relaxed text-justify">
                            Prospek karir lulusan DKV sangat menjanjikan di industri kreatif yang terus berkembang pesat. Lulusan dapat bekerja sebagai Graphic Designer, Illustrator, Animator, Video Editor, UI/UX Designer, Content Creator, Social Media Specialist, Brand Designer, atau membuka usaha creative agency sendiri. Dengan portofolio yang kuat, lulusan DKV juga dapat melanjutkan studi ke program Desain Grafis, Desain Komunikasi Visual, atau Multimedia di perguruan tinggi.
                        </p>
                    @elseif(strtolower($item->kode) === 'pm')
                        <p class="text-gray-700 leading-relaxed text-justify mb-4">
                            Program Keahlian Pemasaran (PM) dirancang untuk mempersiapkan siswa menjadi tenaga pemasaran profesional yang handal dalam memasarkan produk dan jasa, baik secara konvensional maupun digital. Program ini mengajarkan strategi pemasaran modern yang sesuai dengan perkembangan teknologi dan perilaku konsumen saat ini.
                        </p>
                        <p class="text-gray-700 leading-relaxed text-justify mb-4">
                            Kompetensi yang diajarkan meliputi manajemen pemasaran, riset pasar, perilaku konsumen, strategi promosi, digital marketing, social media marketing, e-commerce, analisis data pemasaran, public relations, dan customer relationship management. Siswa juga dibekali dengan keterampilan komunikasi persuasif, negosiasi, presentasi produk, serta kemampuan mengoperasikan berbagai platform dan tools pemasaran digital seperti Google Ads, Facebook Ads, Instagram Business, dan marketplace online.
                        </p>
                        <p class="text-gray-700 leading-relaxed text-justify">
                            Peluang kerja lulusan PM sangat beragam dan dibutuhkan di berbagai sektor industri. Lulusan dapat bekerja sebagai Marketing Executive, Digital Marketer, Sales Representative, Social Media Specialist, Content Marketing Specialist, Brand Ambassador, Customer Service, atau membangun bisnis online sendiri. Dengan sertifikasi yang dimiliki, lulusan juga dapat melanjutkan pendidikan ke program Manajemen Pemasaran, Komunikasi, atau Administrasi Bisnis di perguruan tinggi.
                        </p>
                    @elseif(strtolower($item->kode) === 'ps')
                        <p class="text-gray-700 leading-relaxed text-justify mb-4">
                            Program Keahlian Pekerjaan Sosial (PS) merupakan program yang mempersiapkan siswa untuk menjadi tenaga profesional di bidang kesejahteraan sosial dan pemberdayaan masyarakat. Program ini bertujuan menghasilkan lulusan yang memiliki kepedulian sosial tinggi dan mampu membantu menyelesaikan berbagai permasalahan sosial di masyarakat.
                        </p>
                        <p class="text-gray-700 leading-relaxed text-justify mb-4">
                            Pembelajaran mencakup berbagai bidang seperti psikologi sosial, dinamika kelompok, teknik komunikasi sosial, manajemen program sosial, advokasi dan konseling, community development, pemberdayaan masyarakat, manajemen lembaga sosial, serta penanganan kasus sosial. Siswa juga dilatih untuk melakukan assessment kebutuhan masyarakat, merancang program intervensi sosial, dan bekerja sama dengan berbagai stakeholder dalam upaya peningkatan kesejahteraan sosial.
                        </p>
                        <p class="text-gray-700 leading-relaxed text-justify">
                            Lulusan Pekerjaan Sosial memiliki peran penting dalam pembangunan sosial masyarakat. Mereka dapat bekerja di berbagai lembaga seperti Dinas Sosial, lembaga swadaya masyarakat (LSM), yayasan sosial, rumah sakit sebagai medical social worker, sekolah sebagai school social worker, perusahaan sebagai corporate social responsibility officer, atau mendirikan komunitas dan organisasi sosial sendiri. Program ini juga membuka jalan untuk melanjutkan studi ke program Kesejahteraan Sosial atau Ilmu Sosial di perguruan tinggi.
                        </p>
                    @elseif(strtolower($item->kode) === 'mplb')
                        <p class="text-gray-700 leading-relaxed text-justify mb-4">
                            Program Keahlian Manajemen Perkantoran dan Layanan Bisnis (MPLB) adalah program yang mempersiapkan siswa untuk menjadi tenaga administrasi profesional yang terampil dalam mengelola kegiatan perkantoran dan memberikan layanan bisnis yang berkualitas. Program ini dirancang untuk menghasilkan lulusan yang kompeten dalam mendukung kelancaran operasional perkantoran di berbagai jenis organisasi dan perusahaan.
                        </p>
                        <p class="text-gray-700 leading-relaxed text-justify mb-4">
                            Materi pembelajaran MPLB mencakup administrasi umum, kearsipan, korespondensi bisnis, komunikasi bisnis, manajemen kegiatan perkantoran, teknologi perkantoran, customer service, public relations, event management, serta pengelolaan dokumen dan data digital. Siswa dibekali dengan kemampuan mengoperasikan berbagai aplikasi perkantoran modern seperti Microsoft Office Suite, sistem manajemen dokumen digital, aplikasi presentasi, dan software administrasi bisnis lainnya. Pembelajaran juga menekankan pada soft skills seperti etika profesi, komunikasi interpersonal, dan pelayanan prima.
                        </p>
                        <p class="text-gray-700 leading-relaxed text-justify">
                            Prospek karir lulusan MPLB sangat luas karena setiap organisasi dan perusahaan membutuhkan tenaga administrasi yang profesional. Lulusan dapat bekerja sebagai Sekretaris, Staff Administrasi, Front Office Staff, Customer Service Officer, Receptionist, Event Organizer, Public Relations Officer, Office Manager, atau Administrator Bisnis. Dengan kompetensi yang dimiliki, lulusan juga dapat melanjutkan pendidikan ke program Administrasi Bisnis, Sekretaris, atau Manajemen di perguruan tinggi.
                        </p>
                    @else
                        <p class="text-gray-700 leading-relaxed text-justify">{{ $item->deskripsi }}</p>
                    @endif
                </div>

            </div>
        </div>
        @endforeach
    </div>
</section>

<script>
function switchJurusan(kode) {
    // Get all jurusan codes from buttons
    const allButtons = document.querySelectorAll('[id^="btn-"]');
    const allCodes = Array.from(allButtons).map(btn => btn.id.replace('btn-', ''));
    
    // Hide all content sections
    allCodes.forEach(code => {
        const content = document.getElementById(`content-${code}`);
        if (content) {
            content.classList.add('hidden');
        }
    });
    
    // Show selected content
    const selectedContent = document.getElementById(`content-${kode}`);
    if (selectedContent) {
        selectedContent.classList.remove('hidden');
    }
    
    // Update button styles
    allButtons.forEach(btn => {
        const btnKode = btn.id.replace('btn-', '');
        if (btnKode === kode) {
            btn.classList.remove('bg-gray-100', 'text-slate-700', 'hover:bg-gray-200');
            btn.classList.add('bg-[#1e5494]', 'text-white');
        } else {
            btn.classList.remove('bg-[#1e5494]', 'text-white');
            btn.classList.add('bg-gray-100', 'text-slate-700', 'hover:bg-gray-200');
        }
    });
    
    // Smooth scroll to top of content
    window.scrollTo({ top: 0, behavior: 'smooth' });
}
</script>
@endsection
