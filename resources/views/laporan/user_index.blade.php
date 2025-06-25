<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-blue-800 leading-tight">
            {{ __('Laporan Saya') }}
        </h2>
    </x-slot>

    <div class="h-screen py-6">
        <div class="w-full px-6 sm:px-8 lg:px-12">
            <div class="bg-white p-6 rounded-xl shadow-md border border-blue-100 min-h-[80vh]">

                <!-- Header Section -->
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-semibold text-black">Laporkan Masalah Kost</h3>
                    <a href="{{ route('laporan.create') }}"
                        class="inline-flex items-center bg-blue-600 text-white px-6 py-3 rounded-md text-sm font-medium hover:bg-blue-700 transition duration-300">
                        <x-heroicon-o-plus-circle class="w-5 h-5 mr-2" />
                        Tambah Laporan
                    </a>
                </div>

                <!-- Tabel Laporan -->
                <div class="overflow-x-auto rounded-lg shadow-md mb-6 w-full">
                    <table id="laporan-table"
                        class="w-full text-base text-left text-gray-700 border-collapse rounded-lg overflow-hidden">
                        <thead class="bg-blue-100 text-blue-900 uppercase text-sm tracking-wider font-semibold">
                            <tr>
                                <th class="px-6 py-4 border-b border-blue-200">Judul</th>
                                <th class="px-6 py-4 border-b border-blue-200">Deskripsi</th>
                                <th class="px-6 py-4 border-b border-blue-200">Status</th>
                                <th class="px-6 py-4 border-b border-blue-200">Detail</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($laporans as $laporan)
                                <tr class="border-b border-blue-50 hover:bg-blue-50 transition-colors duration-300">
                                    <td class="px-6 py-5 align-top font-medium">{{ $laporan->judul }}</td>
                                    <td class="px-6 py-5 align-top">{{ Str::limit($laporan->deskripsi, 50) }}</td>
                                    <td class="px-6 py-5 text-center">
                                        @if ($laporan->status)
                                            <span
                                                class="inline-block px-4 py-2 text-sm font-semibold text-green-800 bg-green-200 rounded-full">
                                                Selesai
                                            </span>
                                        @else
                                            <span
                                                class="inline-block px-4 py-2 text-sm font-semibold text-yellow-800 bg-yellow-200 rounded-full">
                                                Pending
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-5 text-center">
                                        <button onclick="showDetailModal({{ $laporan->id }})"
                                            class="text-blue-600 hover:underline font-medium">Lihat Detail</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Modal Detail Gambar -->
                <div id="detailModal"
                    class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 hidden z-50">
                    <div class="bg-white p-8 rounded-lg shadow-lg max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-semibold text-gray-700">Detail Laporan</h3>
                            <button onclick="closeDetailModal()"
                                class="text-gray-600 hover:text-gray-800 text-2xl font-bold">&times;</button>
                        </div>

                        <!-- Menampilkan Gambar, Judul, Deskripsi, Status di Modal -->
                        <div id="gambarDetail" class="mb-6">
                            <!-- Gambar akan dimasukkan di sini melalui JavaScript -->
                        </div>
                        <div id="judulDetail" class="mt-4 text-xl font-semibold text-gray-800">
                            <!-- Judul akan dimasukkan di sini -->
                        </div>
                        <div id="deskripsiDetail" class="mt-4 text-gray-600 text-base leading-relaxed">
                            <!-- Deskripsi akan dimasukkan di sini -->
                        </div>
                        <div id="statusDetail" class="mt-6">
                            <!-- Status akan dimasukkan di sini -->
                        </div>
                    </div>
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
                            pageLength: 15, // Menampilkan lebih banyak baris per halaman
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
                            },
                            columnDefs: [{
                                    targets: [0],
                                    className: 'font-medium'
                                },
                                {
                                    targets: [1],
                                    className: 'text-justify'
                                },
                                {
                                    targets: [2, 3],
                                    className: 'text-center'
                                }
                            ]
                        });
                    });

                    // Menampilkan Modal Detail
                    function showDetailModal(laporanId) {
                        const laporan = @json($laporans); // Mengambil semua laporan dari PHP ke JavaScript

                        const selectedLaporan = laporan.find(l => l.id === laporanId);

                        if (selectedLaporan) {
                            document.getElementById('gambarDetail').innerHTML = selectedLaporan.gambar ?
                                `<img src="{{ asset('storage/') }}/${selectedLaporan.gambar}" alt="Gambar Laporan" class="w-full h-80 object-cover rounded-lg shadow-md">` :
                                `<div class="w-full h-32 bg-gray-100 rounded-lg flex items-center justify-center"><span class="text-gray-500 text-lg">Tidak ada gambar</span></div>`;

                            document.getElementById('judulDetail').innerHTML = `<strong>Judul:</strong> ${selectedLaporan.judul}`;
                            document.getElementById('deskripsiDetail').innerHTML =
                                `<strong>Deskripsi:</strong><br> ${selectedLaporan.deskripsi}`;

                            // Status
                            const statusText = selectedLaporan.status ?
                                '<span class="inline-block px-4 py-2 text-sm font-semibold text-green-800 bg-green-200 rounded-full">Selesai</span>' :
                                '<span class="inline-block px-4 py-2 text-sm font-semibold text-yellow-800 bg-yellow-200 rounded-full">Pending</span>';
                            document.getElementById('statusDetail').innerHTML = `<strong>Status:</strong> ${statusText}`;

                            // Tampilkan modal
                            document.getElementById('detailModal').classList.remove('hidden');
                        }
                    }

                    // Menutup Modal
                    function closeDetailModal() {
                        document.getElementById('detailModal').classList.add('hidden');
                    }
                </script>

            </div>
        </div>
    </div>
</x-app-layout>
