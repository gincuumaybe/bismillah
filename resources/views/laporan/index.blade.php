<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-md rounded-lg">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold text-">Daftar Laporan Keluhan</h3>
                    <a href="{{ route('laporan.create') }}"
                        class="inline-flex items-center bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition text-sm font-semibold">
                        Tambah Laporan
                    </a>
                </div>

                <div class="overflow-x-auto max-w-full">
                    <table id="laporanTable"
                        class="w-full table-fixed border border-gray-200 text-sm rounded overflow-hidden">
                        <thead class="bg-blue-50 text-blue-800">
                            <tr>
                                <th class="px-4 py-2 border">Nama</th>
                                <th class="px-4 py-2 border">Lokasi Kost</th>
                                <th class="px-4 py-2 border">Judul</th>
                                <th class="px-4 py-2 border">Deskripsi</th>
                                <th class="px-4 py-2 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporans as $laporan)
                                <tr class="hover:bg-blue-50 transition">
                                    <td class="px-4 py-2 border">{{ $laporan->user->name ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $laporan->user->lokasi_kost ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $laporan->judul }}</td>
                                    <td class="px-4 py-2 border">{{ Str::limit($laporan->deskripsi, 50) }}</td>
                                    <td class="px-4 py-2 border flex gap-3 justify-center items-center">
                                        <button onclick="confirmDelete({{ $laporan->id }})" title="Hapus"
                                            class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 transition text-xs font-semibold">
                                            Hapus
                                        </button>
                                        <button onclick="showDetailModal({{ $laporan->id }})" title="Lihat Detail"
                                            class="px-3 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition text-xs font-semibold">
                                            Detail
                                        </button>
                                        @if (!$laporan->status)
                                            <form action="{{ route('laporan.setSelesai', $laporan->id) }}"
                                                method="POST" class="inline-block form-selesai" title="Tandai Selesai"
                                                data-laporan-id="{{ $laporan->id }}">
                                                @csrf
                                                @method('PATCH')
                                                <button type="button"
                                                    class="btn-selesai px-3 py-1 bg-green-100 text-green-700 rounded hover:bg-green-200 transition text-xs font-semibold">
                                                    Tandai Selesai
                                                </button>
                                            </form>
                                        @else
                                            <span
                                                class="inline-block px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full"
                                                title="Selesai">
                                                Selesai
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail Gambar -->
    <div id="detailModal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 hidden z-50">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-semibold text-black">Detail Laporan</h3>
                <button onclick="closeDetailModal()"
                    class="text-gray-600 hover:text-black text-2xl font-bold">&times;</button>
            </div>

            <!-- Menampilkan Gambar, Judul, Deskripsi, Status, Nomor Kamar di Modal -->
            <div id="gambarDetail" class="mb-6">
                <!-- Gambar akan dimasukkan di sini melalui JavaScript -->
                <img src="" alt="Gambar Laporan"
                    class="max-w-full max-h-80 object-contain mx-auto rounded-lg shadow-md" />
            </div>
            <div id="judulDetail" class="mt-4 text-xl font-semibold text-black">
                <!-- Judul akan dimasukkan di sini -->
            </div>
            <div id="deskripsiDetail" class="mt-4 text-black text-base leading-relaxed">
                <!-- Deskripsi akan dimasukkan di sini -->
            </div>
            <div id="nomorKamarDetail" class="mt-4 text-black text-base">
                <!-- Nomor kamar akan dimasukkan di sini -->
            </div>
            <div id="statusDetail" class="mt-6">
                <!-- Status akan dimasukkan di sini -->
            </div>
        </div>
    </div>

    {{-- SweetAlert2 dan jQuery --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
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

                // Menambahkan Nomor Kamar dari Tabel Laporan
                const nomorKamar = selectedLaporan.nomor_kamar || 'Tidak tersedia';
                document.getElementById('nomorKamarDetail').innerHTML = `<strong>Nomor Kamar:</strong> ${nomorKamar}`;

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

        // Konfirmasi penghapusan laporan
        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus laporan ini?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/laporan/admin/' + id,
                        type: 'DELETE',
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function() {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Laporan berhasil dihapus.',
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                window.location.reload();
                            });
                        },
                        error: function() {
                            Swal.fire({
                                title: 'Gagal!',
                                text: 'Laporan gagal dihapus.',
                                icon: 'error',
                                confirmButtonText: 'Oke'
                            });
                        }
                    });
                }
            });
        }

        $(document).on('click', '.btn-selesai', function(e) {
            const form = $(this).closest('form');

            Swal.fire({
                title: 'Tandai laporan sebagai selesai?',
                text: "Tindakan ini akan mengubah status laporan.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, tandai selesai',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        $(document).ready(function() {
            $('#laporanTable').DataTable({
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
    </script>
</x-app-layout>
