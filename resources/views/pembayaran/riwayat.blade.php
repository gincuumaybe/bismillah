<x-app-layout>
    <div class="p-6 max-w-4xl mx-auto">

        @if ($transaksis->count() > 0)
            <div class="overflow-x-auto rounded-lg shadow-lg">
                <table class="min-w-full bg-white">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="py-3 px-6 text-left text-sm font-medium">Kode Transaksi</th>
                            <th class="py-3 px-6 text-left text-sm font-medium">Tanggal</th>
                            <th class="py-3 px-6 text-left text-sm font-medium">Total</th>
                            <th class="py-3 px-6 text-left text-sm font-medium">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis as $transaksi)
                            <tr class="border-b hover:bg-blue-50">
                                <td class="py-4 px-6 text-sm font-medium text-gray-700">
                                    {{ $transaksi->kode_transaksi }}
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-600">
                                    {{ $transaksi->created_at->format('d/m/Y H:i') }}
                                </td>
                                <td class="py-4 px-6 text-sm font-semibold text-green-600">
                                    Rp {{ number_format($transaksi->jumlah, 0, ',', '.') }}
                                </td>
                                <td class="py-4 px-6 text-sm">
                                    <span
                                        class="inline-block px-3 py-1 rounded-full text-xs font-semibold
                                        @if ($transaksi->status == 'success') bg-green-200 text-green-800
                                        @elseif($transaksi->status == 'pending') bg-yellow-200 text-yellow-800
                                        @else bg-red-200 text-red-800 @endif">
                                        {{ ucfirst($transaksi->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-12 text-gray-500">
                <svg class="mx-auto h-12 w-12 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <p class="mb-6">Belum ada riwayat pembayaran</p>
                <a href="{{ route('pembayaran.index') }}"
                    class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-md transition">
                    Lakukan Pembayaran
                </a>
            </div>
        @endif
    </div>
</x-app-layout>
