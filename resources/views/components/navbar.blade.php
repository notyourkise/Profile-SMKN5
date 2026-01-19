@php
    // Check if current page is homepage
    $isHomepage = request()->routeIs('home');

    // Profil Dropdown Items
    $profilItems = [
        ['label' => 'Tentang SMK 5', 'route' => 'profil.tentang', 'icon' => 'fa-solid fa-school', 'desc' => 'Sejarah, visi misi, dan profil sekolah'],
        ['label' => 'Unit & Pegawai', 'route' => 'profil.unit', 'icon' => 'fa-solid fa-users', 'desc' => 'Daftar unit kerja dan kepegawaian'],
        ['label' => 'Struktur Organisasi', 'route' => 'profil.struktur', 'icon' => 'fa-solid fa-sitemap', 'desc' => 'Bagan struktur organisasi sekolah'],
    ];

    // Get Jurusan from Database (Active Only)
    $jurusanList = \App\Models\Jurusan::where('is_active', true)
        ->orderBy('kode')
        ->get();
    
    // Icon mapping based on kode
    $iconMapping = [
        'TJKT' => 'fa-solid fa-network-wired',
        'DKV' => 'fa-solid fa-palette',
        'PM' => 'fa-solid fa-shop',
        'PS' => 'fa-solid fa-hand-holding-heart',
        'MPLB' => 'fa-solid fa-briefcase',
        'default' => 'fa-solid fa-graduation-cap'
    ];
    
    // Short description mapping
    $descMapping = [
        'TJKT' => 'Jaringan & Telekomunikasi',
        'DKV' => 'Desain Grafis & Multimedia',
        'PM' => 'Strategi Penjualan',
        'PS' => 'Pelayanan Masyarakat',
        'MPLB' => 'Administrasi Perkantoran',
    ];

    $jurusanItems = $jurusanList->map(function($j) use ($iconMapping, $descMapping) {
        $icon = $iconMapping[strtoupper($j->kode)] ?? $iconMapping['default'];
        $desc = $descMapping[strtoupper($j->kode)] ?? 'Program Keahlian';
        
        return [
            'label' => $j->kode . ' - ' . $j->nama,
            'url' => route('jurusan.show', $j->kode),
            'icon' => $icon,
            'desc' => $desc
        ];
    })->toArray();

    // Kesiswaan Dropdown Items - Simplified: Only Ekstrakurikuler
    $kesiswaanItems = [
        ['label' => 'Ekstrakurikuler', 'url' => '/kesiswaan/ekskul', 'icon' => 'fa-solid fa-futbol', 'desc' => 'Kegiatan di luar jam pelajaran'],
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
        searchOpen: false,
        isHomepage: {{ $isHomepage ? 'true' : 'false' }}
    }" 
    @scroll.window="scrolled = (window.pageYOffset > 20)"
    @mouseenter="hover = true"
    @mouseleave="hover = false"
    @class([
        'fixed top-0 left-0 w-full z-50 transition-all duration-300 ease-in-out',
        'bg-white shadow-md' => !$isHomepage
    ])
    :class="isHomepage ? { 
        'bg-white shadow-md': scrolled || hover,
        'bg-transparent': !scrolled && !hover
    } : {}"
