<x-app-sidebar-layout>
    @section('header', 'Detail Pasien')

    <div class="max-w-5xl mx-auto">
        <!-- Tombol Kembali -->
        <div class="mb-4">
            <a href="{{ route('pasien.index') }}"
                class="inline-flex items-center text-sm text-gray-600 hover:text-gray-900">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
        </div>

        <!-- Kartu Identitas Pasien -->
        <div class="bg-gradient-to-br from-primary-500 to-primary-700 rounded-2xl shadow-2xl overflow-hidden mb-6">
            <div class="p-8">
                <div class="flex items-start justify-between">
                    <div class="flex items-start space-x-6">
                        <!-- Avatar -->
                        <div class="flex-shrink-0">
                            <div class="w-24 h-24 rounded-full bg-white text-primary-600 flex items-center justify-center shadow-lg">
                                <span class="text-4xl font-bold">{{ strtoupper(substr($pasien->namaPasien, 0, 1)) }}</span>
                            </div>
                        </div>

                        <!-- Info Utama -->
                        <div class="flex-1 text-white">
                            <h1 class="text-3xl font-bold mb-2">{{ $pasien->namaPasien }}</h1>
                            <div class="flex items-center space-x-4 text-primary-100 mb-4">
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    {{ $pasien->jenisKelamin }}
                                </span>
                            </div>

                            <div class="flex items-center space-x-6">
                                <div>
                                    <p class="text-sm text-primary-200">Umur</p>
                                    <p class="text-xl font-semibold">{{ $pasien->tanggalLahir->age }} Tahun</p>
                                </div>
                                <div>
                                    <p class="text-sm text-primary-200">Status</p>
                                    @if($pasien->status === 'active')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-500 text-white">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Aktif
                                    </span>
                                    @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-red-500 text-white">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        Tidak Aktif
                                    </span>
                                    @endif
                                </div>
                                <div>
                                    <p class="text-sm text-primary-200">Waktu Minum Obat</p>
                                    <p class="text-xl font-semibold">{{ $pasien->jam }} Wita</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-2">
                        <a href="{{ route('pasien.edit', $pasien) }}"
                            class="inline-flex items-center px-4 py-2 bg-white text-primary-600 rounded-lg font-semibold text-sm hover:bg-primary-50 transition">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card Footer dengan Pattern -->
            <div class="bg-white bg-opacity-10 px-8 py-4 backdrop-blur-sm">
                <div class="flex items-center justify-between text-white text-sm">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Terdaftar sejak {{ $pasien->created_at->format('d M Y') }}
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Diperbarui {{ $pasien->updated_at->diffForHumans() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Grid Informasi Detail -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Informasi Pribadi -->
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-primary-50 to-white">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Informasi Pribadi
                    </h3>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex items-start">
                        <div class="w-40 text-sm font-medium text-gray-500">Tanggal Lahir</div>
                        <div class="flex-1 text-sm text-gray-900">{{ $pasien->tanggalLahir->format('d F Y') }}</div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-40 text-sm font-medium text-gray-500">Jenis Kelamin</div>
                        <div class="flex-1 text-sm text-gray-900">{{ $pasien->jenisKelamin }}</div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-40 text-sm font-medium text-gray-500">Umur</div>
                        <div class="flex-1 text-sm text-gray-900">{{ $pasien->tanggalLahir->age }} Tahun</div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-40 text-sm font-medium text-gray-500">Alamat</div>
                        <div class="flex-1 text-sm text-gray-900">{{ $pasien->alamat }}</div>
                    </div>
                </div>
            </div>

            <!-- Informasi Kontak -->
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-primary-50 to-white">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        Informasi Kontak
                    </h3>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex items-start">
                        <div class="w-40 text-sm font-medium text-gray-500">No. HP/WhatsApp</div>
                        <div class="flex-1">
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pasien->wa) }}"
                                target="_blank"
                                class="text-sm text-primary-600 hover:text-primary-800 flex items-center">
                                {{ $pasien->wa }}
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-sidebar-layout>