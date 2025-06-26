{{-- <x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Tambah Penghuni</h2>
                <p class="text-gray-600">Silakan isi form untuk menambahkan penghuni baru</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-8">
                    <div>
                        <form id="formPenghuni" action="{{ route('penghuni.store') }}" method="POST"
                            onsubmit="return confirmSubmit(event)" class="space-y-6">
                            @csrf

                            <!-- Nama Field -->
                            <div class="group">
                                <label
                                    class="block text-sm font-semibold text-gray-700 mb-2 group-focus-within:text-blue-600 transition-colors">
                                    <svg class="inline h-4 w-4 mr-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                    Nama Penghuni
                                </label>
                                <input type="text" name="nama"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50/50 hover:bg-white focus:bg-white placeholder-gray-400"
                                    placeholder="Masukkan nama lengkap" required>
                            </div>

                            <!-- Email Field -->
                            <div class="group">
                                <label
                                    class="block text-sm font-semibold text-gray-700 mb-2 group-focus-within:text-blue-600 transition-colors">
                                    <svg class="inline h-4 w-4 mr-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    Email Penghuni
                                </label>
                                <input type="email" name="email"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50/50 hover:bg-white focus:bg-white placeholder-gray-400"
                                    placeholder="contoh@email.com" required>
                            </div>

                            <!-- Nomor Telepon Field -->
                            <div class="group">
                                <label
                                    class="block text-sm font-semibold text-gray-700 mb-2 group-focus-within:text-blue-600 transition-colors">
                                    <svg class="inline h-4 w-4 mr-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                        </path>
                                    </svg>
                                    Nomor Telepon
                                </label>
                                <input type="text" name="no_telp"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50/50 hover:bg-white focus:bg-white placeholder-gray-400"
                                    placeholder="08xx-xxxx-xxxx" required>
                            </div>

                            <!-- Lokasi Field -->
                            <div class="group">
                                <label
                                    class="block text-sm font-semibold text-gray-700 mb-2 group-focus-within:text-blue-600 transition-colors">
                                    <svg class="inline h-4 w-4 mr-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Lokasi Kost
                                </label>
                                <select name="lokasi_kost"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50/50 hover:bg-white focus:bg-white appearance-none cursor-pointer">
                                    <option value="" class="text-gray-400">Pilih Lokasi Kost</option>
                                    <option value="Berbek" class="text-gray-900">🏠 Berbek</option>
                                    <option value="Gunung_Anyar" class="text-gray-900">🏠 Gunung Anyar</option>
                                    <option value="Rungkut" class="text-gray-900">🏠 Rungkut</option>
                                </select>
                                <!-- Custom dropdown arrow -->
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 mt-8">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>

                            <!-- Password Field -->
                            <div class="group">
                                <label
                                    class="block text-sm font-semibold text-gray-700 mb-2 group-focus-within:text-blue-600 transition-colors">
                                    <svg class="inline h-4 w-4 mr-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                        </path>
                                    </svg>
                                    Password
                                </label>
                                <input type="password" name="password"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50/50 hover:bg-white focus:bg-white placeholder-gray-400"
                                    placeholder="Minimal 8 karakter" required>
                            </div>

                            <!-- Submit Button -->
                            <div>
                                <button type="submit"
                                    class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg shadow hover:bg-blue-700 transition">
                                    Tambah Penghuni
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmSubmit(event) {
            event.preventDefault();

            Swal.fire({
                title: '✨ Konfirmasi Penyimpanan',
                html: `
                <div class="text-left">
                    <p class="mb-3 text-gray-600">Apakah Anda yakin ingin menyimpan data penghuni ini?</p>
                    <div class="bg-blue-50 p-3 rounded-lg text-sm">
                        <p><strong>📋 Data akan disimpan:</strong></p>
                        <p>• Nama: <span class="font-medium">${document.querySelector('input[name="nama"]').value}</span></p>
                        <p>• Email: <span class="font-medium">${document.querySelector('input[name="email"]').value}</span></p>
                        <p>• Telepon: <span class="font-medium">${document.querySelector('input[name="no_telp"]').value}</span></p>
                        <p>• Lokasi: <span class="font-medium">${document.querySelector('select[name="lokasi_kost"]').value || 'Belum dipilih'}</span></p>
                    </div>
                </div>
            `,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3B82F6',
                cancelButtonColor: '#EF4444',
                confirmButtonText: '💾 Ya, Simpan!',
                cancelButtonText: '❌ Batal',
                customClass: {
                    popup: 'rounded-2xl',
                    confirmButton: 'rounded-xl font-semibold',
                    cancelButton: 'rounded-xl font-semibold'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Loading state
                    Swal.fire({
                        title: 'Menyimpan...',
                        html: 'Sedang memproses data penghuni',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    document.getElementById('formPenghuni').submit();
                }
            });

            return false;
        }

        // Form validation enhancements
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input, select');

            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('ring-2', 'ring-blue-100');
                });

                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('ring-2', 'ring-blue-100');
                });
            });
        });
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                title: '🎉 Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonColor: '#10B981',
                confirmButtonText: '✅ OK',
                customClass: {
                    popup: 'rounded-2xl',
                    confirmButton: 'rounded-xl font-semibold'
                }
            });
        </script>
    @endif
