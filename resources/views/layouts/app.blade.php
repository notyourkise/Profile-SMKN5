<!DOCTYPE html>
<html lang="id" class="scroll-smooth scroll-pt-20">
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
    
    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- Additional Styles Stack --}}
    @stack('styles')
    
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

    <!-- Footer Component -->
    <x-footer />
    
    {{-- Additional Scripts Stack --}}
    @stack('scripts')
</body>
</html>
