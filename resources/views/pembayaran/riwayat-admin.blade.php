<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-lg rounded-lg">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold text-black">Daftar Laporan Transaksi</h3>
                    <button id="exportExcel"
                        class="inline-flex items-center bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition text-sm font-semibold shadow-md"
                        onclick="window.location.href='{{ route('pembayaran.exportExcel') }}'">
                        Export Excel
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
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
