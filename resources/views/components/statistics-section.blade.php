{{-- Statistics & Facts Section - Dynamic from Database --}}
<section class="py-12 lg:py-16 bg-gradient-to-br from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Bento Grid Container --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 auto-rows-fr">
            
            @foreach($statistics as $stat)
                @if($stat->is_big)
                    {{-- Big Card (Row Span 2) --}}
                    <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 relative overflow-hidden lg:row-span-2 flex flex-col justify-center">
                        {{-- Content --}}
                        <div class="relative z-10">
                            <p class="text-sm font-bold tracking-widest text-gray-800 uppercase mb-2">
                                {{ $stat->label }}
                            </p>
                            <h3 class="text-7xl lg:text-8xl font-black mb-4 bg-clip-text text-transparent bg-gradient-to-r from-green-500 via-emerald-500 to-teal-500">
                                {{ $stat->value }}
                            </h3>
                            @if($stat->description)
                            <p class="text-gray-800 text-sm font-semibold leading-relaxed">
                                {{ $stat->description }}
                            </p>
                            @endif
                        </div>
                        
                        {{-- Watermark Icon (Static) --}}
                        <i class="{{ $stat->icon }} absolute -bottom-8 -right-8 text-[14rem] text-gray-100/80 -rotate-12 pointer-events-none"></i>
                    </div>
                @else
                    {{-- Regular Card --}}
                    <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 relative overflow-hidden">
                        {{-- Content --}}
                        <div class="relative z-10">
                            <p class="text-sm font-bold tracking-widest text-gray-800 uppercase mb-2">
                                {{ $stat->label }}
                            </p>
                            <h3 class="text-6xl font-black mb-2 bg-clip-text text-transparent bg-gradient-to-r from-green-500 via-emerald-500 to-teal-500">
                                {{ $stat->value }}
                            </h3>
                            @if($stat->description)
                            <p class="text-gray-800 text-sm font-semibold">
                                {{ $stat->description }}
                            </p>
                            @endif
                        </div>
                        
                        {{-- Watermark Icon (Static) --}}
                        <i class="{{ $stat->icon }} absolute -bottom-8 -right-8 text-[10rem] text-gray-100/80 -rotate-12 pointer-events-none"></i>
                    </div>
                @endif
            @endforeach
            
        </div>
        
    </div>
</section>
