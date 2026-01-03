<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMKN 5 Samarinda')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/webp" href="{{ asset('images/logo-smk-utama.webp') }}">
    <link rel="shortcut icon" type="image/webp" href="{{ asset('images/logo-smk-utama.webp') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo-smk-utama.webp') }}">
    
    <!-- FontAwesome 6 Free CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        // Dark mode initialization
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>
<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-200">
    <!-- Scroll-Aware Navbar Component -->
    <x-navbar />
    
    <!-- Spacer for fixed navbar (only needed if first section doesn't have full height) -->
    <div class="h-20"></div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 dark:bg-gray-950 text-white mt-16 transition-colors duration-200">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-bold mb-4">SMKN 5 Samarinda</h3>
                    <p class="text-gray-400 dark:text-gray-500">Sekolah Menengah Kejuruan Negeri 5 Samarinda</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Menu</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-400 dark:text-gray-500 hover:text-white">Beranda</a></li>
                        <li><a href="{{ route('jurusan.index') }}" class="text-gray-400 dark:text-gray-500 hover:text-white">Jurusan</a></li>
                        <li><a href="{{ route('berita.index') }}" class="text-gray-400 dark:text-gray-500 hover:text-white">Berita</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Kontak</h3>
                    <p class="text-gray-400 dark:text-gray-500">Email: info@smkn5samarinda.sch.id</p>
                    <p class="text-gray-400 dark:text-gray-500">Telp: (0541) 123456</p>
                </div>
            </div>
            <div class="border-t border-gray-700 dark:border-gray-800 mt-8 pt-8 text-center text-gray-400 dark:text-gray-500">
                <p>&copy; {{ date('Y') }} SMKN 5 Samarinda. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
