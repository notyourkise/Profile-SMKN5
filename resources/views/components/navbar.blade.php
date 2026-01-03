@php
    // Profil Dropdown Items
    $profilItems = [
        ['label' => 'Visi & Misi', 'url' => '/profil/visi-misi', 'icon' => 'fa-solid fa-bullseye', 'desc' => 'Tujuan dan cita-cita sekolah'],
        ['label' => 'Sejarah', 'url' => '/profil/sejarah', 'icon' => 'fa-solid fa-clock-rotate-left', 'desc' => 'Riwayat pendirian sekolah'],
        ['label' => 'Struktur Organisasi', 'url' => '/profil/organisasi', 'icon' => 'fa-solid fa-sitemap', 'desc' => 'Hirarki kepemimpinan sekolah'],
        ['label' => 'Sarana Prasarana', 'url' => '/profil/sarpras', 'icon' => 'fa-solid fa-building', 'desc' => 'Fasilitas dan infrastruktur'],
        ['label' => 'Guru & Staf', 'url' => '/profil/guru', 'icon' => 'fa-solid fa-chalkboard-user', 'desc' => 'Tenaga pendidik dan kependidikan'],
    ];

    // Jurusan Dropdown Items
    $jurusanItems = [
        ['label' => 'TJKT (Jaringan)', 'url' => '/jurusan/tjkt', 'icon' => 'fa-solid fa-network-wired', 'desc' => 'Teknik Jaringan Komputer Dan telekomunikasi'],
        ['label' => 'DKV (Multimedia)', 'url' => '/jurusan/dkv', 'icon' => 'fa-solid fa-palette', 'desc' => 'Desain Komunikasi Visual'],
        ['label' => 'PM (Pemasaran)', 'url' => '/jurusan/pm', 'icon' => 'fa-solid fa-shop', 'desc' => 'Strategi penjualan & marketing'],
        ['label' => 'PS (Pekerjaan Sosial)', 'url' => '/jurusan/ps', 'icon' => 'fa-solid fa-hand-holding-heart', 'desc' => 'Pelayanan masyarakat & konseling'],
        ['label' => 'MPLB (Perkantoran)', 'url' => '/jurusan/mplb', 'icon' => 'fa-solid fa-briefcase', 'desc' => 'Manajemen Perkantoran dan Layanan Bisnis'],
    ];

    // Kesiswaan Dropdown Items
    $kesiswaanItems = [
        ['label' => 'Ekstrakurikuler', 'url' => '/kesiswaan/ekskul', 'icon' => 'fa-solid fa-futbol', 'desc' => 'Kegiatan di luar jam pelajaran'],
        ['label' => 'Prestasi Siswa', 'url' => '/kesiswaan/prestasi', 'icon' => 'fa-solid fa-trophy', 'desc' => 'Penghargaan dan pencapaian siswa'],
        ['label' => 'OSIS', 'url' => '/kesiswaan/osis', 'icon' => 'fa-solid fa-users-line', 'desc' => 'Organisasi Siswa Intra Sekolah'],
    ];
@endphp

<nav 
    x-data="{ 
        scrolled: false, 
        hover: false,
        mobileMenuOpen: false,
        profilDropdownOpen: false,
        jurusanDropdownOpen: false,
        kesiswaanDropdownOpen: false,
        searchOpen: false 
    }" 
    @scroll.window="scrolled = (window.pageYOffset > 20)"
    @mouseenter="hover = true"
    @mouseleave="hover = false"
    :class="{ 
        'bg-white shadow-md': scrolled || hover,
        'bg-transparent': !scrolled && !hover
    }"
    class="fixed top-0 left-0 w-full z-50 transition-all duration-300 ease-in-out"
