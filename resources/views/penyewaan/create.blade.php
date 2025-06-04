{{-- <x-app-layout>
    <div class="max-w-md mx-auto mt-8 p-6 bg-white border rounded-md shadow-lg">
        <h2 class="text-xl font-semibold text-center">Lengkapi Data Penyewaan</h2>

        <form action="{{ route('penyewaan.store') }}" method="POST" class="mt-4">
            @csrf

            <!-- Nomor Kamar -->
            <div class="mb-4">
                <label for="nomor_kamar" class="block text-sm font-medium text-gray-700">Nomor Kamar</label>
                <input type="text" id="nomor_kamar" name="nomor_kamar" value="{{ old('nomor_kamar') }}" class="mt-1 p-2 w-full border rounded-md" required>
                @error('nomor_kamar')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tanggal Masuk -->
            <div class="mb-4">
                <label for="tanggal_masuk" class="block text-sm font-medium text-gray-700">Tanggal Masuk</label>
                <input type="date" id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}" class="mt-1 p-2 w-full border rounded-md" required>
                @error('tanggal_masuk')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Durasi (bulan) -->
            <div class="mb-4">
                <label for="durasi_bulan" class="block text-sm font-medium text-gray-700">Durasi Sewa (Bulan)</label>
                <select id="durasi_bulan" name="durasi_bulan" class="mt-1 p-2 w-full border rounded-md" required>
                    @for ($i = 1; $i <= 6; $i++)
                        <option value="{{ $i }}" {{ old('durasi_bulan') == $i ? 'selected' : '' }}>{{ $i }} bulan</option>
                    @endfor
                </select>
            </div>


             <!-- Tanggal Keluar (readonly) -->
            <div class="mb-4">
                <label for="tanggal_keluar" class="block text-sm font-medium text-gray-700">Tanggal Keluar</label>
                <input type="date" id="tanggal_keluar" name="tanggal_keluar" value="" class="mt-1 p-2 w-full border rounded-md bg-gray-100" readonly>
            </div>

            <!-- Info durasi -->
            <div id="info_durasi" class="mb-4 text-sm text-gray-600"></div>

            <button type="submit" class="w-full bg-blue-500 text-black py-2 rounded-md hover:bg-blue-600">Simpan Data</button>
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

                // Update info durasi
                infoDurasi.textContent = `Anda menetap selama ${durasi} bulan, dari ${tanggalMasukInput.value} sampai ${tanggalKeluarInput.value}.`;
            } else {
                tanggalKeluarInput.value = '';
                infoDurasi.textContent = '';
            }
        }

        tanggalMasukInput.addEventListener('change', hitungTanggalKeluar);
        durasiInput.addEventListener('change', hitungTanggalKeluar);

        // Jika ada nilai default di form, hitung tanggal keluar langsung
        if(tanggalMasukInput.value && durasiInput.value) {
            hitungTanggalKeluar();
        }
    </script>
</x-app-layout> --}}

<x-app-layout>
    <div class="max-w-md mx-auto mt-8 p-6 bg-white border rounded-md shadow-lg">
        <h2 class="text-xl font-semibold text-center">Lengkapi Data Penyewaan</h2>

        <form action="{{ route('penyewaan.store') }}" method="POST" class="mt-4">
            @csrf

            <!-- Nomor Kamar -->
            <div class="mb-4">
                <label for="nomor_kamar" class="block text-sm font-medium text-gray-700">Nomor Kamar</label>
                <input type="text" id="nomor_kamar" name="nomor_kamar" value="{{ old('nomor_kamar') }}" class="mt-1 p-2 w-full border rounded-md" required>
                @error('nomor_kamar')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tanggal Masuk -->
            <div class="mb-4">
                <label for="tanggal_masuk" class="block text-sm font-medium text-gray-700">Tanggal Masuk</label>
                <input type="date" id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}" class="mt-1 p-2 w-full border rounded-md" required>
                @error('tanggal_masuk')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Durasi (bulan) -->
            <div class="mb-4">
                <label for="durasi_bulan" class="block text-sm font-medium text-gray-700">Durasi Sewa (Bulan)</label>
                <select id="durasi_bulan" name="durasi_bulan" class="mt-1 p-2 w-full border rounded-md" required>
                    @for ($i = 1; $i <= 6; $i++)
                        <option value="{{ $i }}" {{ old('durasi_bulan') == $i ? 'selected' : '' }}>{{ $i }} bulan</option>
                    @endfor
                </select>
            </div>

             <!-- Tanggal Keluar (readonly) -->
            <div class="mb-4">
                <label for="tanggal_keluar" class="block text-sm font-medium text-gray-700">Tanggal Keluar</label>
                <input type="date" id="tanggal_keluar" name="tanggal_keluar" value="{{ old('tanggal_keluar') }}" class="mt-1 p-2 w-full border rounded-md bg-gray-100" readonly>
            </div>

            <!-- Info durasi -->
            <div id="info_durasi" class="mb-4 text-sm text-gray-600"></div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Simpan Data</button>
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
                const optionsTanggal = { year: 'numeric', month: 'long', day: 'numeric' };
                const tanggalMasukFormatted = tanggalMasuk.toLocaleDateString('id-ID', optionsTanggal);
                const tanggalKeluarFormatted = tanggalKeluar.toLocaleDateString('id-ID', optionsTanggal);

                // Update info durasi
                infoDurasi.textContent = `Anda menetap selama ${durasi} bulan, dari ${tanggalMasukFormatted} sampai ${tanggalKeluarFormatted}.`;
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
