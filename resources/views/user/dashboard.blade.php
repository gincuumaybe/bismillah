<x-app-layout>
    <div class="max-w-6xl mx-auto py-10 px-6 space-y-6">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            {{-- STATUS SEWA --}}
            <div class="bg-blue-100 rounded-2xl shadow p-6">
                <h2 class="text-lg font-semibold text-blue-800 mb-2">Status Sewa</h2>
                <p><span class="font-semibold">Nama:</span> {{ Auth::user()->name }}</p>
                <p><span class="font-semibold">Lokasi Kost:</span> {{ Auth::user()->lokasi_kost }}</p>
                <p><span class="font-semibold">Nomor Kamar:</span> {{ $penyewaan?->nomor_kamar ?? 'Belum disewa' }}</p>
                <p><span class="font-semibold">Tanggal Keluar:</span>
                    {{ $penyewaan?->tanggal_keluar ? \Carbon\Carbon::parse($penyewaan->tanggal_keluar)->format('d M Y') : '-' }}
                </p>
            </div>

            {{-- TAGIHAN & PEMBAYARAN --}}
            <div class="bg-blue-200 rounded-2xl shadow p-6">
                <h2 class="text-lg font-semibold text-blue-900 mb-2">Tagihan & Pembayaran</h2>
                @if ($penyewaan)
                    @php
                        $jatuhTempo = \Carbon\Carbon::parse($penyewaan->tanggal_keluar)->subMonths(
                            $penyewaan->durasi_bulan,
                        );
                    @endphp
                    <p><span class="font-semibold">Durasi Sewa:</span> {{ $penyewaan->durasi_bulan }} bulan</p>
                    <p><span class="font-semibold">Jatuh Tempo Pembayaran:</span> {{ $jatuhTempo->format('d M Y') }}</p>
                    <a href="{{ route('pembayaran.index') }}"
                        class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Bayar Sekarang
                    </a>
                @else
                    <p>Belum ada data penyewaan.</p>
                @endif
            </div>

            {{-- LAPORAN SAYA --}}
            <div class="bg-blue-50 rounded-2xl shadow p-6">
                <h2 class="text-lg font-semibold text-blue-700 mb-2">Laporan Saya</h2>
                <p class="mb-2">Total Laporan yang sudah dibuat: <span class="font-bold">{{ $jumlahLaporan }}</span>
                </p>
                <h4 class="text-sm text-gray-700 font-semibold mb-1">Daftar Laporan Terbaru:</h4>
                <ul class="text-sm text-gray-800 list-disc list-inside">
                    @forelse ($laporans as $laporan)
                        <li>
                            {{ $laporan->judul }} -
                            <span class="italic {{ $laporan->status ? 'text-green-600' : 'text-yellow-600' }}">
                                {{ $laporan->status ? 'Selesai' : 'Belum selesai' }}
                            </span>
                        </li>
                    @empty
                        <li class="text-gray-500">Belum ada laporan</li>
                    @endforelse
                </ul>
                <a href="{{ route('laporan.store') }}" class="inline-block mt-4 text-blue-600 hover:underline text-sm">
                    Buat Laporan Baru →
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
