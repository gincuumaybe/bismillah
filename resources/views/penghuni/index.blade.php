


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Penghuni') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <a href="{{ route('penghuni.create') }}" class="bg-green-600 text-black px-6 py-2 rounded-lg text-sm font-semibold hover:bg-green-700 transition duration-300 flex space-x-2 w-max">
                    <x-heroicon-o-plus-circle class="w-5 h-5" />
                    <span>+ Tambah Penghuni</span>
                </a>

                <table class="mt-6 w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider border-b">Nama</th>
                            {{-- <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider border-b">No Telepon</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider border-b">Email</th> --}}
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider border-b">Lokasi</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($penghunis as $penghuni)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $penghuni->nama }}</td>
                                {{-- <td class="px-6 py-4 text-sm text-gray-900">{{ $penghuni->no_telp }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $penghuni->email }}</td> --}}
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $penghuni->lokasi }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('penghuni.edit', $penghuni->id) }}" class="text-blue-600 hover:text-blue-800 transition duration-300 flex items-center space-x-1">
                                            <x-heroicon-o-pencil class="w-5 h-5" />
                                            <span>Edit</span>
                                        </a>
                                        <form action="{{ route('penghuni.destroy', $penghuni->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:text-red-800 transition duration-300 flex items-center space-x-1" type="submit">
                                                <x-heroicon-o-trash class="w-5 h-5" />
                                                <span>Hapus</span>
                                            </button>
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