</x-app-layout> --}}


{{-- <x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Tambah Penghuni</h2>
                <p class="text-gray-600">Silakan isi form untuk menambahkan penghuni baru</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-8">
                    <form id="formPenghuni" action="{{ route('penghuni.store') }}" method="POST"
                        enctype="multipart/form-data" onsubmit="return confirmSubmit(event)" class="space-y-6">
                        @csrf

                        <!-- Nama Field -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Penghuni</label>
                            <input type="text" name="nama"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white placeholder-gray-400"
                                placeholder="Masukkan nama lengkap" required>
                        </div>

                        <!-- Email Field -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email Penghuni</label>
                            <input type="email" name="email"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white placeholder-gray-400"
                                placeholder="contoh@email.com" required>
                        </div>

                        <!-- Nomor Telepon Field -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon</label>
                            <input type="text" name="no_telp"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white placeholder-gray-400"
                                placeholder="08xx-xxxx-xxxx" required>
                        </div>

                        <!-- Lokasi Field -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Lokasi Kost</label>
                            <select name="lokasi_kost"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white appearance-none cursor-pointer">
                                <option value="" class="text-gray-400">Pilih Lokasi Kost</option>
                                <option value="Berbek" class="text-gray-900">🏠 Berbek</option>
                                <option value="Gunung_Anyar" class="text-gray-900">🏠 Gunung Anyar</option>
                                <option value="Rungkut" class="text-gray-900">🏠 Rungkut</option>
                            </select>
                        </div>

                        <!-- Upload Gambar Field -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar Penghuni</label>
                            <input type="file" name="image" accept="image/*"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white placeholder-gray-400">
                        </div>

                        <!-- Password Field -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                            <input type="password" name="password"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white placeholder-gray-400"
                                placeholder="Minimal 8 karakter" required>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit"
                                class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg shadow hover:bg-blue-700 transition">
                                Tambah Penghuni
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmSubmit(event) {
            event.preventDefault();

            Swal.fire({
                title: '✨ Konfirmasi Penyimpanan',
                html: `
                <div class="text-left">
                    <p class="mb-3 text-gray-600">Apakah Anda yakin ingin menyimpan data penghuni ini?</p>
                    <div class="bg-blue-50 p-3 rounded-lg text-sm">
                        <p><strong>📋 Data akan disimpan:</strong></p>
                        <p>• Nama: <span class="font-medium">${document.querySelector('input[name="nama"]').value}</span></p>
                        <p>• Email: <span class="font-medium">${document.querySelector('input[name="email"]').value}</span></p>
                        <p>• Telepon: <span class="font-medium">${document.querySelector('input[name="no_telp"]').value}</span></p>
                        <p>• Lokasi: <span class="font-medium">${document.querySelector('select[name="lokasi_kost"]').value || 'Belum dipilih'}</span></p>
                    </div>
                </div>
            `,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3B82F6',
                cancelButtonColor: '#EF4444',
                confirmButtonText: '💾 Ya, Simpan!',
                cancelButtonText: '❌ Batal',
                customClass: {
                    popup: 'rounded-2xl',
                    confirmButton: 'rounded-xl font-semibold',
                    cancelButton: 'rounded-xl font-semibold'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Loading state
                    Swal.fire({
                        title: 'Menyimpan...',
                        html: 'Sedang memproses data penghuni',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    document.getElementById('formPenghuni').submit();
                }
            });

            return false;
        }

        // Form validation enhancements
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input, select');

            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('ring-2', 'ring-blue-100');
                });

                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('ring-2', 'ring-blue-100');
                });
            });
        });
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                title: '🎉 Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonColor: '#10B981',
                confirmButtonText: '✅ OK',
                customClass: {
                    popup: 'rounded-2xl',
                    confirmButton: 'rounded-xl font-semibold'
                }
            });
        </script>
    @endif
