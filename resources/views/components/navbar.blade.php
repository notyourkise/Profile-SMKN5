<nav 
    x-data="{ scrolled: false, mobileMenuOpen: false }" 
    @scroll.window="scrolled = (window.pageYOffset > 20)"
    :class="{ 
        'shadow-md': scrolled
    }"
    class="fixed top-0 left-0 w-full z-50 bg-white text-gray-800 dark:bg-gray-900 dark:text-white transition-all duration-300 ease-in-out"
>
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-20">
            
            <!-- 
                LOGO SECTION 
                Place your logo image or text here.
            -->
            <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                <!-- Example Logo Placeholder -->
                <div class="text-2xl font-bold tracking-wider uppercase">
                    SMKN 5
                </div>
            </a>

            <!-- 
                DESKTOP MENU ITEMS 
                Add your navigation links here.
            -->
            <div class="hidden md:flex items-center space-x-8">
                @foreach([
                    ['label' => 'Beranda', 'route' => 'home'],
                    ['label' => 'Jurusan', 'route' => 'jurusan.index'],
                    ['label' => 'Berita', 'route' => 'berita.index'],
                    // Add more menu items here
                ] as $item)
                    <a href="{{ route($item['route']) }}" class="relative group py-2 font-medium transition-colors duration-300">
                        <!-- Text with hover color change to GREEN -->
                        <span class="group-hover:text-green-600 dark:group-hover:text-green-500 transition-colors duration-300">
                            {{ $item['label'] }}
                        </span>
                        
                        <!-- 
                            The "Center-Out" Underline (GREEN ACCENT)
                            - absolute positioning relative to the link
                            - starts with scale-x-0 (invisible)
                            - grows to scale-x-100 on group hover
                            - origin-center ensures it grows from the middle out
                        -->
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-green-600 dark:bg-green-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
                    </a>
                @endforeach

                <!-- Dark Mode Toggle (Optional integration) -->
                <button 
                    @click="
                        if (localStorage.getItem('theme') === 'dark') {
                            document.documentElement.classList.remove('dark');
                            localStorage.setItem('theme', 'light');
                        } else {
                            document.documentElement.classList.add('dark');
                            localStorage.setItem('theme', 'dark');
                        }
                    "
                    type="button" 
                    class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition"
                >
                    <!-- Moon icon for dark mode -->
                    <svg class="hidden dark:block w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <!-- Sun icon for light mode -->
                    <svg class="block dark:hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu (Simple implementation) -->
    <div 
        x-show="mobileMenuOpen" 
        x-transition 
        class="md:hidden bg-white dark:bg-gray-900 shadow-lg absolute w-full left-0 top-full"
        style="display: none;"
    >
        <div class="flex flex-col px-4 py-4 space-y-4 text-gray-800 dark:text-white">
            <a href="{{ route('home') }}" class="hover:text-green-600 dark:hover:text-green-500 transition">Beranda</a>
            <a href="{{ route('jurusan.index') }}" class="hover:text-green-600 dark:hover:text-green-500 transition">Jurusan</a>
            <a href="{{ route('berita.index') }}" class="hover:text-green-600 dark:hover:text-green-500 transition">Berita</a>
        </div>
    </div>
</nav>
