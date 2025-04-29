<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Penghuni') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <form action="{{ route('penghuni.update', $penghuni->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                        <input type="text" name="name" value="{{ old('name', $penghuni->name) }}" class="w-full border-gray-300 rounded-lg shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Lokasi</label>
                        <select name="lokasi" class="w-full border-gray-300 rounded-lg shadow-sm">
                            <option value="Gunung Anyar" {{ old('lokasi', $penghuni->lokasi) === 'Gunung Anyar' ? 'selected' : '' }}>Gunung Anyar</option>
                            <option value="Berbek" {{ old('lokasi', $penghuni->lokasi) === 'Berbek' ? 'selected' : '' }}>Berbek</option>
                            <option value="Rungkut" {{ old('lokasi', $penghuni->lokasi) === 'Rungkut' ? 'selected' : '' }}>Rungkut</option>
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
