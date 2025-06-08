{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
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
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                            <input type="text" name="judul" id="judul" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="mt-1 block w-full" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="mt-1 block w-full"
                                accept="image/*">
                        </div>

                        <button type="button" id="submitBtn"
                            class="px-4 py-2 bg-blue-600 text-black rounded hover:bg-blue-700">Simpan Laporan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
</x-app-layout> --}}


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-blue-700 leading-tight">
            {{ __('Tambah Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
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

                        <div>
                            <label for="judul" class="block mb-2 text-sm font-medium text-blue-800">Judul</label>
                            <input type="text" name="judul" id="judul" required
                                class="w-full px-4 py-3 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                placeholder="Masukkan judul laporan">
                        </div>

                        <div>
                            <label for="deskripsi"
                                class="block mb-2 text-sm font-medium text-blue-800">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" required rows="5"
                                class="w-full px-4 py-3 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                placeholder="Tuliskan deskripsi laporan"></textarea>
                        </div>

                        <div>
                            <label for="gambar" class="block mb-2 text-sm font-medium text-blue-800">Gambar</label>
                            <input type="file" name="gambar" id="gambar" accept="image/*"
                                class="w-full text-blue-700 file:border file:border-blue-400 file:rounded file:px-4 file:py-2 file:bg-blue-50 file:text-blue-600 cursor-pointer hover:file:bg-blue-100 transition">
                        </div>

                        <button type="button" id="submitBtn"
                            class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg shadow hover:bg-blue-700 transition">
                            Simpan Laporan
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
