<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold text-gray-700">Daftar Penghuni</h3>
                    <a href="{{ route('penghuni.create') }}"
                        class="flex items-center gap-2 bg-custom-blue text-white px-4 py-2 rounded-md text-sm font-semibold hover:bg-custom-blue-light transition">
                        <x-heroicon-o-plus-circle class="w-5 h-5" />
                        <span>Tambah</span>
                    </a>
                </div>

                <div class="overflow-x-auto max-w-full">
                    <table id="penghuni-table" class="w-full table-fixed border border-gray-200 text-sm rounded overflow-hidden">
                        <thead class="bg-blue-50 text-blue-800">
                            <tr>
                                <th class="px-4 py-2 border">Nama</th>
                                <th class="px-4 py-2 border">Email</th>
                                <th class="px-4 py-2 border">No. Telepon</th>
                                <th class="px-4 py-2 border">Lokasi</th>
                                <th class="px-4 py-2 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penghunis as $penghuni)
                                <tr class="hover:bg-blue-50 transition">
                                    <td class="px-4 py-2 border">{{ $penghuni->name }}</td>
                                    <td class="px-4 py-2 border">{{ $penghuni->email }}</td>
                                    <td class="px-4 py-2 border">{{ $penghuni->phone }}</td>
                                    <td class="px-4 py-2 border">{{ $penghuni->lokasi_kost }}</td>
                                    <td class="px-4 py-2 border">
                                        <a href="{{ route('penghuni.edit', $penghuni->id) }}"
                                            class="inline-flex items-center justify-center w-9 h-9 bg-blue-100 text-custom-blue rounded-md hover:bg-custom-blue hover:text-white transition"
                                            title="Edit">
                                            <x-heroicon-o-pencil class="w-5 h-5" />
                                        </a>
                                        <form action="{{ route('penghuni.destroy', $penghuni->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center justify-center w-9 h-9 bg-red-100 text-red-600 rounded-md hover:bg-red-600 hover:text-white transition"
                                                title="Hapus">
                                                <x-heroicon-o-trash class="w-5 h-5" />
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


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
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

            $('.form-hapus').on('submit', function(e) {
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
</x-app-layout>
