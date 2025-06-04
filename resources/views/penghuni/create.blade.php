{{-- <x-app-layout>
    <div class="py-10  min-h-screen w-full">
        <div class=" px-4">
            <div class="max-w-xl mx-auto rounded-lg shadow-lg">
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <form id="formPenghuni" action="{{ route('penghuni.store') }}" method="POST"
                        onsubmit="return confirmSubmit(event)">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Nama Penghuni</label>
                            <input type="text" name="nama" class="w-full mt-1 p-2 border border-gray-300 rounded"
                                required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Email Penghuni</label>
                            <input type="email" name="email" class="w-full mt-1 p-2 border border-gray-300 rounded"
                                required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Nomor Telepon Penghuni</label>
                            <input type="text" name="no_telp" class="w-full mt-1 p-2 border border-gray-300 rounded"
                                required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Lokasi Penghuni</label>
                            <select name="lokasi_kost" class="w-full mt-1 p-2 border border-gray-300 rounded">
                                <option value="">Pilih Lokasi</option>
                                <option value="Berbek">Berbek</option>
                                <option value="Gunung_Anyar">Gunung Anyar</option>
                                <option value="Rungkut">Rungkut</option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" name="password"
                                class="w-full mt-1 p-2 border border-gray-300 rounded" required>
                        </div>

                        <div class="flex justify-start">
                            <button type="submit"
                                class="bg-blue-600 text-black px-5 py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmSubmit(event) {
            event.preventDefault(); // Hentikan form biar ga langsung submit

            Swal.fire({
                title: 'Yakin simpan data ini?',
                text: "Data penghuni akan ditambahkan ke sistem.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, simpan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kalau dikonfirmasi, submit form manual
                    document.getElementById('formPenghuni').submit();
                }
            });

            return false;
        }
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
</x-app-layout> --}}


<x-app-layout>
    <div class="min-h-screen w-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 py-12 px-4 sm:px-6 lg:px-12">
        <div class="mx-auto">
            <!-- Header -->
            <div class="text-center mb-8">
                <div
                    class="mx-auto h-12 w-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mb-4">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                        </path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Tambah Penghuni</h2>
                <p class="text-gray-600">Silakan isi form untuk menambahkan penghuni baru</p>
            </div>

            <!-- Form Card -->
            <div
                class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 p-8 hover:shadow-2xl transition-all duration-300">
                <form id="formPenghuni" action="{{ route('penghuni.store') }}" method="POST"
                    onsubmit="return confirmSubmit(event)" class="space-y-6">
                    @csrf

                    <!-- Nama Field -->
                    <div class="group">
                        <label
                            class="block text-sm font-semibold text-gray-700 mb-2 group-focus-within:text-blue-600 transition-colors">
                            <svg class="inline h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
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
                            <svg class="inline h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                            <svg class="inline h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                            <svg class="inline h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                            <svg class="inline h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold py-3 px-6 rounded-xl hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform hover:scale-[1.02] transition-all duration-200 shadow-lg hover:shadow-xl">
                            <svg class="inline h-5 w-5 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            Simpan Data Penghuni
                        </button>
                    </div>
                </form>
            </div>

            <!-- Footer Info -->
            <div class="text-center mt-8">
                <p class="text-sm text-gray-500">
                    Pastikan semua data yang dimasukkan sudah benar sebelum menyimpan
                </p>
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
</x-app-layout>