</x-app-layout> --}}


{{-- <x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Tambah Penghuni</h2>
                <p class="text-gray-600">Silakan isi form untuk menambahkan penghuni baru</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-8">
                    <form id="formPenghuni" action="{{ route('penghuni.store') }}" method="POST"
                        enctype="multipart/form-data" onsubmit="return confirmSubmit(event)" class="space-y-6">
                        @csrf

                        <!-- Nama Field -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Penghuni</label>
                            <input type="text" name="nama"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white placeholder-gray-400"
                                placeholder="Masukkan nama lengkap" required>
                        </div>

                        <!-- Email Field -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email Penghuni</label>
                            <input type="email" name="email"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white placeholder-gray-400"
                                placeholder="contoh@email.com" required>
                        </div>

                        <!-- Nomor Telepon Field -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon</label>
                            <input type="text" name="no_telp"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white placeholder-gray-400"
                                placeholder="08xx-xxxx-xxxx" required>
                        </div>

                        <!-- Lokasi Field -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Lokasi Kost</label>
                            <select name="lokasi_kost"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white appearance-none cursor-pointer">
                                <option value="" class="text-gray-400">Pilih Lokasi Kost</option>
                                <option value="Berbek" class="text-gray-900">Berbek</option>
                                <option value="Gunung_Anyar" class="text-gray-900">Gunung Anyar</option>
                                <option value="Rungkut" class="text-gray-900">Rungkut</option>
                            </select>
                        </div>

                        <!-- Upload Gambar Field -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar Penghuni</label>
                            <input type="file" name="image" accept="image/*"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white placeholder-gray-400">
                        </div>

                        <!-- Password Field -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                            <input type="password" name="password"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white placeholder-gray-400"
                                placeholder="Minimal 8 karakter" required>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit"
                                class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg shadow hover:bg-blue-700 transition">
                                Tambah Penghuni
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmSubmit(event) {
            event.preventDefault();

            Swal.fire({
                html: `
                <div class="text-left">
                    <p class="mb-3 text-black">Apakah Anda yakin ingin menyimpan data penghuni ini?</p>
                    <div class="bg-blue-50 p-3 rounded-lg text-sm">
                        <p><strong>📋 Data akan disimpan:</strong></p>
                        <p>• Nama: <span class="font-medium">${document.querySelector('input[name="nama"]').value}</span></p>
                        <p>• Email: <span class="font-medium">${document.querySelector('input[name="email"]').value}</span></p>
                        <p>• Telepon: <span class="font-medium">${document.querySelector('input[name="no_telp"]').value}</span></p>
                        <p>• Lokasi: <span class="font-medium">${document.querySelector('select[name="lokasi_kost"]').value || 'Belum dipilih'}</span></p>
                    </div>
                </div>
            `,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3B82F6',
                cancelButtonColor: '#EF4444',
                confirmButtonText: 'Ya, Simpan!',
                cancelButtonText: 'Batal',
                customClass: {
                    popup: 'rounded-2xl',
                    confirmButton: 'rounded-xl font-semibold',
                    cancelButton: 'rounded-xl font-semibold'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Loading state
                    Swal.fire({
                        title: 'Menyimpan...',
                        html: 'Sedang memproses data penghuni',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    document.getElementById('formPenghuni').submit();
                }
            });

            return false;
        }

        // Form validation enhancements
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input, select');

            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('ring-2', 'ring-blue-100');
                });

                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('ring-2', 'ring-blue-100');
                });
            });
        });
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                title: '🎉 Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonColor: '#10B981',
                confirmButtonText: '✅ OK',
                customClass: {
                    popup: 'rounded-2xl',
                    confirmButton: 'rounded-xl font-semibold'
                }
            });
        </script>
    @endif
