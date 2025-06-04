{{-- <x-app-layout>
    <div class="p-6 max-w-2xl mx-auto bg-white shadow rounded">
        <h2 class="text-xl font-bold mb-4">Riwayat Pembayaran</h2>
        <table class="w-full table-auto border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-2 py-1">Kode</th>
                    <th class="border px-2 py-1">Jumlah</th>
                    <th class="border px-2 py-1">Status</th>
                    <th class="border px-2 py-1">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transaksis as $trx)
                    <tr>
                        <td class="border px-2 py-1">{{ $trx->kode_transaksi }}</td>
                        <td class="border px-2 py-1">Rp{{ number_format($trx->jumlah) }}</td>
                        <td class="border px-2 py-1">{{ ucfirst($trx->status) }}</td>
                        <td class="border px-2 py-1">{{ $trx->created_at->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-2">Belum ada transaksi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout> --}}
<x-app-layout>
    <div class="p-6 max-w-6xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Riwayat Pembayaran</h2>

        @if($transaksis->count() > 0)
            <div class="space-y-4">
                @foreach($transaksis as $transaksi)
                    <div class="bg-white shadow rounded-lg p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Informasi Transaksi -->
                            <div>
                                <h3 class="font-semibold text-lg mb-3">Informasi Transaksi</h3>
                                <div class="space-y-2">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Kode Transaksi:</span>
                                        <span class="font-medium">{{ $transaksi->kode_transaksi }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Tanggal:</span>
                                        <span class="font-medium">{{ $transaksi->created_at->format('d/m/Y H:i') }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Total:</span>
                                        <span class="font-medium text-green-600">Rp {{ number_format($transaksi->jumlah, 0, ',', '.') }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Status:</span>
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                                            @if($transaksi->status == 'success') bg-green-100 text-green-800
                                            @elseif($transaksi->status == 'pending') bg-yellow-100 text-yellow-800
                                            @else bg-red-100 text-red-800
                                            @endif">
                                            {{ ucfirst($transaksi->status) }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Detail Penyewaan -->
                            @if($transaksi->penyewaan)
                                <div>
                                    <h3 class="font-semibold text-lg mb-3">Detail Penyewaan</h3>
                                    <div class="space-y-2">
                                        <div class="flex justify-between">
                                            <span class="text-gray-600">Lokasi:</span>
                                            <span class="font-medium">{{ str_replace('_', ' ', $transaksi->penyewaan->lokasi_kost) }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-gray-600">Kamar:</span>
                                            <span class="font-medium">{{ $transaksi->penyewaan->nomor_kamar }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-gray-600">Durasi:</span>
                                            <span class="font-medium">{{ $transaksi->penyewaan->durasi_bulan }} bulan</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-gray-600">Periode:</span>
                                            <span class="font-medium">
                                                {{ \Carbon\Carbon::parse($transaksi->penyewaan->tanggal_masuk)->format('d/m/Y') }} -
                                                {{ \Carbon\Carbon::parse($transaksi->penyewaan->tanggal_masuk)->addMonths($transaksi->penyewaan->durasi_bulan)->format('d/m/Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <div class="text-gray-500 mb-4">
                    <svg class="mx-auto h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <p class="text-gray-500">Belum ada riwayat pembayaran</p>
                <a href="{{ route('pembayaran.index') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Lakukan Pembayaran
                </a>
            </div>
        @endif
    </div>
</x-app-layout>
