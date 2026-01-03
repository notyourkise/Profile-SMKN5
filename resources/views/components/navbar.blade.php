@php
    // Fetch dynamic menus from database
    $menus = \App\Models\Menu::parents()->active()->with('activeChildren')->get();
@endphp

<nav 
    x-data="{ scrolled: false, mobileMenuOpen: false, openDropdown: null }" 
    @scroll.window="scrolled = (window.pageYOffset > 20)"
    @click.away="openDropdown = null"
    :class="{ 
        'shadow-md': scrolled
    }"
    class="fixed top-0 left-0 w-full z-50 bg-white text-gray-800 dark:bg-gray-900 dark:text-white transition-all duration-300 ease-in-out"
>
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-20">
            
            <!-- LOGO SECTION -->
            <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                <div class="text-2xl font-bold tracking-wider uppercase">
                    SMKN 5
                </div>
            </a>

            <!-- DESKTOP MENU ITEMS (Dynamic) -->
            <div class="hidden md:flex items-center space-x-8">
                @foreach($menus as $menu)
                    @if($menu->type === 'dropdown' && $menu->activeChildren->count() > 0)
                        <!-- DROPDOWN MENU -->
                        <div class="relative" x-data="{ open: false }">
                            <button 
                                @click="open = !open; openDropdown = open ? {{ $menu->id }} : null"
                                :class="{ 'text-green-600 dark:text-green-500': open }"
                                class="relative group py-2 font-medium transition-colors duration-300 flex items-center gap-1"
                            >
                                <span class="group-hover:text-green-600 dark:group-hover:text-green-500 transition-colors duration-300">
                                    {{ $menu->title }}
                                </span>
                                <!-- Dropdown Arrow -->
                                <svg 
                                    :class="{ 'rotate-180': open }" 
                                    class="w-4 h-4 transition-transform duration-300" 
                                    fill="none" 
                                    stroke="currentColor" 
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-green-600 dark:bg-green-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
                            </button>

                            <!-- Dropdown Panel -->
                            <div 
                                x-show="open"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
                                @click.away="open = false"
                                class="absolute left-0 mt-2 w-56 rounded-lg shadow-xl bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 overflow-hidden"
                                style="display: none;"
                            >
                                <div class="py-2">
                                    @foreach($menu->activeChildren as $child)
                                        <a 
                                            href="{{ $child->url }}" 
                                            @if($child->open_new_tab) target="_blank" rel="noopener noreferrer" @endif
                                            class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-green-50 dark:hover:bg-gray-700 hover:text-green-600 dark:hover:text-green-500 transition-colors duration-200"
                                        >
                                            {{ $child->title }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- REGULAR LINK -->
                        <a 
                            href="{{ $menu->url }}" 
                            @if($menu->open_new_tab) target="_blank" rel="noopener noreferrer" @endif
                            class="relative group py-2 font-medium transition-colors duration-300"
                        >
                            <span class="group-hover:text-green-600 dark:group-hover:text-green-500 transition-colors duration-300">
                                {{ $menu->title }}
                            </span>
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-green-600 dark:bg-green-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
                        </a>
                    @endif
                @endforeach

                <!-- Dark Mode Toggle -->
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
                    <svg class="hidden dark:block w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
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

    <!-- MOBILE MENU (Dynamic) -->
    <div 
        x-show="mobileMenuOpen" 
        x-transition 
        class="md:hidden bg-white dark:bg-gray-900 shadow-lg absolute w-full left-0 top-full"
        style="display: none;"
    >
        <div class="flex flex-col px-4 py-4 space-y-2 text-gray-800 dark:text-white">
            @foreach($menus as $menu)
                @if($menu->type === 'dropdown' && $menu->activeChildren->count() > 0)
                    <!-- Mobile Dropdown -->
                    <div x-data="{ mobileOpen: false }">
                        <button 
                            @click="mobileOpen = !mobileOpen"
                            class="w-full flex justify-between items-center py-2 hover:text-green-600 dark:hover:text-green-500 transition"
                        >
                            <span>{{ $menu->title }}</span>
                            <svg 
                                :class="{ 'rotate-180': mobileOpen }" 
                                class="w-4 h-4 transition-transform" 
                                fill="none" 
                                stroke="currentColor" 
                                viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="mobileOpen" x-transition class="pl-4 space-y-2 mt-2">
                            @foreach($menu->activeChildren as $child)
                                <a 
                                    href="{{ $child->url }}" 
                                    @if($child->open_new_tab) target="_blank" rel="noopener noreferrer" @endif
                                    class="block py-1.5 text-sm hover:text-green-600 dark:hover:text-green-500 transition"
                                >
                                    {{ $child->title }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <!-- Mobile Regular Link -->
                    <a 
                        href="{{ $menu->url }}" 
                        @if($menu->open_new_tab) target="_blank" rel="noopener noreferrer" @endif
                        class="py-2 hover:text-green-600 dark:hover:text-green-500 transition"
                    >
                        {{ $menu->title }}
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</nav>
