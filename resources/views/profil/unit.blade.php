@extends('layouts.app')

@section('title', 'Profil Unit Kerja - SMKN 5 Samarinda')

@section('content')
{{-- HEADER SECTION --}}
<section class="bg-[#1e5494] text-white py-16 pb-24">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold">Profil Unit Kerja</h1>
        <p class="mt-4 text-lg text-white/90">Struktur Organisasi dan Personil Unit Kerja SMKN 5 Samarinda</p>
    </div>
</section>

{{-- TABS & CONTENT SECTION --}}
<section class="relative -mt-12 mb-16">
    <div class="container mx-auto px-4">
        
        {{-- MENU TABS --}}
        <div class="bg-white rounded-lg shadow-md p-1 flex flex-col sm:flex-row flex-wrap justify-center gap-1 max-w-4xl mx-auto mb-10 border border-gray-100">
            <button onclick="switchUnit('tu')" id="btn-tu" class="flex-1 min-w-[120px] px-4 md:px-6 py-2 md:py-3 rounded-md font-semibold text-sm md:text-base transition-all duration-300 bg-[#1e5494] text-white shadow-sm">
                Tata Usaha
            </button>
            <button onclick="switchUnit('perpus')" id="btn-perpus" class="flex-1 min-w-[120px] px-4 md:px-6 py-2 md:py-3 rounded-md font-semibold text-sm md:text-base transition-all duration-300 text-slate-600 hover:bg-gray-50">
                Perpustakaan
            </button>
            <button onclick="switchUnit('lab')" id="btn-lab" class="flex-1 min-w-[120px] px-4 md:px-6 py-2 md:py-3 rounded-md font-semibold text-sm md:text-base transition-all duration-300 text-slate-600 hover:bg-gray-50">
                Laboratorium
            </button>
            <button onclick="switchUnit('up')" id="btn-up" class="flex-1 min-w-[120px] px-4 md:px-6 py-2 md:py-3 rounded-md font-semibold text-sm md:text-base transition-all duration-300 text-slate-600 hover:bg-gray-50">
                Unit Produksi
            </button>
        </div>

        {{-- KONTEN: TATA USAHA --}}
        <div id="content-tu" class="animate-fade-in max-w-6xl mx-auto">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-slate-800">Tata Usaha</h2>
            </div>

            {{-- 1. KOORDINATOR TU (PIMPINAN - KUNING) --}}
            <div class="flex justify-center mb-12">
                <div class="w-full max-w-sm bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-shadow duration-300">
                    {{-- Bagian Atas: Nama --}}
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-slate-800">Riza Fahlevi, S.Pd.I</h3>
                    </div>
                    
                    {{-- Garis Stroke --}}
                    <div class="h-px bg-gray-200 w-full"></div>

                    {{-- Bagian Bawah: Jabatan (BG Kuning) --}}
                    <div class="bg-amber-400 py-3 text-center">
                        <span class="text-white font-bold text-sm uppercase tracking-wider">Koordinator Tata Usaha</span>
                    </div>
                </div>
            </div>

            {{-- 2. STAF TU (ANGGOTA - BIRU) --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6 mb-12">
                @php
                    $stafTU = [
                        ['nama' => 'Indria Isriani, S.Pd', 'jabatan' => 'Bendahara Pengeluaran Pembantu'],
                        ['nama' => 'Muhammad Nasir, S.E.', 'jabatan' => 'Administrasi Sapras'],
                        ['nama' => 'Rosida, A.Md', 'jabatan' => 'Administrasi Kepegawaian'],
                        ['nama' => 'Harry Dimas Perdana', 'jabatan' => 'Operator Dapodik'],
                        ['nama' => 'Wulan Dali Uswatun, S.Pd', 'jabatan' => 'Administrasi Keuangan'],
                        ['nama' => 'Nova Maisyarah, S.Pd', 'jabatan' => 'Administrasi Keuangan'],
                        ['nama' => 'Arisa, S.Pd', 'jabatan' => 'Administrasi Umum'],
                        ['nama' => 'Rukiah', 'jabatan' => 'Administrasi Kesiswaan'],
                        ['nama' => 'Eka Wi Handayani', 'jabatan' => 'Administrasi Kepegawaian'],
                        ['nama' => 'Marhani', 'jabatan' => 'Administrasi Kepegawaian'],
                        ['nama' => 'Nur Elvira Afrianti', 'jabatan' => 'Administrasi Kesiswaan'],
                        ['nama' => 'Jamilah', 'jabatan' => 'Administrasi Kesiswaan'],
                    ];
                @endphp
                @foreach($stafTU as $staf)
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 hover:shadow-md transition-shadow duration-300 flex flex-col h-full">
                    {{-- Nama --}}
                    <div class="p-5 text-center flex-grow flex items-center justify-center">
                        <h4 class="font-bold text-slate-800 text-sm md:text-base">{{ $staf['nama'] }}</h4>
                    </div>
                    
                    {{-- Garis Stroke --}}
                    <div class="h-px bg-gray-200 w-full"></div>

                    {{-- Jabatan (BG Biru) --}}
                    <div class="bg-[#1e5494] py-3 text-center">
                        <span class="text-white text-[10px] font-bold uppercase tracking-wider block px-2">{{ $staf['jabatan'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- 3. TIM PENDUKUNG (LIST BIASA) --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h3 class="font-bold text-slate-800 border-b border-gray-100 pb-3 mb-3 text-center">Tim Keamanan</h3>
                    <ul class="space-y-2 text-sm text-slate-600 text-center">
                        <li>Maryono</li>
                        <li>La Adira</li>
                        <li>Sumanto</li>
                        <li>Junimanson Sipayung, SH</li>
                        <li>Muhammad Annoor AS</li>
                        <li>Hendri Ferdian Cordova</li>
                    </ul>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h3 class="font-bold text-slate-800 border-b border-gray-100 pb-3 mb-3 text-center">Tim Kebersihan & Taman</h3>
                    <ul class="space-y-2 text-sm text-slate-600 text-center">
                        <li>Suryansyah</li>
                        <li>Rinja Rusyati</li>
                        <li>Rumiji Febrianti</li>
                        <li>Miswanto</li>
                        <li>Lukman Hakim</li>
                        <li>Nur Arifin</li>
                        <li class="font-medium text-[#1e5494] pt-2">Taman: Tomi Ari Sandi</li>
                    </ul>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h3 class="font-bold text-slate-800 border-b border-gray-100 pb-3 mb-3 text-center">Layanan Khusus</h3>
                    <ul class="space-y-2 text-sm text-slate-600 text-center">
                        <li>Bagong</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- KONTEN: PERPUSTAKAAN --}}
        <div id="content-perpus" class="hidden animate-fade-in max-w-6xl mx-auto">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-slate-800">Perpustakaan</h2>
            </div>

            {{-- KEPALA PERPUS (PIMPINAN - KUNING) --}}
            <div class="flex justify-center mb-12">
                <div class="w-full max-w-sm bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-slate-800">Dedy Hidayat, A.Md.</h3>
                    </div>
                    <div class="h-px bg-gray-200 w-full"></div>
                    <div class="bg-amber-400 py-3 text-center">
                        <span class="text-white font-bold text-sm uppercase tracking-wider">Kepala Perpustakaan</span>
                    </div>
                </div>
            </div>

            {{-- STAF PERPUS (ANGGOTA - BIRU) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $stafPerpus = [
                        ['nama' => 'Farida Sa\'diah', 'jabatan' => 'Pelayanan Teknis'],
                        ['nama' => 'Intan Putri Cahyani', 'jabatan' => 'Pelayanan Pemustaka'],
                        ['nama' => 'Gusti Gama, S.Pd.', 'jabatan' => 'Pelayanan Pemustaka'],
                        ['nama' => 'Muhammad Naufal Pratama', 'jabatan' => 'Pelayanan TIK'],
                    ];
                @endphp
                @foreach($stafPerpus as $staf)
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 hover:shadow-md transition-shadow duration-300 flex flex-col h-full">
                    <div class="p-5 text-center flex-grow flex items-center justify-center">
                        <h4 class="font-bold text-slate-800 text-lg">{{ $staf['nama'] }}</h4>
                    </div>
                    <div class="h-px bg-gray-200 w-full"></div>
                    <div class="bg-[#1e5494] py-3 text-center">
                        <span class="text-white text-xs font-bold uppercase tracking-wider block px-2">{{ $staf['jabatan'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- KONTEN: LABORATORIUM --}}
        <div id="content-lab" class="hidden animate-fade-in max-w-6xl mx-auto">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-slate-800">Laboratorium</h2>
            </div>
            
            {{-- GRID TOOLMAN (ANGGOTA - BIRU) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    // Data Laboratorium - 4 Orang TOOLMAN
                    $laboran = [
                        ['nama' => 'Bima Adinata Putra, A.Md.Kep', 'jabatan' => 'Toolman'],
                        ['nama' => 'Doni Wijaya', 'jabatan' => 'Toolman'],
                        ['nama' => 'Argi Anugrah Tridana, S.Kom', 'jabatan' => 'Toolman'],
                        ['nama' => 'Dimas Pradana', 'jabatan' => 'Toolman'],
                    ];
                @endphp

                @foreach($laboran as $staf)
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 hover:shadow-md transition-shadow duration-300 flex flex-col h-full">
                    <div class="p-5 text-center flex-grow flex items-center justify-center">
                        <h4 class="font-bold text-slate-800 text-lg">{{ $staf['nama'] }}</h4>
                    </div>
                    <div class="h-px bg-gray-200 w-full"></div>
                    <div class="bg-[#1e5494] py-3 text-center">
                        <span class="text-white text-xs font-bold uppercase tracking-wider block px-2">{{ $staf['jabatan'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- KONTEN: UNIT PRODUKSI --}}
        <div id="content-up" class="hidden animate-fade-in max-w-3xl mx-auto text-center">
            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-8">
                <h3 class="text-lg font-bold text-yellow-800 mb-2">Unit Produksi (Technopark)</h3>
                <p class="text-yellow-700 text-sm">
                    Data struktur organisasi sedang dalam proses pembaruan.
                </p>
            </div>
        </div>

    </div>
</section>

{{-- JAVASCRIPT UNTUK TABS --}}
<script>
function switchUnit(unitId) {
    const contents = ['tu', 'perpus', 'lab', 'up'];
    contents.forEach(id => {
        document.getElementById(`content-${id}`).classList.add('hidden');
        
        const btn = document.getElementById(`btn-${id}`);
        btn.classList.remove('bg-[#1e5494]', 'text-white', 'shadow-sm');
        btn.classList.add('text-slate-600', 'hover:bg-gray-50');
    });

    document.getElementById(`content-${unitId}`).classList.remove('hidden');

    const activeBtn = document.getElementById(`btn-${unitId}`);
    activeBtn.classList.remove('text-slate-600', 'hover:bg-gray-50');
    activeBtn.classList.add('bg-[#1e5494]', 'text-white', 'shadow-sm');
}
</script>
@endsection