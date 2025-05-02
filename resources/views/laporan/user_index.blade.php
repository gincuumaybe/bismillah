


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-700">Daftar Laporan Saya</h3>
                    <a href="{{ route('laporan.create') }}"
                       class="inline-flex items-center bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700 transition text-sm font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Laporan
                    </a>
                </div>

                <!-- Tampilkan tabel laporan -->
                <table class="min-w-full table-auto border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border text-left">Judul</th>
                            <th class="px-4 py-2 border text-left">Deskripsi</th>
                            <th class="px-4 py-2 border text-left">Gambar</th>
                            <th class="px-4 py-2 border text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($laporans as $laporan)
                            <tr>
                                <td class="px-4 py-2 border">{{ $laporan->judul }}</td>
                                <td class="px-4 py-2 border">{{ $laporan->deskripsi }}</td>
                                <td class="px-4 py-2 border">
                                    <img src="{{ $laporan->gambar }}" alt="Gambar" class="w-20 h-20 object-cover rounded">
                                </td>
                                <td class="px-4 py-2 border">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('laporan.edit', $laporan->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                                        <form action="{{ route('laporan.destroy', $laporan->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
