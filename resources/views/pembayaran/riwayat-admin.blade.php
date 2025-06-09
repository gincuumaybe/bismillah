<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-md rounded-lg">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold text-gray-700">Data Seluruh Transaksi</h3>
                    <button id="downloadPdf"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 inline" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Download PDF
                    </button>
                </div>
                <div class="overflow-x-auto max-w-full">
                    <table id="transaksiTable" class="w-full table-fixed border border-gray-200 text-sm rounded overflow-hidden">
                        <thead class="bg-blue-50 text-blue-800">
                            <tr>
                                <th class="px-4 py-2 border">ID</th>
                                <th class="px-4 py-2 border">Kode Transaksi</th>
                                <th class="px-4 py-2 border">Nama Penyewa</th>
                                <th class="px-4 py-2 border">Lokasi Kost</th>
                                <th class="px-4 py-2 border">Nomor Kamar</th>
                                <th class="px-4 py-2 border">Jumlah (Rp)</th>
                                <th class="px-4 py-2 border">Status</th>
                                <th class="px-4 py-2 border">Tanggal</th>
                                <th class="px-4 py-2 border">Tanggal Keluar</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($transaksis as $transaksi)
                                <tr class="hover:bg-blue-50 transition">
                                    <td class="px-4 py-2 border">{{ $transaksi->id }}</td>
                                    <td class="px-4 py-2 border">{{ $transaksi->kode_transaksi }}</td>
                                    <td class="px-4 py-2 border">{{ $transaksi->user->name ?? 'Tidak ada data' }}</td>
                                    <td class="px-4 py-2 border">{{ $transaksi->user->lokasi_kost ?? 'Tidak ada data' }}</td>
                                    <td class="px-4 py-2 border">
                                        {{ $transaksi->penyewaanKost->nomor_kamar ?? 'Tidak ada data' }}</td>
                                    <td class="px-4 py-2 border">{{ number_format($transaksi->jumlah, 0, ',', '.') }}</td>
                                    <td class="px-4 py-2 border">
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
                                    <td class="px-4 py-2 border">
                                        {{ $transaksi->created_at->timezone('Asia/Jakarta')->format('d M Y H:i') }}
                                    </td>
                                    <td class="px-4 py-2 border">
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
    </div>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.29/jspdf.plugin.autotable.min.js"></script>


    <script>
        $(document).ready(function() {
            // Inisialisasi DataTable cuma sekali
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

            // Tombol Download PDF
            $('#downloadPdf').click(function() {
                const {
                    jsPDF
                } = window.jspdf;
                const doc = new jsPDF('landscape', 'pt', 'a4'); // Landscape mode, pt units

                // Add a title
                doc.setFontSize(18);
                doc.setTextColor(40);
                doc.text("Laporan Transaksi", 40, 40);

                // Prepare table headers
                const headers = [
                    [
                        "ID",
                        "Kode Transaksi",
                        "Nama Penyewa",
                        "Lokasi Kost",
                        "Nomor Kamar",
                        "Jumlah (Rp)",
                        "Status Pembayaran",
                        "Tanggal Masuk",
                        "Tanggal Keluar"
                    ]
                ];

                // Extract data from table
                const data = [];
                $('#transaksiTable tbody tr').each(function() {
                    const row = [];
                    $(this).find('td').each(function() {
                        row.push($(this).text().trim());
                    });
                    data.push(row);
                });

                // Generate autoTable
                doc.autoTable({
                    head: headers,
                    body: data,
                    startY: 60,
                    theme: 'striped', // Clean look with zebra stripes
                    headStyles: {
                        fillColor: [37, 99, 235], // Dark slate (similar to Tailwind slate-800)
                        textColor: 255,
                        fontStyle: 'bold'
                    },
                    alternateRowStyles: {
                        fillColor: [240, 249, 255]
                    },
                    styles: {
                        fontSize: 8,
                        cellPadding: 4,
                        overflow: 'linebreak',
                    },
                    margin: {
                        top: 60,
                        left: 20,
                        right: 20
                    }
                });

                // Save as PDF
                doc.save('data-seluruh-transaksi.pdf');
            });
        });
    </script>
</x-app-layout>