>
    <!-- Centered Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-row justify-between md:justify-center items-center h-16 md:h-20 gap-4 md:gap-8">
            
            <!-- LOGO & BRANDING -->
            <a href="{{ route('home') }}" class="flex items-center gap-2 md:gap-3 group">
                <img 
                    src="{{ asset('images/logo-smk-utama.webp') }}" 
                    alt="Logo SMK Negeri 5 Samarinda" 
                    class="h-10 md:h-14 w-auto transition-all duration-300"
                >
                <div class="flex items-center gap-1 md:gap-2">
                    <span 
                        :class="isHomepage ? ((scrolled || hover) ? 'text-gray-400' : 'text-white/60 drop-shadow-md') : 'text-gray-400'" 
                        class="text-xl md:text-2xl font-light transition-all duration-300"
                    >|</span>
                    <span 
                        :class="isHomepage ? ((scrolled || hover) ? 'text-gray-900' : 'text-white drop-shadow-md') : 'text-gray-900'" 
                        class="text-sm md:text-lg font-bold tracking-wide transition-all duration-300"
                    >
                        SMK NEGERI 5
                    </span>
                </div>
            </a>

            <!-- DESKTOP MENU (Centered, Hidden on Mobile) -->
            <div class="hidden md:flex items-center space-x-6 lg:space-x-8">
                
                <!-- Beranda -->
                <a 
                    href="{{ route('home') }}" 
                    :class="isHomepage ? ((scrolled || hover) ? 'text-gray-900 hover:text-green-600' : 'text-white hover:text-green-400 drop-shadow-md') : 'text-gray-900 hover:text-green-600'"
                    class="relative group py-2 font-medium transition-all duration-300"
                >
                    Beranda
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-green-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
                </a>

                <!-- Profil Dropdown -->
                <div class="relative z-[60]" @click.away="profilDropdownOpen = false">
                    <button 
                        @click="profilDropdownOpen = !profilDropdownOpen"
                        :class="isHomepage ? ((scrolled || hover) ? 'text-gray-900 hover:text-green-600' : 'text-white hover:text-green-400 drop-shadow-md') : 'text-gray-900 hover:text-green-600'"
                        class="flex items-center gap-1 py-2 font-medium transition-all duration-300"
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
                                    href="{{ route($item['route']) }}" 
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
                <div class="relative z-[60]" @click.away="jurusanDropdownOpen = false">
                    <button 
                        @click="jurusanDropdownOpen = !jurusanDropdownOpen"
                        :class="isHomepage ? ((scrolled || hover) ? 'text-gray-900 hover:text-green-600' : 'text-white hover:text-green-400 drop-shadow-md') : 'text-gray-900 hover:text-green-600'"
                        class="flex items-center gap-1 py-2 font-medium transition-all duration-300"
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
                <div class="relative z-[60]" @click.away="kesiswaanDropdownOpen = false">
                    <button 
                        @click="kesiswaanDropdownOpen = !kesiswaanDropdownOpen"
                        :class="isHomepage ? ((scrolled || hover) ? 'text-gray-900 hover:text-green-600' : 'text-white hover:text-green-400 drop-shadow-md') : 'text-gray-900 hover:text-green-600'"
                        class="flex items-center gap-1 py-2 font-medium transition-all duration-300"
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
                    :class="isHomepage ? ((scrolled || hover) ? 'text-gray-900 hover:text-green-600' : 'text-white hover:text-green-400 drop-shadow-md') : 'text-gray-900 hover:text-green-600'"
                    class="relative group py-2 font-medium transition-all duration-300"
                >
                    Berita
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-green-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
                </a>

                <!-- Kontak (TANPA IKON) -->
                <a 
                    href="#footer" 
                    :class="isHomepage ? ((scrolled || hover) ? 'text-gray-900 hover:text-green-600' : 'text-white hover:text-green-400 drop-shadow-md') : 'text-gray-900 hover:text-green-600'"
                    class="relative group py-2 font-medium transition-all duration-300"
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
                            :class="isHomepage ? ((scrolled || hover) ? 'border-gray-300 text-gray-700 placeholder-gray-400 bg-white' : 'border-white/30 text-white placeholder-white/70 bg-white/10 backdrop-blur-sm') : 'border-gray-300 text-gray-700 placeholder-gray-400 bg-white'"
                            class="w-48 px-4 py-1.5 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-green-500 border transition-all duration-300"
                            x-ref="searchInput"
                        >
                    </form>

                    <!-- Search Icon Button -->
                    <button 
                        @click="searchOpen = !searchOpen; $nextTick(() => { if(searchOpen) $refs.searchInput.focus() })"
                        :class="isHomepage ? ((scrolled || hover) ? 'text-gray-900 hover:text-green-600' : 'text-white hover:text-green-400 drop-shadow-md') : 'text-gray-900 hover:text-green-600'"
                        class="p-2 transition-all duration-300"
                        :aria-label="searchOpen ? 'Close search' : 'Open search'"
                    >
                        <i class="fa-solid fa-magnifying-glass text-lg"></i>
                    </button>
                </div>

            </div>

            <!-- Mobile Hamburger Button (Right Side) -->
            <button 
                @click="mobileMenuOpen = true" 
                :class="isHomepage ? ((scrolled || hover) ? 'text-gray-900' : 'text-white drop-shadow-md') : 'text-gray-900'"
                class="md:hidden p-2 focus:outline-none transition-all duration-300"
                aria-label="Open Menu"
            >
                <i class="fa-solid fa-bars text-2xl"></i>
            </button>
        </div>
    </div>

    <!-- MOBILE SIDEBAR DRAWER -->
    <div 
        x-show="mobileMenuOpen" 
        @click="mobileMenuOpen = false"
        x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm md:hidden"
        style="display: none;"
    >
        <!-- Sidebar Panel (Slide from Right) -->
        <div 
            @click.stop
            x-show="mobileMenuOpen"
            x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="absolute right-0 top-0 h-full w-80 bg-white shadow-2xl overflow-y-auto"
        >
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                <div class="flex items-center gap-3">
                    <img 
                        src="{{ asset('images/logo-smk-utama.webp') }}" 
                        alt="Logo SMKN 5" 
                        class="h-10 w-auto"
                    >
                    <span class="text-lg font-bold text-gray-900">SMK NEGERI 5</span>
                </div>
                <button 
                    @click="mobileMenuOpen = false" 
                    class="p-2 text-gray-500 hover:text-gray-700 transition-colors"
                    aria-label="Close Menu"
                >
                    <i class="fa-solid fa-xmark text-2xl"></i>
                </button>
            </div>
            
            <!-- Sidebar Menu Items -->
            <div class="flex flex-col p-6 space-y-1">
                <!-- Beranda -->
                <a 
                    href="{{ route('home') }}" 
                    class="flex items-center gap-3 py-3 px-4 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg transition-colors text-base font-medium"
                >
                    <i class="fa-solid fa-home w-5"></i>
                    <span>Beranda</span>
                </a>
                
                <!-- Profil Dropdown -->
                <div x-data="{ mobileProfilOpen: false }">
                    <button 
                        @click="mobileProfilOpen = !mobileProfilOpen"
                        class="w-full flex items-center justify-between py-3 px-4 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors text-base font-medium"
                    >
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-building-columns w-5"></i>
                            <span>Profil</span>
                        </div>
                        <i class="fa-solid fa-chevron-down text-sm transition-transform" :class="{ 'rotate-180': mobileProfilOpen }"></i>
                    </button>
                    <div x-show="mobileProfilOpen" x-transition class="pl-8 mt-1 space-y-1">
                        @foreach($profilItems as $item)
                            <a 
                                href="{{ route($item['route']) }}" 
                                class="flex items-center gap-3 py-2 px-4 text-gray-600 hover:text-green-600 rounded-lg transition-colors text-sm"
                            >
                                <i class="{{ $item['icon'] }} text-green-600 w-4 text-xs"></i>
                                <span>{{ $item['label'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
                
                <!-- Jurusan Dropdown -->
                <div x-data="{ mobileJurusanOpen: false }">
                    <button 
                        @click="mobileJurusanOpen = !mobileJurusanOpen"
                        class="w-full flex items-center justify-between py-3 px-4 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors text-base font-medium"
                    >
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-graduation-cap w-5"></i>
                            <span>Jurusan</span>
                        </div>
                        <i class="fa-solid fa-chevron-down text-sm transition-transform" :class="{ 'rotate-180': mobileJurusanOpen }"></i>
                    </button>
                    <div x-show="mobileJurusanOpen" x-transition class="pl-8 mt-1 space-y-1">
                        @foreach($jurusanItems as $jurusan)
                            <a 
                                href="{{ $jurusan['url'] }}" 
                                class="flex items-center gap-3 py-2 px-4 text-gray-600 hover:text-green-600 rounded-lg transition-colors text-sm"
                            >
                                <i class="{{ $jurusan['icon'] }} text-green-600 w-4 text-xs"></i>
                                <span>{{ $jurusan['label'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
                
                <!-- Kesiswaan Dropdown -->
                <div x-data="{ mobileKesiswaanOpen: false }">
                    <button 
                        @click="mobileKesiswaanOpen = !mobileKesiswaanOpen"
                        class="w-full flex items-center justify-between py-3 px-4 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors text-base font-medium"
                    >
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-users w-5"></i>
                            <span>Kesiswaan</span>
                        </div>
                        <i class="fa-solid fa-chevron-down text-sm transition-transform" :class="{ 'rotate-180': mobileKesiswaanOpen }"></i>
                    </button>
                    <div x-show="mobileKesiswaanOpen" x-transition class="pl-8 mt-1 space-y-1">
                        @foreach($kesiswaanItems as $item)
                            <a 
                                href="{{ $item['url'] }}" 
                                class="flex items-center gap-3 py-2 px-4 text-gray-600 hover:text-green-600 rounded-lg transition-colors text-sm"
                            >
                                <i class="{{ $item['icon'] }} text-green-600 w-4 text-xs"></i>
                                <span>{{ $item['label'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
                
                <!-- Berita -->
                <a 
                    href="{{ route('berita.index') }}" 
                    class="flex items-center gap-3 py-3 px-4 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg transition-colors text-base font-medium"
                >
                    <i class="fa-solid fa-newspaper w-5"></i>
                    <span>Berita</span>
                </a>
                
                <!-- Kontak -->
                <a 
                    href="#footer" 
                    class="flex items-center gap-3 py-3 px-4 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg transition-colors text-base font-medium"
                >
                    <i class="fa-solid fa-envelope w-5"></i>
                    <span>Kontak</span>
                </a>
            </div>
            
            <!-- Sidebar Footer -->
            <div class="p-6 border-t border-gray-200 mt-auto">
                <p class="text-xs text-gray-500 text-center">
                    &copy; {{ date('Y') }} SMK Negeri 5 Samarinda
                </p>
            </div>
        </div>
    </div>
</nav>
