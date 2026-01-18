@extends('layouts.app')

@section('content')
    {{-- 1. HEADER SECTION --}}
    <section class="bg-[#1e5494] pt-20 pb-24 text-center text-white relative">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-2">Unit & Kepegawaian</h1>
            <p class="text-blue-100">Daftar unit kerja dan staf SMKN 5 Samarinda</p>
        </div>
    </section>

    {{-- 2. TOGGLE MENU (PILL TABS) --}}
    {{-- Posisi overlap ke atas sedikit (-mt-8) agar terlihat menyatu --}}
    <div class="container mx-auto px-4 relative z-10 -mt-8">
        <div class="flex flex-wrap justify-center gap-2 md:gap-4 bg-white p-2 rounded-full shadow-lg max-w-4xl mx-auto border border-gray-100">
            <button onclick="switchTab('tu')" id="btn-tu" 
                class="px-6 py-2 rounded-full text-sm md:text-base font-bold transition-all duration-300 bg-[#1e5494] text-white shadow-md">
                Tata Usaha
            </button>
            
            <button onclick="switchTab('lib')" id="btn-lib" 
                class="px-6 py-2 rounded-full text-sm md:text-base font-bold transition-all duration-300 text-slate-500 hover:bg-slate-100">
                Perpustakaan
            </button>
            
            <button onclick="switchTab('lab')" id="btn-lab" 
                class="px-6 py-2 rounded-full text-sm md:text-base font-bold transition-all duration-300 text-slate-500 hover:bg-slate-100">
                Laboratorium
            </button>
            
            <button onclick="switchTab('up')" id="btn-up" 
                class="px-6 py-2 rounded-full text-sm md:text-base font-bold transition-all duration-300 text-slate-500 hover:bg-slate-100">
                Unit Produksi
            </button>
        </div>
    </div>

    {{-- 3. CONTENT SECTIONS --}}
    <section class="container mx-auto px-4 py-16 max-w-5xl min-h-[400px]">
        
        {{-- KONTEN TATA USAHA (Default Visible) --}}
        <div id="content-tu" class="tab-content transition-opacity duration-500">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-slate-800 mb-4">Tata Usaha</h2>
                <p class="text-slate-600 max-w-2xl mx-auto">
                    Pusat pelayanan administrasi sekolah, pengelolaan keuangan, data pendidik, dan persuratan resmi SMKN 5 Samarinda.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl shadow border border-slate-100 flex items-center gap-4">
                    <div class="w-16 h-16 bg-slate-200 rounded-full flex-shrink-0"></div>
                    <div>
                        <h4 class="font-bold text-slate-800">Budi Santoso</h4>
                        <p class="text-xs text-[#1e5494] font-bold uppercase">Kepala Tata Usaha</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow border border-slate-100 flex items-center gap-4">
                    <div class="w-16 h-16 bg-slate-200 rounded-full flex-shrink-0"></div>
                    <div>
                        <h4 class="font-bold text-slate-800">Siti Aminah</h4>
                        <p class="text-xs text-[#1e5494] font-bold uppercase">Administrasi Umum</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- KONTEN PERPUSTAKAAN (Hidden) --}}
        <div id="content-lib" class="tab-content hidden transition-opacity duration-500">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-slate-800 mb-4">Perpustakaan Digital</h2>
                <p class="text-slate-600 max-w-2xl mx-auto">
                    Fasilitas literasi modern yang menyediakan koleksi buku fisik dan e-book untuk menunjang pembelajaran siswa.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl shadow border border-slate-100 flex items-center gap-4">
                    <div class="w-16 h-16 bg-slate-200 rounded-full flex-shrink-0"></div>
                    <div>
                        <h4 class="font-bold text-slate-800">Rina Wati</h4>
                        <p class="text-xs text-[#1e5494] font-bold uppercase">Kepala Perpustakaan</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow border border-slate-100 flex items-center gap-4">
                    <div class="w-16 h-16 bg-slate-200 rounded-full flex-shrink-0"></div>
                    <div>
                        <h4 class="font-bold text-slate-800">Joko Susilo</h4>
                        <p class="text-xs text-[#1e5494] font-bold uppercase">Pustakawan</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- KONTEN LABORATORIUM (Hidden) --}}
        <div id="content-lab" class="tab-content hidden transition-opacity duration-500">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-slate-800 mb-4">Laboratorium Komputer</h2>
                <p class="text-slate-600 max-w-2xl mx-auto">
                    Pusat praktikum kejuruan Desain Komunikasi Visual (DKV) dan Rekayasa Perangkat Lunak (RPL).
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl shadow border border-slate-100 flex items-center gap-4">
                    <div class="w-16 h-16 bg-slate-200 rounded-full flex-shrink-0"></div>
                    <div>
                        <h4 class="font-bold text-slate-800">Ahmad Rizki</h4>
                        <p class="text-xs text-[#1e5494] font-bold uppercase">Kepala Lab</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow border border-slate-100 flex items-center gap-4">
                    <div class="w-16 h-16 bg-slate-200 rounded-full flex-shrink-0"></div>
                    <div>
                        <h4 class="font-bold text-slate-800">Dedi Kurniawan</h4>
                        <p class="text-xs text-[#1e5494] font-bold uppercase">Teknisi Lab</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- KONTEN UNIT PRODUKSI (Hidden) --}}
        <div id="content-up" class="tab-content hidden transition-opacity duration-500">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-slate-800 mb-4">Unit Produksi (UP)</h2>
                <p class="text-slate-600 max-w-2xl mx-auto">
                    Wadah kewirausahaan sekolah yang melayani jasa percetakan, desain, dan servis komputer untuk umum.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl shadow border border-slate-100 flex items-center gap-4">
                    <div class="w-16 h-16 bg-slate-200 rounded-full flex-shrink-0"></div>
                    <div>
                        <h4 class="font-bold text-slate-800">Sari Indah</h4>
                        <p class="text-xs text-[#1e5494] font-bold uppercase">Manajer UP</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow border border-slate-100 flex items-center gap-4">
                    <div class="w-16 h-16 bg-slate-200 rounded-full flex-shrink-0"></div>
                    <div>
                        <h4 class="font-bold text-slate-800">Tono</h4>
                        <p class="text-xs text-[#1e5494] font-bold uppercase">Marketing</p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    {{-- 4. JAVASCRIPT LOGIC --}}
    <script>
        function switchTab(selectedId) {
            // 1. Sembunyikan semua konten
            const allContents = document.querySelectorAll('.tab-content');
            allContents.forEach(div => {
                div.classList.add('hidden');
            });

            // 2. Tampilkan konten yang dipilih
            const targetContent = document.getElementById('content-' + selectedId);
            if (targetContent) {
                targetContent.classList.remove('hidden');
            }

            // 3. Reset style semua tombol menjadi "Inactive" (Abu-abu/Putih)
            const allButtons = document.querySelectorAll('button[id^="btn-"]');
            allButtons.forEach(btn => {
                // Hapus style aktif
                btn.classList.remove('bg-[#1e5494]', 'text-white', 'shadow-md');
                // Tambah style inaktif
                btn.classList.add('text-slate-500', 'hover:bg-slate-100');
            });

            // 4. Set style tombol yang diklik menjadi "Active" (Biru)
            const activeBtn = document.getElementById('btn-' + selectedId);
            if (activeBtn) {
                // Hapus style inaktif
                activeBtn.classList.remove('text-slate-500', 'hover:bg-slate-100');
                // Tambah style aktif
                activeBtn.classList.add('bg-[#1e5494]', 'text-white', 'shadow-md');
            }
        }
    </script>
@endsection