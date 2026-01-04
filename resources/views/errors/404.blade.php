<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 - Halaman Tidak Ditemukan</title>
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Custom Styles -->
    <style>
        /* Prevent scrolling on entire page */
        body, html {
            margin: 0;
            padding: 0;
            overflow: hidden;
            height: 100%;
            width: 100%;
        }
        
        /* Optional: Very subtle floating animation */
        @keyframes subtle-float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }
        
        .animate-subtle-float {
            animation: subtle-float 4s ease-in-out infinite;
        }
    </style>
</head>
<body class="overflow-hidden bg-white">
    
    <!-- Full Screen Container - NO SCROLL -->
    <div class="w-screen h-screen overflow-hidden bg-white flex flex-col items-center justify-center px-4">
        
        <!-- Chibi Illustration -->
        <div class="animate-subtle-float">
            <img 
                src="{{ asset('images/404-chibi.webp') }}" 
                alt="404 Not Found" 
                class="w-64 md:w-80 h-auto mb-4 object-contain"
            >
        </div>
        
        <!-- 404 Headline -->
        <h1 class="font-black text-6xl md:text-7xl text-gray-900 text-center">
            404
        </h1>
        
        <!-- Subheadline -->
        <p class="text-gray-500 mt-2 text-center text-base md:text-lg">
            Halaman tidak ditemukan.
        </p>
        
        <!-- Back Button -->
        <a 
            href="{{ url('/') }}" 
            class="mt-6 px-6 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition text-sm font-medium"
        >
            Kembali
        </a>
        
    </div>
    
</body>
</html>
