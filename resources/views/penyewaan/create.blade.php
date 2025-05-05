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

            <button type="submit" class="w-full bg-blue-500 text-black py-2 rounded-md hover:bg-blue-600">Simpan Data</button>
        </form>
    </div>
</x-app-layout>


