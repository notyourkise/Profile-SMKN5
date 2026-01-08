@extends('layouts.app')

@section('title', 'Unit & Pegawai - SMK Negeri 5 Samarinda')

@section('content')

{{-- Hero Section --}}
<section class="relative bg-gradient-to-br from-green-700 via-blue-800 to-blue-900 text-white py-20 md:py-24">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Unit Kerja & Kepegawaian</h1>
            <p class="text-lg text-blue-100">
                Struktur unit kerja dan data tenaga pendidik serta kependidikan SMK Negeri 5 Samarinda
            </p>
        </div>
    </div>
</section>

{{-- Unit Kerja Section --}}
<section class="py-16 md:py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Unit Kerja</h2>
                <div class="w-20 h-1 bg-gradient-to-r from-green-600 to-blue-600 mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- Unit 1 --}}
                <div class="bg-gradient-to-br from-green-50 to-blue-50 rounded-xl p-6 border border-green-200 hover:shadow-lg transition-shadow">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-14 h-14 bg-green-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-user-tie text-white text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900">Tata Usaha</h3>
                    </div>
                    <p class="text-gray-600 text-sm">Pengelolaan administrasi dan ketatausahaan sekolah</p>
                </div>

                {{-- Unit 2 --}}
                <div class="bg-gradient-to-br from-blue-50 to-green-50 rounded-xl p-6 border border-blue-200 hover:shadow-lg transition-shadow">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-14 h-14 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-book text-white text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900">Kurikulum</h3>
                    </div>
                    <p class="text-gray-600 text-sm">Pengembangan dan pelaksanaan kurikulum pembelajaran</p>
                </div>

                {{-- Unit 3 --}}
                <div class="bg-gradient-to-br from-green-50 to-blue-50 rounded-xl p-6 border border-green-200 hover:shadow-lg transition-shadow">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-14 h-14 bg-green-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-users text-white text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900">Kesiswaan</h3>
                    </div>
                    <p class="text-gray-600 text-sm">Pembinaan dan pengembangan potensi siswa</p>
                </div>

                {{-- Unit 4 --}}
                <div class="bg-gradient-to-br from-blue-50 to-green-50 rounded-xl p-6 border border-blue-200 hover:shadow-lg transition-shadow">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-14 h-14 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-briefcase text-white text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900">Humas</h3>
                    </div>
                    <p class="text-gray-600 text-sm">Hubungan masyarakat dan kerjasama industri</p>
                </div>

                {{-- Unit 5 --}}
                <div class="bg-gradient-to-br from-green-50 to-blue-50 rounded-xl p-6 border border-green-200 hover:shadow-lg transition-shadow">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-14 h-14 bg-green-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-building text-white text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900">Sarana Prasarana</h3>
                    </div>
                    <p class="text-gray-600 text-sm">Pengelolaan dan pemeliharaan fasilitas sekolah</p>
                </div>

                {{-- Unit 6 --}}
                <div class="bg-gradient-to-br from-blue-50 to-green-50 rounded-xl p-6 border border-blue-200 hover:shadow-lg transition-shadow">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-14 h-14 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-flask text-white text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900">Unit Produksi</h3>
                    </div>
                    <p class="text-gray-600 text-sm">Pengembangan produk dan layanan jasa sekolah</p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- Data Kepegawaian Section --}}
<section class="py-16 md:py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Data Kepegawaian</h2>
                <div class="w-20 h-1 bg-gradient-to-r from-green-600 to-blue-600 mx-auto"></div>
            </div>

            {{-- Summary Cards --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
                <div class="bg-white rounded-xl shadow-lg p-6 text-center border-t-4 border-green-600">
                    <div class="text-4xl font-bold text-green-600 mb-2">85</div>
                    <p class="text-gray-600 text-sm">Guru Total</p>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-6 text-center border-t-4 border-blue-600">
                    <div class="text-4xl font-bold text-blue-600 mb-2">32</div>
                    <p class="text-gray-600 text-sm">Tenaga Kependidikan</p>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-6 text-center border-t-4 border-green-600">
                    <div class="text-4xl font-bold text-green-600 mb-2">72</div>
                    <p class="text-gray-600 text-sm">PNS</p>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-6 text-center border-t-4 border-blue-600">
                    <div class="text-4xl font-bold text-blue-600 mb-2">45</div>
                    <p class="text-gray-600 text-sm">Non-PNS</p>
                </div>
            </div>

            {{-- Table Placeholder --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gradient-to-r from-green-600 to-blue-600 text-white">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold">No</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Nama</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Jabatan</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Unit</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-600">1</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">Hariyadi, S.Pd., M.Pd.</td>
                                <td class="px-6 py-4 text-sm text-gray-600">Kepala Sekolah</td>
                                <td class="px-6 py-4 text-sm text-gray-600">Pimpinan</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-green-100 text-green-700 text-xs rounded-full font-medium">PNS</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                    <i class="fa-solid fa-database text-4xl text-gray-300 mb-4"></i>
                                    <p class="text-lg font-medium">Data Pegawai Sedang Dalam Proses</p>
                                    <p class="text-sm">Informasi lengkap kepegawaian akan segera ditampilkan</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
