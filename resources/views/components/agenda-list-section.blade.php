{{-- Agenda Sekolah Section with Gradient Background & Decorations --}}
<section class="relative py-12 md:py-16 overflow-hidden bg-gradient-to-br from-[#0f2c4a] via-[#1e5494] to-[#f6ad55]">
    
    {{-- Decorative Elements --}}
    <img 
        src="{{ asset('images/decorations/wave-pattern.svg') }}" 
        alt="Wave Pattern" 
        class="absolute top-0 left-0 w-full md:w-1/2 h-auto z-0 pointer-events-none opacity-40 invert brightness-0 mix-blend-overlay"
        onerror="this.style.display='none'"
    >
    <img 
        src="{{ asset('images/decorations/sun-pattern.svg') }}" 
        alt="Sun Pattern" 
        class="absolute bottom-0 right-0 w-3/4 md:w-1/3 h-auto z-0 pointer-events-none opacity-30 invert brightness-0"
        onerror="this.style.display='none'"
    >
    
    <div class="container relative mx-auto px-4 sm:px-6 lg:px-8 z-10">
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
            
            {{-- Left: Title & Description (1 Column) --}}
            <div class="lg:sticky lg:top-24">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight drop-shadow-lg">
                    Agenda SMKN 5
                </h2>
                <p class="text-lg text-blue-100 mb-8 leading-relaxed">
                    Jadwal kegiatan akademik & non-akademik terbaru untuk mendukung perkembangan siswa dan ekosistem sekolah.
                </p>
                
                {{-- Transparent Button --}}
                <a href="{{ route('agenda.index') }}" 
                   class="inline-flex items-center gap-2 px-6 py-3 bg-white/10 hover:bg-white/20 border border-white/30 backdrop-blur-sm text-white font-semibold rounded-full transition-all shadow-lg hover:shadow-xl">
                    <span>Lihat Semua Agenda</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
            
            {{-- Right: Scrollable Agenda List (2 Columns) --}}
            <div class="lg:col-span-2 bg-white rounded-2xl shadow-2xl overflow-hidden border-t-8 border-[#1e5494]">
                
                {{-- Scrollable Container --}}
                <div class="h-[350px] overflow-y-auto agenda-scroll">
                    
                    @forelse($agendas ?? [] as $agenda)
                    @php
                        $agendaDate = \Carbon\Carbon::parse($agenda->date);
                        $isPast = $agendaDate->isPast();
                        $isToday = $agendaDate->isToday();
                    @endphp
                    
                    <div class="flex items-start gap-4 p-4 border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        
                        {{-- Date Box (Left) --}}
                        <div class="flex-shrink-0 text-center {{ $isPast ? 'bg-gray-100 text-gray-500' : 'bg-blue-50 text-[#1e5494]' }} rounded-lg px-4 py-3 min-w-[80px]">
                            <div class="text-3xl font-bold leading-none mb-1">
                                {{ $agendaDate->format('d') }}
                            </div>
                            <div class="text-xs font-semibold uppercase">
                                {{ $agendaDate->translatedFormat('M') }}
                            </div>
                            <div class="text-xs opacity-75">
                                {{ $agendaDate->format('Y') }}
                            </div>
                        </div>
                        
                        {{-- Content (Right) --}}
                        <div class="flex-1 min-w-0">
                            
                            {{-- Title --}}
                            <h3 class="text-lg font-bold text-gray-800 mb-2 leading-tight">
                                {{ $agenda->title }}
                            </h3>
                            
                            {{-- Time --}}
                            @if($agenda->time)
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-1">
                                <i class="fa-solid fa-clock text-[#1e5494]"></i>
                                <span>{{ $agenda->time }}</span>
                            </div>
                            @endif
                            
                            {{-- Location --}}
                            @if($agenda->location)
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-3">
                                <i class="fa-solid fa-location-dot text-[#1e5494]"></i>
                                <span>{{ $agenda->location }}</span>
                            </div>
                            @endif
                            
                            {{-- Status Badge --}}
                            @if($isPast)
                                <span class="inline-block px-3 py-1 bg-gray-200 text-gray-700 text-xs font-semibold rounded-full">
                                    <i class="fa-solid fa-check-circle mr-1"></i>
                                    Telah Terlaksana
                                </span>
                            @elseif($isToday)
                                <span class="inline-block px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">
                                    <i class="fa-solid fa-calendar-day mr-1"></i>
                                    Hari Ini
                                </span>
                            @else
                                <span class="inline-block px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">
                                    <i class="fa-solid fa-calendar-plus mr-1"></i>
                                    Akan Datang
                                </span>
                            @endif
                            
                        </div>
                        
                    </div>
                    @empty
                    <div class="flex flex-col items-center justify-center h-full p-12 text-center">
                        <i class="fa-solid fa-calendar-xmark text-6xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 text-lg font-semibold">Tidak ada agenda tersedia</p>
                        <p class="text-gray-400 text-sm mt-2">Belum ada kegiatan yang terjadwal dalam waktu dekat</p>
                    </div>
                    @endforelse
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
</section>

{{-- Custom Scrollbar Styles --}}
@push('styles')
<style>
    /* Custom Scrollbar for Agenda List */
    .agenda-scroll {
        scrollbar-width: thin;
        scrollbar-color: #1e5494 #e5e7eb;
    }
    
    .agenda-scroll::-webkit-scrollbar {
        width: 8px;
    }
    
    .agenda-scroll::-webkit-scrollbar-track {
        background: #f3f4f6;
        border-radius: 10px;
    }
    
    .agenda-scroll::-webkit-scrollbar-thumb {
        background: #1e5494;
        border-radius: 10px;
        transition: background 0.3s ease;
    }
    
    .agenda-scroll::-webkit-scrollbar-thumb:hover {
        background: #163d6f;
    }
</style>
@endpush
