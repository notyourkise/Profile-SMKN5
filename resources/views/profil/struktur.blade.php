@extends('layouts.app')

@section('title', 'Struktur Organisasi - SMK Negeri 5 Samarinda')

@section('content')

{{-- Hero Section --}}
<section class="relative bg-gradient-to-br from-blue-900 via-green-700 to-blue-800 text-white py-20 md:py-24">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Struktur Organisasi</h1>
            <p class="text-lg text-blue-100">
                Bagan hierarki kepemimpinan dan organisasi SMK Negeri 5 Samarinda
            </p>
        </div>
    </div>
</section>

{{-- Struktur Organisasi Image Section --}}
<section class="py-16 md:py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Bagan Struktur Organisasi</h2>
                <div class="w-20 h-1 bg-gradient-to-r from-blue-600 to-green-600 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Struktur organisasi menggambarkan hierarki dan pembagian tugas di lingkungan SMK Negeri 5 Samarinda
                </p>
            </div>

            {{-- Image Container --}}
            <div class="bg-gray-50 rounded-2xl shadow-xl p-6 md:p-8 border border-gray-200">
                <div class="relative">
                    <img 
                        src="{{ asset('images/struktur-organisasi.png') }}" 
                        alt="Struktur Organisasi SMK Negeri 5 Samarinda" 
                        class="w-full h-auto rounded-lg shadow-md"
                        onerror="this.src='https://via.placeholder.com/1200x800/1e40af/ffffff?text=Struktur+Organisasi+SMKN+5+Samarinda'"
                    >
                    
                    {{-- Watermark/Info Overlay --}}
                    <div class="absolute bottom-4 right-4 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-lg shadow-md">
                        <p class="text-xs text-gray-600">
                            <i class="fa-solid fa-calendar-days mr-1"></i>
                            Update: {{ date('Y') }}
                        </p>
                    </div>
                </div>

                {{-- Download Button --}}
                <div class="flex justify-center mt-8">
                    <a 
                        href="{{ asset('images/struktur-organisasi.png') }}" 
                        download="Struktur-Organisasi-SMKN5-Samarinda.png"
                        class="inline-flex items-center gap-3 px-6 py-3 bg-gradient-to-r from-blue-600 to-green-600 hover:from-blue-700 hover:to-green-700 text-white font-semibold rounded-full shadow-lg transition-all hover:shadow-xl"
                    >
                        <i class="fa-solid fa-download"></i>
                        <span>Download Struktur Organisasi</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- Komponen Organisasi Cards --}}
<section class="py-16 md:py-20 bg-gradient-to-br from-blue-50 to-green-50">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Komponen Organisasi</h2>
                <div class="w-20 h-1 bg-gradient-to-r from-blue-600 to-green-600 mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                {{-- Kepala Sekolah --}}
                <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-blue-600 hover:shadow-2xl transition-shadow">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-crown text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900">Kepala Sekolah</h3>
                    </div>
                    <p class="text-gray-600 text-sm mb-3">Pimpinan tertinggi sekolah yang bertanggung jawab atas seluruh kegiatan dan kebijakan sekolah</p>
                    <div class="pt-3 border-t border-gray-100">
                        <p class="text-xs text-gray-500">Hariyadi, S.Pd., M.Pd.</p>
                    </div>
                </div>

                {{-- Wakil Kepala Sekolah --}}
                <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-green-600 hover:shadow-2xl transition-shadow">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-user-tie text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900">Wakil Kepala Sekolah</h3>
                    </div>
                    <p class="text-gray-600 text-sm">Membantu Kepala Sekolah dalam pengelolaan bidang kurikulum, kesiswaan, dan sarana prasarana</p>
                </div>

                {{-- Komite Sekolah --}}
                <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-blue-600 hover:shadow-2xl transition-shadow">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-users-gear text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900">Komite Sekolah</h3>
                    </div>
                    <p class="text-gray-600 text-sm">Badan mandiri yang mewadahi partisipasi masyarakat dalam peningkatan mutu pendidikan</p>
                </div>

                {{-- Tata Usaha --}}
                <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-green-600 hover:shadow-2xl transition-shadow">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-file-lines text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900">Tata Usaha</h3>
                    </div>
                    <p class="text-gray-600 text-sm">Menangani administrasi kepegawaian, keuangan, dan ketatausahaan sekolah</p>
                </div>

                {{-- Guru & Wali Kelas --}}
                <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-blue-600 hover:shadow-2xl transition-shadow">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-chalkboard-user text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900">Guru & Wali Kelas</h3>
                    </div>
                    <p class="text-gray-600 text-sm">Tenaga pendidik yang melaksanakan proses pembelajaran dan pembinaan siswa</p>
                </div>

                {{-- Siswa --}}
                <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-green-600 hover:shadow-2xl transition-shadow">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-graduation-cap text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900">Siswa</h3>
                    </div>
                    <p class="text-gray-600 text-sm">Peserta didik yang mengikuti seluruh program pendidikan dan pembinaan di sekolah</p>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection
