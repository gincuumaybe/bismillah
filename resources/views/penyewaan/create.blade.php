<x-app-layout>
    <div class="max-w-3xl mx-auto mt-8 p-8 bg-white border rounded-lg shadow-xl">
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">Lengkapi Data Penyewaan</h2>

        <form action="{{ route('penyewaan.store') }}" method="POST" class="mt-4 space-y-6">
            @csrf

            <!-- Nomor Kamar -->
            {{-- <div class="mb-6">
                <label for="nomor_kamar" class="block text-lg font-medium text-gray-700">Nomor Kamar</label>
                <input type="text" id="nomor_kamar" name="nomor_kamar" value="{{ old('nomor_kamar') }}"
                    class="mt-2 p-3 w-full border rounded-md text-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('nomor_kamar')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div> --}}
            <div class="mb-6">
                <label for="nomor_kamar" class="block text-lg font-medium text-gray-700">Nomor Kamar</label>
                <select id="nomor_kamar" name="nomor_kamar"
                    class="mt-2 p-3 w-full border rounded-md text-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="">-- Pilih Nomor Kamar --</option>
                    @foreach ($kamarTersedia as $kamar)
                        <option value="{{ $kamar }}">{{ $kamar }}</option>
                    @endforeach
                </select>
                @error('nomor_kamar')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tanggal Masuk -->
            <div class="mb-6">
                <label for="tanggal_masuk" class="block text-lg font-medium text-gray-700">Tanggal Masuk</label>
                <input type="date" id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}"
                    class="mt-2 p-3 w-full border rounded-md text-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('tanggal_masuk')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Durasi (bulan) -->
            <div class="mb-6">
                <label for="durasi_bulan" class="block text-lg font-medium text-gray-700">Durasi Sewa (Bulan)</label>
                <select id="durasi_bulan" name="durasi_bulan"
                    class="mt-2 p-3 w-full border rounded-md text-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    @for ($i = 1; $i <= 6; $i++)
                        <option value="{{ $i }}" {{ old('durasi_bulan') == $i ? 'selected' : '' }}>
                            {{ $i }} bulan</option>
                    @endfor
                </select>
            </div>

            <!-- Tanggal Keluar (readonly) -->
            <div class="mb-6">
                <label for="tanggal_keluar" class="block text-lg font-medium text-gray-700">Tanggal Keluar</label>
                <input type="date" id="tanggal_keluar" name="tanggal_keluar" value="{{ old('tanggal_keluar') }}"
                    class="mt-2 p-3 w-full border rounded-md text-lg bg-gray-100 cursor-not-allowed" readonly>
            </div>

            <!-- Info durasi -->
            <div id="info_durasi" class="mb-4 text-md text-gray-600"></div>

            <button type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-blue-700 transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300 shadow-lg">
                Simpan Data
            </button>
        </form>
    </div>

    <script>
        const tanggalMasukInput = document.getElementById('tanggal_masuk');
        const durasiInput = document.getElementById('durasi_bulan');
        const tanggalKeluarInput = document.getElementById('tanggal_keluar');
        const infoDurasi = document.getElementById('info_durasi');

        function hitungTanggalKeluar() {
            const tanggalMasuk = new Date(tanggalMasukInput.value);
            const durasi = parseInt(durasiInput.value);

            console.log('Tanggal masuk:', tanggalMasukInput.value); // Debug
            console.log('Durasi:', durasi); // Debug

            if (!isNaN(tanggalMasuk.getTime()) && durasi > 0) {
                // Tambahkan durasi bulan ke tanggal masuk
                const tanggalKeluar = new Date(tanggalMasuk);
                tanggalKeluar.setMonth(tanggalKeluar.getMonth() + durasi);

                // Format tanggal yyyy-mm-dd untuk input date
                const yyyy = tanggalKeluar.getFullYear();
                let mm = tanggalKeluar.getMonth() + 1;
                let dd = tanggalKeluar.getDate();

                if (mm < 10) mm = '0' + mm;
                if (dd < 10) dd = '0' + dd;

                tanggalKeluarInput.value = `${yyyy}-${mm}-${dd}`;

                // Format tanggal untuk display yang lebih readable
                const optionsTanggal = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                const tanggalMasukFormatted = tanggalMasuk.toLocaleDateString('id-ID', optionsTanggal);
                const tanggalKeluarFormatted = tanggalKeluar.toLocaleDateString('id-ID', optionsTanggal);

                // Update info durasi
                infoDurasi.textContent =
                    `Anda menetap selama ${durasi} bulan, dari ${tanggalMasukFormatted} sampai ${tanggalKeluarFormatted}.`;
            } else {
                tanggalKeluarInput.value = '';
                infoDurasi.textContent = '';
            }
        }

        // Event listeners
        tanggalMasukInput.addEventListener('change', hitungTanggalKeluar);
        durasiInput.addEventListener('change', hitungTanggalKeluar);

        // Jalankan saat halaman dimuat dengan delay
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                hitungTanggalKeluar();
            }, 100);
        });

        // Trigger juga saat form di-load
        window.addEventListener('load', function() {
            hitungTanggalKeluar();
        });
    </script>
</x-app-layout>
