<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-lg rounded-lg">

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold text-gray-700">Daftar Laporan</h3>
                    <a href="{{ route('laporan.create') }}"
                       class="inline-flex items-center bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition text-sm font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Laporan
                    </a>
                </div>

                <table id="laporanTable" class="min-w-full table-auto border border-gray-200 text-sm rounded overflow-hidden">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">Judul</th>
                            <th class="px-4 py-2 border">Deskripsi</th>
                            <th class="px-4 py-2 border">Gambar</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($laporans as $laporan)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-2 border">{{ $laporan->judul }}</td>
                                <td class="px-4 py-2 border">{{ $laporan->deskripsi }}</td>
                                <td class="px-4 py-2 border">
                                    <img src="{{ asset('storage/' . $laporan->gambar) }}" class="w-20 h-20 object-cover rounded" alt="Gambar">
                                </td>
                                <td class="px-4 py-2 border space-y-2">
                                    <a href="{{ route('laporan.edit', $laporan->id) }}"
                                       class="inline-block bg-yellow-500 text-black px-3 py-1 rounded hover:bg-yellow-600 transition text-sm font-semibold">
                                        Edit
                                    </a>

                                    <button onclick="confirmDelete({{ $laporan->id }})"
                                            class="inline-block bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition text-sm font-semibold">
                                        Delete
                                    </button>

                                    @if (!$laporan->status)
                                        <form action="{{ route('laporan.setSelesai', $laporan->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                    class="inline-block bg-green-600 text-black px-3 py-1 rounded hover:bg-green-700 transition text-sm font-semibold">
                                                Tandai Selesai
                                            </button>
                                        </form>
                                    @else
                                        <span class="inline-block px-3 py-1 text-xs font-medium bg-green-200 text-green-800 rounded-full">
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

    {{-- SweetAlert & DataTable --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#laporanTable').DataTable();
        });

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
                        url: '/laporan/' + id,
                        type: 'DELETE',
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function() {
                            window.location.reload();
                        },
                        error: function() {
                            alert('Gagal menghapus laporan.');
                        }
                    });
                }
            });
        }
    </script>
</x-app-layout>
