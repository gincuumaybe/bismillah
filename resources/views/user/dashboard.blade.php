<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 px-6 space-y-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Kartu: Jumlah Laporan -->
            <div class="bg-red-500 rounded-2xl shadow p-6">
                <h2 class="text-lg font-semibold mb-2">Laporan Saya</h2>
                <p>Total Laporan yang sudah dibuat: {{ $jumlahLaporan }}</p>
                <h4>Daftar Laporan Terbaru:</h4>
                <ul>
                @forelse ($laporans as $laporan)
                    <li>{{ $laporan->judul }} - Status: {{ $laporan->status ? 'Selesai' : 'Belum selesai' }}</li>
                @empty
                    <li>Belum ada laporan</li>
                @endforelse
            </div>

            <!-- Kartu: Pembayaran Kost -->
            {{-- <div class="bg-white rounded-2xl shadow p-6">
                <h2 class="text-lg font-semibold mb-2">Pembayaran Berikutnya</h2>
                <p class="text-xl font-bold text-gray-800">
                    {{ \Carbon\Carbon::parse($tanggalPembayaran)->translatedFormat('d F Y') }}
                </p>

                @php
                    $sisaHari = \Carbon\Carbon::parse($tanggalPembayaran)->diffInDays(now());
                @endphp

                @if($sisaHari <= 3)
                    <p class="text-sm text-red-600 font-medium mt-1">
                        🔔 Segera bayar! Jatuh tempo dalam {{ $sisaHari }} hari.
                    </p>
                @else
                    <p class="text-sm text-gray-500 mt-1">
                        Jangan lupa bayar sebelum tanggal tersebut ya.
                    </p>
                @endif
            </div> --}}
        </div>
    </div>
</x-app-layout>
