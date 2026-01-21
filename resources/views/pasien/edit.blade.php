<x-app-sidebar-layout>
    @section('header', 'Edit Data Pasien')

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200 bg-primary-50">
                <h3 class="text-lg font-semibold text-gray-800">Form Edit Data Pasien</h3>
                <p class="text-sm text-gray-600 mt-1">Perbarui informasi pasien {{ $pasien->nama }}</p>
            </div>

            <form action="{{ route('pasien.update', $pasien) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama -->
                    <div class="md:col-span-2">
                        <label for="nama" class="block text-sm font-medium text-gray-700">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                            name="nama"
                            id="nama"
                            value="{{ old('nama', $pasien->nama) }}"
                            required
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 @error('nama') border-red-500 @enderror">
                        @error('nama')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- No Rekam Medis -->
                    <div>
                        <label for="no_rekam_medis" class="block text-sm font-medium text-gray-700">
                            No. Rekam Medis <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                            name="no_rekam_medis"
                            id="no_rekam_medis"
                            value="{{ old('no_rekam_medis', $pasien->no_rekam_medis) }}"
                            required
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 @error('no_rekam_medis') border-red-500 @enderror">
                        @error('no_rekam_medis')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jenis Kelamin -->
                    <div>
                        <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">
                            Jenis Kelamin <span class="text-red-500">*</span>
                        </label>
                        <select name="jenis_kelamin"
                            id="jenis_kelamin"
                            required
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 @error('jenis_kelamin') border-red-500 @enderror">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal Lahir -->
                    <div>
                        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">
                            Tanggal Lahir <span class="text-red-500">*</span>
                        </label>
                        <input type="date"
                            name="tanggal_lahir"
                            id="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $pasien->tanggal_lahir->format('Y-m-d')) }}"
                            required
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 @error('tanggal_lahir') border-red-500 @enderror">
                        @error('tanggal_lahir')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal Diagnosa -->
                    <div>
                        <label for="tanggal_diagnosa" class="block text-sm font-medium text-gray-700">
                            Tanggal Diagnosa <span class="text-red-500">*</span>
                        </label>
                        <input type="date"
                            name="tanggal_diagnosa"
                            id="tanggal_diagnosa"
                            value="{{ old('tanggal_diagnosa', $pasien->tanggal_diagnosa->format('Y-m-d')) }}"
                            required
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 @error('tanggal_diagnosa') border-red-500 @enderror">
                        @error('tanggal_diagnosa')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- No HP -->
                    <div>
                        <label for="no_hp" class="block text-sm font-medium text-gray-700">
                            No. HP/WhatsApp <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                            name="no_hp"
                            id="no_hp"
                            value="{{ old('no_hp', $pasien->no_hp) }}"
                            placeholder="08xxxxxxxxxx"
                            required
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 @error('no_hp') border-red-500 @enderror">
                        @error('no_hp')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email
                        </label>
                        <input type="email"
                            name="email"
                            id="email"
                            value="{{ old('email', $pasien->email) }}"
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 @error('email') border-red-500 @enderror">
                        @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Alamat -->
                    <div class="md:col-span-2">
                        <label for="alamat" class="block text-sm font-medium text-gray-700">
                            Alamat Lengkap <span class="text-red-500">*</span>
                        </label>
                        <textarea name="alamat"
                            id="alamat"
                            rows="3"
                            required
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 @error('alamat') border-red-500 @enderror">{{ old('alamat', $pasien->alamat) }}</textarea>
                        @error('alamat')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Catatan -->
                    <div class="md:col-span-2">
                        <label for="catatan" class="block text-sm font-medium text-gray-700">
                            Catatan
                        </label>
                        <textarea name="catatan"
                            id="catatan"
                            rows="3"
                            placeholder="Catatan tambahan tentang pasien (opsional)"
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 @error('catatan') border-red-500 @enderror">{{ old('catatan', $pasien->catatan) }}</textarea>
                        @error('catatan')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select name="status"
                            id="status"
                            required
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 @error('status') border-red-500 @enderror">
                            <option value="Aktif" {{ old('status', $pasien->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="Tidak Aktif" {{ old('status', $pasien->status) == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-4">
                    <a href="{{ route('pasien.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Batal
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-primary-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-700 focus:bg-primary-700 active:bg-primary-800 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Update Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-sidebar-layout>