>
    <!-- Centered Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-center items-center h-auto md:h-20 py-4 md:py-0 gap-4 md:gap-8">
            
            <!-- LOGO & BRANDING (Centered) -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <img 
                    src="{{ asset('images/logo-smk-utama.webp') }}" 
                    alt="Logo SMK Negeri 5 Samarinda" 
                    class="h-14 w-auto transition-all duration-300"
                >
                <div class="flex items-center gap-2">
                    <span class="text-gray-400 text-2xl font-light">|</span>
                    <span class="text-gray-900 text-lg font-bold tracking-wide">
                        SMK NEGERI 5
                    </span>
                </div>
            </a>

            <!-- DESKTOP MENU (Centered) -->
            <div class="flex items-center space-x-6 lg:space-x-8">
                
                <!-- Beranda -->
                <a 
                    href="{{ route('home') }}" 
                    class="relative group py-2 font-medium text-gray-800 hover:text-green-600 transition-colors duration-300"
                >
                    Beranda
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-green-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
                </a>

                <!-- Profil Dropdown -->
                <div class="relative" @click.away="profilDropdownOpen = false">
                    <button 
                        @click="profilDropdownOpen = !profilDropdownOpen"
                        class="flex items-center gap-1 py-2 font-medium text-gray-800 hover:text-green-600 transition-colors duration-300"
                    >
                        Profil
                        <svg 
                            :class="{ 'rotate-180': profilDropdownOpen }" 
                            class="w-4 h-4 transition-transform duration-300" 
                            fill="none" 
                            stroke="currentColor" 
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <!-- Profil Dropdown Panel -->
                    <div 
                        x-show="profilDropdownOpen"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute left-0 mt-2 w-64 rounded-lg shadow-xl bg-white overflow-hidden"
                        style="display: none;"
                    >
                        <div class="py-2">
                            @foreach($profilItems as $item)
                                <a 
                                    href="{{ $item['url'] }}" 
                                    class="flex items-start gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-green-50 hover:text-green-600 transition-colors duration-200 group"
                                >
                                    <i class="{{ $item['icon'] }} text-green-600 group-hover:text-green-700 mt-1"></i>
                                    <div class="flex-1">
                                        <div class="font-medium">{{ $item['label'] }}</div>
                                        <div class="text-xs text-gray-500 mt-0.5">{{ $item['desc'] }}</div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Jurusan Dropdown -->
                <div class="relative" @click.away="jurusanDropdownOpen = false">
                    <button 
                        @click="jurusanDropdownOpen = !jurusanDropdownOpen"
                        class="flex items-center gap-1 py-2 font-medium text-gray-800 hover:text-green-600 transition-colors duration-300"
                    >
                        Jurusan
                        <svg 
                            :class="{ 'rotate-180': jurusanDropdownOpen }" 
                            class="w-4 h-4 transition-transform duration-300" 
                            fill="none" 
                            stroke="currentColor" 
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <!-- Dropdown Panel -->
                    <div 
                        x-show="jurusanDropdownOpen"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute left-0 mt-2 w-80 rounded-lg shadow-xl bg-white overflow-hidden"
                        style="display: none;"
                    >
                        <div class="py-2">
                            @foreach($jurusanItems as $jurusan)
                                <a 
                                    href="{{ $jurusan['url'] }}" 
                                    class="flex items-start gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-green-50 hover:text-green-600 transition-colors duration-200 group"
                                >
                                    <i class="{{ $jurusan['icon'] }} text-green-600 group-hover:text-green-700 mt-1"></i>
                                    <div class="flex-1">
                                        <div class="font-medium">{{ $jurusan['label'] }}</div>
                                        <div class="text-xs text-gray-500 mt-0.5">{{ $jurusan['desc'] }}</div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Kesiswaan Dropdown -->
                <div class="relative" @click.away="kesiswaanDropdownOpen = false">
                    <button 
                        @click="kesiswaanDropdownOpen = !kesiswaanDropdownOpen"
                        class="flex items-center gap-1 py-2 font-medium text-gray-800 hover:text-green-600 transition-colors duration-300"
                    >
                        Kesiswaan
                        <svg 
                            :class="{ 'rotate-180': kesiswaanDropdownOpen }" 
                            class="w-4 h-4 transition-transform duration-300" 
                            fill="none" 
                            stroke="currentColor" 
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <!-- Kesiswaan Dropdown Panel -->
                    <div 
                        x-show="kesiswaanDropdownOpen"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute left-0 mt-2 w-64 rounded-lg shadow-xl bg-white overflow-hidden"
                        style="display: none;"
                    >
                        <div class="py-2">
                            @foreach($kesiswaanItems as $item)
                                <a 
                                    href="{{ $item['url'] }}" 
                                    class="flex items-start gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-green-50 hover:text-green-600 transition-colors duration-200 group"
                                >
                                    <i class="{{ $item['icon'] }} text-green-600 group-hover:text-green-700 mt-1"></i>
                                    <div class="flex-1">
                                        <div class="font-medium">{{ $item['label'] }}</div>
                                        <div class="text-xs text-gray-500 mt-0.5">{{ $item['desc'] }}</div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Berita (TANPA IKON) -->
                <a 
                    href="{{ route('berita.index') }}" 
                    class="relative group py-2 font-medium text-gray-800 hover:text-green-600 transition-colors duration-300"
                >
                    Berita
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-green-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
                </a>

                <!-- Kontak (TANPA IKON) -->
                <a 
                    href="/kontak" 
                    class="relative group py-2 font-medium text-gray-800 hover:text-green-600 transition-colors duration-300"
                >
                    Kontak
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-green-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
                </a>

                <!-- Expandable Search Bar -->
                <div class="relative flex items-center" x-data="{ localSearchOpen: searchOpen }" @click.away="searchOpen = false; localSearchOpen = false">
                    <!-- Search Form -->
                    <form 
                        action="{{ route('berita.index') }}" 
                        method="GET" 
                        class="flex items-center"
                        x-show="searchOpen"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 -translate-x-4"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-x-0"
                        x-transition:leave-end="opacity-0 -translate-x-4"
                        style="display: none;"
                    >
                        <input 
                            type="text" 
                            name="q" 
                            placeholder="Cari berita..."
                            class="w-48 px-4 py-1.5 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-green-500 border border-gray-300 text-gray-700 placeholder-gray-400 bg-white/90 transition-colors duration-300"
                            x-ref="searchInput"
                        >
                    </form>

                    <!-- Search Icon Button -->
                    <button 
                        @click="searchOpen = !searchOpen; $nextTick(() => { if(searchOpen) $refs.searchInput.focus() })"
                        class="p-2 text-gray-800 hover:text-green-600 transition-colors duration-300"
                        :aria-label="searchOpen ? 'Close search' : 'Open search'"
                    >
                        <i class="fa-solid fa-magnifying-glass text-lg"></i>
                    </button>
                </div>

            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button 
                    @click="mobileMenuOpen = !mobileMenuOpen" 
                    class="text-gray-800 focus:outline-none"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- MOBILE MENU -->
    <div 
        x-show="mobileMenuOpen" 
        x-transition 
        :class="(scrolled || hover) ? 'bg-white' : 'bg-gray-900/95'"
        class="md:hidden shadow-lg absolute w-full left-0 top-full backdrop-blur-sm"
        style="display: none;"
    >
        <div class="flex flex-col px-4 py-4 space-y-3">
            <!-- Beranda -->
            <a href="{{ route('home') }}" :class="(scrolled || hover) ? 'text-gray-700 hover:text-green-600' : 'text-white hover:text-green-300'" class="py-2 transition">Beranda</a>
            
            <!-- Mobile Profil Dropdown -->
            <div x-data="{ mobileProfilOpen: false }">
                <button 
                    @click="mobileProfilOpen = !mobileProfilOpen"
                    :class="(scrolled || hover) ? 'text-gray-700' : 'text-white'"
                    class="w-full flex justify-between items-center py-2"
                >
                    <span>Profil</span>
                    <svg 
                        :class="{ 'rotate-180': mobileProfilOpen }" 
                        class="w-4 h-4 transition-transform" 
                        fill="none" 
                        stroke="currentColor" 
                        viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="mobileProfilOpen" x-transition class="pl-4 space-y-2 mt-2">
                    @foreach($profilItems as $item)
                        <a 
                            href="{{ $item['url'] }}" 
                            :class="(scrolled || hover) ? 'text-gray-600 hover:text-green-600' : 'text-gray-300 hover:text-green-300'"
                            class="flex items-center gap-2 py-1.5 text-sm transition"
                        >
                            <i class="{{ $item['icon'] }} text-green-600 text-sm"></i>
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>
            
            <!-- Mobile Jurusan Dropdown -->
            <div x-data="{ mobileJurusanOpen: false }">
                <button 
                    @click="mobileJurusanOpen = !mobileJurusanOpen"
                    :class="(scrolled || hover) ? 'text-gray-700' : 'text-white'"
                    class="w-full flex justify-between items-center py-2"
                >
                    <span>Jurusan</span>
                    <svg 
                        :class="{ 'rotate-180': mobileJurusanOpen }" 
                        class="w-4 h-4 transition-transform" 
                        fill="none" 
                        stroke="currentColor" 
                        viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="mobileJurusanOpen" x-transition class="pl-4 space-y-2 mt-2">
                    @foreach($jurusanItems as $jurusan)
                        <a 
                            href="{{ $jurusan['url'] }}" 
                            :class="(scrolled || hover) ? 'text-gray-600 hover:text-green-600' : 'text-gray-300 hover:text-green-300'"
                            class="flex items-center gap-2 py-1.5 text-sm transition"
                        >
                            <i class="{{ $jurusan['icon'] }} text-green-600 text-sm"></i>
                            {{ $jurusan['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>
            
            <!-- Mobile Kesiswaan Dropdown -->
            <div x-data="{ mobileKesiswaanOpen: false }">
                <button 
                    @click="mobileKesiswaanOpen = !mobileKesiswaanOpen"
                    :class="(scrolled || hover) ? 'text-gray-700' : 'text-white'"
                    class="w-full flex justify-between items-center py-2"
                >
                    <span>Kesiswaan</span>
                    <svg 
                        :class="{ 'rotate-180': mobileKesiswaanOpen }" 
                        class="w-4 h-4 transition-transform" 
                        fill="none" 
                        stroke="currentColor" 
                        viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="mobileKesiswaanOpen" x-transition class="pl-4 space-y-2 mt-2">
                    @foreach($kesiswaanItems as $item)
                        <a 
                            href="{{ $item['url'] }}" 
                            :class="(scrolled || hover) ? 'text-gray-600 hover:text-green-600' : 'text-gray-300 hover:text-green-300'"
                            class="flex items-center gap-2 py-1.5 text-sm transition"
                        >
                            <i class="{{ $item['icon'] }} text-green-600 text-sm"></i>
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>
            
            <a href="{{ route('berita.index') }}" :class="(scrolled || hover) ? 'text-gray-700 hover:text-green-600' : 'text-white hover:text-green-300'" class="py-2 transition">Berita</a>
            <a href="/kontak" :class="(scrolled || hover) ? 'text-gray-700 hover:text-green-600' : 'text-white hover:text-green-300'" class="py-2 transition">Kontak</a>
        </div>
    </div>
</nav>
