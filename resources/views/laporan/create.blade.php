<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-blue-700 leading-tight">
            {{ __('Tambah Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-xl overflow-hidden">

                <!-- Judul dan Deskripsi -->
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-3xl font-semibold text-blue-800 leading-tight">Buat Laporan</h2> <!-- Judul Utama -->
                    <p class="text-sm text-black mt-2">Isi dengan benar</p> <!-- Deskripsi kecil -->
                </div>

                <div class="p-8">
                    {{-- Notifikasi sukses --}}
                    @if (session('success'))
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: '{{ session('success') }}',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        </script>
                    @endif

                    <form id="laporanForm" action="{{ route('laporan.store') }}" method="POST"
                        enctype="multipart/form-data" class="space-y-6">

                        @csrf

                        <!-- Judul Laporan -->
                        <div class="relative">
                            <label for="judul" class="block mb-2 text-lg font-medium text-blue-800">
                                <i class="fas fa-pencil-alt mr-2 text-blue-500"></i> Judul Laporan
                            </label>
                            <input type="text" name="judul" id="judul" required
                                class="w-full px-6 py-3 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                placeholder="Masukkan judul laporan">
                        </div>

                        <!-- Deskripsi Laporan -->
                        <div class="relative">
                            <label for="deskripsi" class="block mb-2 text-lg font-medium text-blue-800">
                                <i class="fas fa-align-left mr-2 text-blue-500"></i> Deskripsi Laporan
                            </label>
                            <textarea name="deskripsi" id="deskripsi" required rows="5"
                                class="w-full px-6 py-3 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                placeholder="Tuliskan deskripsi laporan"></textarea>
                        </div>

                        <!-- Gambar Laporan -->
                        <div class="relative">
                            <label for="gambar" class="block mb-2 text-lg font-medium text-blue-800">
                                <i class="fas fa-image mr-2 text-blue-500"></i> Upload Gambar
                            </label>
                            <input type="file" name="gambar" id="gambar" accept="image/*"
                                class="w-full text-blue-700 file:border file:border-blue-400 file:rounded file:px-6 file:py-3 file:bg-blue-50 file:text-blue-600 cursor-pointer hover:file:bg-blue-100 transition">
                        </div>

                        <!-- Tombol Simpan Laporan -->
                        <button type="button" id="submitBtn"
                            class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg shadow-lg hover:bg-blue-700 transition">
                            <i class="fas fa-save mr-2"></i> Simpan Laporan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- CDN SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Script konfirmasi submit --}}
    <script>
        document.getElementById('submitBtn').addEventListener('click', function() {
            Swal.fire({
                title: 'Yakin data sudah benar?',
                text: "Pastikan semua informasi sudah sesuai.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, simpan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('laporanForm').submit();
                }
            });
        });
    </script>
</x-app-layout>