</x-app-layout> --}}

<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-black mb-2">Tambah Penghuni Kost</h2>
            </div>

            <!-- Form Card -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6">
                    <form id="formPenghuni" action="{{ route('penghuni.store') }}" method="POST"
                        enctype="multipart/form-data" onsubmit="return confirmSubmit(event)" class="space-y-4">
                        @csrf

                        <!-- Nama Field -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Penghuni</label>
                            <input type="text" name="nama"
                                class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white placeholder-gray-400"
                                placeholder="Masukkan nama lengkap" required>
                        </div>

                        <!-- Email Field -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email Penghuni</label>
                            <input type="email" name="email"
                                class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white placeholder-gray-400"
                                placeholder="contoh@email.com" required>
                        </div>

                        <!-- Nomor Telepon Field -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon</label>
                            <input type="text" name="no_telp"
                                class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white placeholder-gray-400"
                                placeholder="08xx-xxxx-xxxx" required>
                        </div>

                        <!-- Lokasi Field -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Lokasi Kost</label>
                            <select name="lokasi_kost"
                                class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white appearance-none cursor-pointer">
                                <option value="" class="text-gray-400">Pilih Lokasi Kost</option>
                                <option value="Berbek" class="text-gray-900">Berbek</option>
                                <option value="Gunung_Anyar" class="text-gray-900">Gunung Anyar</option>
                                <option value="Rungkut" class="text-gray-900">Rungkut</option>
                            </select>
                        </div>

                        <!-- Upload Gambar Field -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar Penghuni</label>
                            <input type="file" name="image" accept="image/*"
                                class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white placeholder-gray-400">
                        </div>

                        <!-- Password Field -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                            <input type="password" name="password"
                                class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white placeholder-gray-400"
                                placeholder="Minimal 8 karakter" required>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit"
                                class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg shadow hover:bg-blue-700 transition">
                                Tambah Penghuni
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmSubmit(event) {
            event.preventDefault();

            Swal.fire({
                html: `
                <div class="text-left">
                    <p class="mb-3 text-black">Apakah Anda yakin ingin menyimpan data penghuni ini?</p>
                    <div class="bg-blue-50 p-3 rounded-lg text-sm">
                        <p><strong>📋 Data akan disimpan:</strong></p>
                        <p>• Nama: <span class="font-medium">${document.querySelector('input[name="nama"]').value}</span></p>
                        <p>• Email: <span class="font-medium">${document.querySelector('input[name="email"]').value}</span></p>
                        <p>• Telepon: <span class="font-medium">${document.querySelector('input[name="no_telp"]').value}</span></p>
                        <p>• Lokasi: <span class="font-medium">${document.querySelector('select[name="lokasi_kost"]').value || 'Belum dipilih'}</span></p>
                    </div>
                </div>
            `,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3B82F6',
                cancelButtonColor: '#EF4444',
                confirmButtonText: 'Ya, Simpan!',
                cancelButtonText: 'Batal',
                customClass: {
                    popup: 'rounded-2xl',
                    confirmButton: 'rounded-xl font-semibold',
                    cancelButton: 'rounded-xl font-semibold'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Loading state
                    Swal.fire({
                        title: 'Menyimpan...',
                        html: 'Sedang memproses data penghuni',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    document.getElementById('formPenghuni').submit();
                }
            });

            return false;
        }

        // Form validation enhancements
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input, select');

            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('ring-2', 'ring-blue-100');
                });

                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('ring-2', 'ring-blue-100');
                });
            });
        });
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                title: '🎉 Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonColor: '#10B981',
                confirmButtonText: '✅ OK',
                customClass: {
                    popup: 'rounded-2xl',
                    confirmButton: 'rounded-xl font-semibold'
                }
            });
        </script>
    @endif
</x-app-layout>
