
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
                        <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="text" name="no_telp" class="w-full mt-1 p-2 border border-gray-300 rounded" required>
                    </div>
                    {{-- <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" class="w-full mt-1 p-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" class="w-full mt-1 p-2 border border-gray-300 rounded" required>
                    </div> --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Lokasi</label>
                        <select name="lokasi" class="w-full mt-1 p-2 border border-gray-300 rounded">
                            <option value="">Pilih Lokasi</option>
                            <option value="Berbek">Berbek</option>
                            <option value="Gunung Anyar">Gunung Anyar</option>
                            <option value="Rungkut">Rungkut</option>
                        </select>
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
</x-app-layout>
