<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('laporan.create') }}" class="inline-block mb-4 px-4 py-2 bg-green-600 text-black rounded hover:bg-green-700">
                        + Tambah Laporan
                    </a>

                    <table class="min-w-full mt-6 border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider border-b">Nama</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider border-b">Deskripsi</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider border-b">Gambar</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($laporans as $laporan)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $laporan->nama }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $laporan->deskripsi }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">
                                        @if($laporan->gambar)
                                            <img src="{{ asset('storage/' . $laporan->gambar) }}" class="w-16 h-16 object-cover" />
                                        @else
                                            <span>No Image</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900">
                                        <form action="{{ route('laporan.destroy', $laporan->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:text-red-800 transition duration-300">
                                                <x-heroicon-o-trash class="w-5 h-5" />
                                                <span>Hapus</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
