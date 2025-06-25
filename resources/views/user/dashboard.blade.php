<x-app-layout>
    <div class="w-full mx-auto py-10 px-6 min-h-screen space-y-6">

        <!-- Cards dalam satu baris horizontal yang lebih besar -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 w-full">

            {{-- STATUS SEWA --}}
            <div class="bg-blue-100 rounded-2xl shadow-lg p-8 flex flex-col justify-between min-h-[400px]">
                <h2 class="text-3xl font-semibold text-blue-800 mb-6">Status Sewa</h2> <!-- Ukuran font lebih besar -->
                <div class="flex-grow text-lg"> <!-- Teks lebih besar di dalam card -->
                    <p><span class="font-semibold">Nama:</span> {{ Auth::user()->name }}</p>
                    <p><span class="font-semibold">Lokasi Kost:</span> {{ Auth::user()->lokasi_kost }}</p>
                    <p><span class="font-semibold">Nomor Kamar:</span> {{ $penyewaan?->nomor_kamar ?? 'Belum disewa' }}
                    </p>
                    <p><span class="font-semibold">Tanggal Keluar:</span>
                        {{ $penyewaan?->tanggal_keluar ? \Carbon\Carbon::parse($penyewaan->tanggal_keluar)->format('d M Y') : '-' }}
                    </p>
                </div>
            </div>

            {{-- TAGIHAN & PEMBAYARAN --}}
            <div class="bg-blue-200 rounded-2xl shadow-lg p-8 flex flex-col justify-between min-h-[400px]">
                <h2 class="text-3xl font-semibold text-blue-900 mb-6">Tagihan & Pembayaran</h2>
                <!-- Ukuran font lebih besar -->
                <div class="flex-grow text-lg"> <!-- Teks lebih besar di dalam card -->
                    @if ($penyewaan)
                        @php
                            $jatuhTempo = \Carbon\Carbon::parse($penyewaan->tanggal_keluar)->subMonths(
                                $penyewaan->durasi_bulan,
                            );
                        @endphp
                        <p><span class="font-semibold">Durasi Sewa:</span> {{ $penyewaan->durasi_bulan }} bulan</p>
                        <p><span class="font-semibold">Jatuh Tempo Pembayaran:</span>
                            @if (session('pembayaran_sukses'))
                                -
                            @else
                                {{ $jatuhTempo->format('d M Y') }}
                            @endif
                        </p>
                        @if (!session('pembayaran_sukses'))
                            <!-- Hide button if payment is successful -->
                            <a href="{{ route('pembayaran.index') }}"
                                class="inline-block mt-4 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-lg">
                                Bayar Sekarang
                            </a>
                        @endif
                    @else
                        <p class="text-lg">Belum ada data penyewaan.</p> <!-- Ukuran teks lebih besar -->
                    @endif
                </div>
            </div>

            {{-- LAPORAN SAYA --}}
            <div class="bg-blue-50 rounded-2xl shadow-lg p-8 flex flex-col justify-between min-h-[400px]">
                <h2 class="text-3xl font-semibold text-blue-700 mb-6">Laporan Saya</h2> <!-- Ukuran font lebih besar -->
                <div class="flex-grow text-lg"> <!-- Teks lebih besar di dalam card -->
                    <p class="mb-6">Total Laporan yang sudah dibuat: <span
                            class="font-bold text-xl">{{ $jumlahLaporan }}</span></p>
                    <h4 class="text-xl text-gray-700 font-semibold mb-4">Daftar Laporan Terbaru:</h4>
                    <ul class="text-lg text-gray-800 list-disc list-inside"> <!-- Ukuran teks lebih besar -->
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
                    <a href="{{ route('laporan.store') }}"
                        class="inline-block mt-6 text-blue-600 hover:underline text-lg">
                        Buat Laporan Baru →
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
