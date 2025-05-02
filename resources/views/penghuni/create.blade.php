{{--
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Penghuni') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <form action="{{ route('penghuni.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nama Penghuni</label>
                        <input type="text" name="nama" class="w-full mt-1 p-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Email Penghuni</label>
                        <input type="email" name="email" class="w-full mt-1 p-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nomor Telepon Penghuni</label>
                        <input type="text" name="no_telp" class="w-full mt-1 p-2 border border-gray-300 rounded" required>
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
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" class="w-full mt-1 p-2 border border-gray-300 rounded" required>
                    </div>
                    <div>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-black rounded hover:bg-blue-700">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> --}}



<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Penghuni') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <form action="{{ route('penghuni.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nama Penghuni</label>
                        <input type="text" name="nama" class="w-full mt-1 p-2 border border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Email Penghuni</label>
                        <input type="email" name="email" class="w-full mt-1 p-2 border border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nomor Telepon Penghuni</label>
                        <input type="text" name="no_telp" class="w-full mt-1 p-2 border border-gray-300 rounded" required>
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
                        <input type="password" name="password" class="w-full mt-1 p-2 border border-gray-300 rounded" required>
                    </div>

                    <div class="flex justify-start">
                        <button type="submit" class="bg-blue-600 text-black px-5 py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
</x-app-layout>
