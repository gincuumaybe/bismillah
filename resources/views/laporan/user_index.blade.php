{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Saya') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">

                <a href="{{ route('laporan.create') }}"
                    class="inline-flex items-center bg-green-600 text-black px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-700 transition duration-300 mb-4">
                    <x-heroicon-o-plus-circle class="w-5 h-5 mr-2" />
                    + Tambah Laporan
                </a>

                <div class="overflow-x-auto">
                    <table id="laporan-table" class="min-w-full bg-white border border-gray-200 rounded-lg">
                        <thead class="bg-gray-100 text-gray-800">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Judul</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Deskripsi</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Gambar</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporans as $laporan)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-6 py-4">{{ $laporan->judul }}</td>
                                    <td class="px-6 py-4">{{ $laporan->deskripsi }}</td>
                                    <td class="px-6 py-4">
                                        <img src="{{ $laporan->gambar }}" alt="Gambar"
                                            class="w-20 h-20 object-cover rounded shadow-sm border border-gray-300">
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($laporan->status)
                                            <span
                                                class="inline-block px-3 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">
                                                Selesai
                                            </span>
                                        @else
                                            <span
                                                class="inline-block px-3 py-1 text-xs font-semibold text-yellow-800 bg-yellow-200 rounded-full">
                                                Pending
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
                <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#laporan-table').DataTable();
                    });
                </script>
            </div>
        </div>
    </div>
</x-app-layout> --}}

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ __('Laporan Saya') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-xl shadow border border-blue-100">

                <a href="{{ route('laporan.create') }}"
                    class="inline-flex items-center bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700 transition mb-4">
                    <x-heroicon-o-plus-circle class="w-5 h-5 mr-2" />
                    Tambah Laporan
                </a>

                <div class="overflow-x-auto">
                    <table id="laporan-table" class="w-full text-sm text-left text-gray-700 border-collapse">
                        <thead class="bg-blue-100 text-blue-900">
                            <tr>
                                <th class="px-4 py-3 font-semibold border-b border-blue-200">Judul</th>
                                <th class="px-4 py-3 font-semibold border-b border-blue-200">Deskripsi</th>
                                <th class="px-4 py-3 font-semibold border-b border-blue-200">Gambar</th>
                                <th class="px-4 py-3 font-semibold border-b border-blue-200">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($laporans as $laporan)
                                <tr class="hover:bg-blue-50 border-b border-gray-100">
                                    <td class="px-4 py-3 align-top">{{ $laporan->judul }}</td>
                                    <td class="px-4 py-3 align-top">{{ $laporan->deskripsi }}</td>
                                    <td class="px-4 py-3">
                                        <img src="{{ $laporan->gambar }}" alt="Gambar"
                                            class="w-20 h-20 object-cover rounded border border-gray-200">
                                    </td>
                                    <td class="px-4 py-3">
                                        @if ($laporan->status)
                                            <span
                                                class="inline-block px-3 py-1 text-xs font-medium text-green-800 bg-green-200 rounded-full">
                                                Selesai
                                            </span>
                                        @else
                                            <span
                                                class="inline-block px-3 py-1 text-xs font-medium text-yellow-800 bg-yellow-200 rounded-full">
                                                Pending
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
                <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#laporan-table').DataTable({
                            responsive: true,
                            autoWidth: false,
                            language: {
                                search: "Cari:",
                                lengthMenu: "Tampilkan _MENU_ entri",
                                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                                paginate: {
                                    first: "Pertama",
                                    last: "Terakhir",
                                    next: "Berikutnya",
                                    previous: "Sebelumnya"
                                },
                                zeroRecords: "Tidak ditemukan data yang cocok"
                            }
                        });
                    });
                </script>

            </div>
        </div>
    </div>
</x-app-layout> --}}


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ __('Laporan Saya') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-xl shadow-md border border-blue-100">

                <a href="{{ route('laporan.create') }}"
                    class="inline-flex items-center bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700 transition mb-4">
                    <x-heroicon-o-plus-circle class="w-5 h-5 mr-2" />
                    Tambah Laporan
                </a>

                <div class="overflow-x-auto rounded-lg shadow-sm">
                    <table id="laporan-table"
                        class="w-full text-sm text-left text-gray-700 border-collapse rounded-lg overflow-hidden">
                        <thead class="bg-blue-100 text-blue-900 uppercase text-xs tracking-wider font-semibold">
                            <tr>
                                <th class="px-5 py-3 border-b border-blue-200">Judul</th>
                                <th class="px-5 py-3 border-b border-blue-200">Deskripsi</th>
                                <th class="px-5 py-3 border-b border-blue-200">Gambar</th>
                                <th class="px-5 py-3 border-b border-blue-200">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($laporans as $laporan)
                                <tr class="border-b border-blue-50 hover:bg-blue-50 transition-colors duration-300">
                                    <td class="px-5 py-4 align-top">{{ $laporan->judul }}</td>
                                    <td class="px-5 py-4 align-top">{{ $laporan->deskripsi }}</td>
                                    <td class="px-5 py-4">
                                        <img src="{{ $laporan->gambar }}" alt="Gambar"
                                            class="w-20 h-20 object-cover rounded border border-gray-200 shadow-sm">
                                    </td>
                                    <td class="px-5 py-4">
                                        @if ($laporan->status)
                                            <span
                                                class="inline-block px-3 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">
                                                Selesai
                                            </span>
                                        @else
                                            <span
                                                class="inline-block px-3 py-1 text-xs font-semibold text-yellow-800 bg-yellow-200 rounded-full">
                                                Pending
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- DataTables --}}
                <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
                <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#laporan-table').DataTable({
                            responsive: true,
                            autoWidth: false,
                            language: {
                                search: "Cari:",
                                lengthMenu: "Tampilkan _MENU_ entri",
                                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                                paginate: {
                                    first: "Pertama",
                                    last: "Terakhir",
                                    next: "Berikutnya",
                                    previous: "Sebelumnya"
                                },
                                zeroRecords: "Tidak ditemukan data yang cocok"
                            }
                        });
                    });
                </script>

            </div>
        </div>
    </div>
</x-app-layout>
