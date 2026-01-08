{{-- Footer Global Component - Modern Clean Design --}}
<footer id="footer" class="relative bg-[#0e5095] text-white rounded-tr-[80px] md:rounded-tr-[120px] pt-16 pb-8 px-4 md:px-12 mt-20 overflow-hidden">

    <div class="container mx-auto relative z-10">
        
        {{-- Main Footer Grid (3 Columns) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mb-12">
            
            {{-- Column 1: Alamat & Kontak --}}
            <div>
                <h3 class="text-xl font-bold mb-6">
                    Alamat & Kontak
                </h3>
                <div class="space-y-4 text-sm text-gray-100">
                    <p class="leading-relaxed">
                        Jl. Wahid Hasyim I No.75, RT.08, Sempaja Sel., Kec. Samarinda Utara, Kota Samarinda, Kalimantan Timur 75119
                    </p>
                    
                    <a href="tel:0541735338" class="flex items-center gap-3 text-gray-100 hover:text-white transition-colors group">
                        <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center group-hover:bg-white/20 transition-colors">
                            <i class="fa-solid fa-phone text-white"></i>
                        </div>
                        <span>0541 - 735338</span>
                    </a>
                    
                    <a href="mailto:smkn05smd@gmail.com" class="flex items-center gap-3 text-gray-100 hover:text-white transition-colors group">
                        <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center group-hover:bg-white/20 transition-colors">
                            <i class="fa-solid fa-envelope text-white"></i>
                        </div>
                        <span>smkn05smd@gmail.com</span>
                    </a>
                </div>
            </div>
            
            {{-- Column 2: Menu Navigasi --}}
            <div>
                <h3 class="text-xl font-bold mb-6">
                    Menu
                </h3>
                <ul class="space-y-3 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-gray-100 hover:text-white transition-colors flex items-center gap-2 group">
                            <i class="fa-solid fa-chevron-right text-xs text-yellow-400 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('jurusan.index') }}" class="text-gray-100 hover:text-white transition-colors flex items-center gap-2 group">
                            <i class="fa-solid fa-chevron-right text-xs text-yellow-400 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                            <span>Jurusan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('berita.index') }}" class="text-gray-100 hover:text-white transition-colors flex items-center gap-2 group">
                            <i class="fa-solid fa-chevron-right text-xs text-yellow-400 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                            <span>Berita</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('facilities.index') }}" class="text-gray-100 hover:text-white transition-colors flex items-center gap-2 group">
                            <i class="fa-solid fa-chevron-right text-xs text-yellow-400 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                            <span>Fasilitas</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('agenda.index') }}" class="text-gray-100 hover:text-white transition-colors flex items-center gap-2 group">
                            <i class="fa-solid fa-chevron-right text-xs text-yellow-400 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                            <span>Agenda</span>
                        </a>
                    </li>
                </ul>
            </div>
            
            {{-- Column 3: Media Sosial --}}
            <div>
                <h3 class="text-xl font-bold mb-6">
                    Ikuti Media Sosial SMK 5
                </h3>
                <div class="flex gap-4 flex-wrap">
                    {{-- Instagram --}}
                    <a href="https://www.instagram.com/smkn5smd_official?igsh=Znd2bXU0b3A1Z2Z2" 
                       target="_blank"
                       class="text-white hover:text-gray-300 transition-colors">
                        <i class="fa-brands fa-instagram text-3xl"></i>
                    </a>
                    
                    {{-- YouTube --}}
                    <a href="https://www.youtube.com/@OFFICIALSMKN5SAMARINDA" 
                       target="_blank"
                       class="text-white hover:text-gray-300 transition-colors">
                        <i class="fa-brands fa-youtube text-3xl"></i>
                    </a>
                </div>
            </div>
            
        </div>
        
        {{-- Divider --}}
        <div class="w-full border-t border-white/20"></div>
        
        {{-- Copyright Bar --}}
        <div class="text-center pt-8">
            <p class="text-sm text-gray-200">
                <span class="font-bold text-white">SMK NEGERI 5 SAMARINDA</span>
            </p>
            <p class="text-xs text-gray-300 mt-2">
                &copy; {{ date('Y') }} All Rights Reserved.
            </p>
        </div>
        
    </div>
    
</footer>
