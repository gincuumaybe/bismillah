<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Laporan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">
                <form action="{{ route('laporan.update', $laporan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama', $laporan->nama) }}" class="w-full border-gray-300 rounded mt-1" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" rows="4" class="w-full border-gray-300 rounded mt-1" required>{{ old('deskripsi', $laporan->deskripsi) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Gambar Baru (Opsional)</label>
                        <input type="file" name="gambar" class="mt-1">
                        @if($laporan->gambar)
                            <p class="text-sm mt-2">Gambar saat ini:</p>
                            <img src="{{ $laporan->gambar }}" alt="Gambar" class="w-20 h-20 object-cover">
                        @endif
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('laporan.index') }}" class="bg-gray-300 text-black px-4 py-2 rounded mr-2">Batal</a>
                        <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
