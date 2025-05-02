<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Penghuni') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-xl shadow-lg space-y-6">

                {{-- Tombol Navigasi --}}
                <div class="flex justify-between items-center">
                    <button onclick="window.location.href='{{ route('dashboard') }}'"
                        class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-300 transition">
                        ← Kembali ke Dashboard
                    </button>

                    <a href="{{ route('penghuni.create') }}"
                        class="flex items-center gap-2 bg-green-600 text-black px-5 py-2 rounded-lg text-sm font-semibold hover:bg-green-700 transition">
                        <x-heroicon-o-plus-circle class="w-5 h-5" />
                        <span>Tambah Penghuni</span>
                    </a>
                </div>

                {{-- Tabel --}}
                <div class="overflow-x-auto">
                    <table id="penghuni-table" class="min-w-full bg-white border border-gray-200 rounded-lg">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Nama</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Email</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">No Telepon</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Lokasi</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-sm">
                            @foreach($penghunis as $penghuni)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $penghuni->name }}</td>
                                <td class="px-6 py-4">{{ $penghuni->email }}</td>
                                <td class="px-6 py-4">{{ $penghuni->phone }}</td>
                                <td class="px-6 py-4">{{ $penghuni->lokasi_kost }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-3">
                                        <a href="{{ route('penghuni.edit', $penghuni->id) }}"
                                            class="inline-flex items-center text-blue-600 hover:text-blue-800 transition">
                                            <x-heroicon-o-pencil class="w-5 h-5 mr-1" />
                                            Edit
                                        </a>
                                        <form action="{{ route('penghuni.destroy', $penghuni->id) }}" method="POST" class="form-hapus inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center text-red-600 hover:text-red-800 transition">
                                                <x-heroicon-o-trash class="w-5 h-5 mr-1" />
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- DataTables & SweetAlert --}}
                <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
                <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                <script>
                    $(document).ready(function () {
                        $('#penghuni-table').DataTable({
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

                        $('.form-hapus').on('submit', function (e) {
                            e.preventDefault();
                            Swal.fire({
                                title: 'Yakin mau hapus?',
                                text: "Data akan hilang permanen!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#d33',
                                cancelButtonColor: '#3085d6',
                                confirmButtonText: 'Ya, hapus!',
                                cancelButtonText: 'Batal'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    this.submit();
                                }
                            });
                        });
                    });
                </script>

                @if (session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: '{{ session('success') }}',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                </script>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
