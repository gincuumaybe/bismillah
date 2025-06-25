<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-lg rounded-lg">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold text-black">Daftar Laporan Transaksi</h3>
                    <button id="downloadPdf"
                        class="inline-flex items-center bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition text-sm font-semibold shadow-md">
                        Download PDF
                    </button>
                </div>

                <div class="overflow-x-auto max-w-full bg-white rounded-lg">
                    <table id="transaksiTable"
                        class="w-full table-auto text-sm text-left text-black border-collapse rounded-lg">
                        <thead class="bg-indigo-100 text-blue-700">
                            <tr>
                                <th class="px-4 py-3 border">ID</th>
                                <th class="px-4 py-3 border">Kode Transaksi</th>
                                <th class="px-4 py-3 border">Nama Penyewa</th>
                                <th class="px-4 py-3 border">Lokasi Kost</th>
                                <th class="px-4 py-3 border">Nomor Kamar</th>
                                <th class="px-4 py-3 border">Jumlah (Rp)</th>
                                <th class="px-4 py-3 border">Status</th>
                                <th class="px-4 py-3 border">Tanggal Masuk</th>
                                <th class="px-4 py-3 border">Tanggal Keluar</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($transaksis as $transaksi)
                                <tr class="hover:bg-indigo-50 transition">
                                    <td class="px-4 py-3 border">{{ $transaksi->id }}</td>
                                    <td class="px-4 py-3 border">{{ $transaksi->kode_transaksi }}</td>
                                    <td class="px-4 py-3 border text-black">
                                        {{ $transaksi->user->name ?? 'Tidak ada data' }}</td>
                                    <td class="px-4 py-3 border text-black">
                                        {{ $transaksi->user->lokasi_kost ?? 'Tidak ada data' }}</td>
                                    <td class="px-4 py-3 border text-black">
                                        {{ $transaksi->penyewaanKost->nomor_kamar ?? 'Tidak ada data' }}</td>
                                    <td class="px-4 py-3 border text-black">
                                        {{ number_format($transaksi->jumlah, 0, ',', '.') }}</td>
                                    <td class="px-4 py-3 border">
                                        @if ($transaksi->status == 'success')
                                            <span
                                                class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Sukses</span>
                                        @elseif($transaksi->status == 'pending')
                                            <span
                                                class="px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-100 rounded-full">Pending</span>
                                        @else
                                            <span
                                                class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full">Gagal</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 border text-black">
                                        {{ $transaksi->created_at->timezone('Asia/Jakarta')->format('d M Y H:i') }}</td>
                                    <td class="px-4 py-3 border text-black">
                                        {{ $transaksi->penyewaanKost && $transaksi->penyewaanKost->tanggal_keluar
                                            ? \Carbon\Carbon::parse($transaksi->penyewaanKost->tanggal_keluar)->timezone('Asia/Jakarta')->format('d M Y H:i')
                                            : '-' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div id="detailModal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 hidden z-50">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-semibold text-gray-700">Detail Laporan</h3>
                <button onclick="closeDetailModal()"
                    class="text-gray-600 hover:text-gray-800 text-2xl font-bold">&times;</button>
            </div>

            <!-- Menampilkan Gambar, Judul, Deskripsi, Status, Nomor Kamar di Modal -->
            <div id="gambarDetail" class="mb-6">
                <!-- Gambar akan dimasukkan di sini melalui JavaScript -->
            </div>
            <div id="judulDetail" class="mt-4 text-xl font-semibold text-gray-800"></div>
            <div id="deskripsiDetail" class="mt-4 text-gray-600 text-base leading-relaxed"></div>
            <div id="nomorKamarDetail" class="mt-4 text-gray-600 text-base"></div>
            <div id="statusDetail" class="mt-6"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        // Menampilkan Modal Detail
        function showDetailModal(laporanId) {
            const laporan = @json($transaksis); // Mengambil semua laporan dari PHP ke JavaScript

            const selectedLaporan = laporan.find(l => l.id === laporanId);

            if (selectedLaporan) {
                document.getElementById('gambarDetail').innerHTML = selectedLaporan.gambar ?
                    `<img src="{{ asset('storage/') }}/${selectedLaporan.gambar}" alt="Gambar Laporan" class="w-full h-80 object-cover rounded-lg shadow-md">` :
                    `<div class="w-full h-32 bg-gray-100 rounded-lg flex items-center justify-center"><span class="text-gray-500 text-lg">Tidak ada gambar</span></div>`;

                document.getElementById('judulDetail').innerHTML = `<strong>Judul:</strong> ${selectedLaporan.judul}`;
                document.getElementById('deskripsiDetail').innerHTML =
                    `<strong>Deskripsi:</strong><br> ${selectedLaporan.deskripsi}`;
                document.getElementById('nomorKamarDetail').innerHTML =
                    `<strong>Nomor Kamar:</strong> ${selectedLaporan.nomor_kamar || 'Tidak tersedia'}`;

                const statusText = selectedLaporan.status ?
                    '<span class="inline-block px-4 py-2 text-sm font-semibold text-green-800 bg-green-200 rounded-full">Selesai</span>' :
                    '<span class="inline-block px-4 py-2 text-sm font-semibold text-yellow-800 bg-yellow-200 rounded-full">Pending</span>';
                document.getElementById('statusDetail').innerHTML = `<strong>Status:</strong> ${statusText}`;

                document.getElementById('detailModal').classList.remove('hidden');
            }
        }

        function closeDetailModal() {
            document.getElementById('detailModal').classList.add('hidden');
        }

        // Inisialisasi DataTable
        $(document).ready(function() {
            $('#transaksiTable').DataTable({
                responsive: true,
                pageLength: 10,
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ entri",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    paginate: {
                        first: "Awal",
                        last: "Akhir",
                        next: "→",
                        previous: "←"
                    }
                }
            });
        });
    </script>
</x-app-layout>
