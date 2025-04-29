<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('laporan.update', $laporan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                            <input type="text" name="nama" value="{{ old('nama', $laporan->nama) }}" class="w-full border-gray-300 rounded-lg shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                            <textarea name="deskripsi" class="w-full border-gray-300 rounded-lg shadow-sm">{{ old('deskripsi', $laporan->deskripsi) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="gambar" class="block text-gray-700 text-sm font-bold mb-2">Gambar</label>
                            <input type="file" name="gambar" class="w-full border-gray-300 rounded-lg shadow-sm">
                            @if($laporan->gambar)
                                <img src="{{ asset('storage/' . $laporan->gambar) }}" class="w-32 h-32 mt-2" alt="gambar laporan">
                            @endif
                        </div>

                        <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
