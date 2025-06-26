<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-black mb-2">Edit Data Penghuni</h2>
            </div>

            <!-- Form Card -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('penghuni.update', $penghuni->id) }}" method="POST" id="editForm"
                        class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Nama Field -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-black">Nama Penghuni</label>
                            <input type="text" name="name" value="{{ old('name', $penghuni->name) }}"
                                class="w-full px-4 py-3 border border-black rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                        </div>

                        <!-- Email Field -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-black">Email Penghuni</label>
                            <input type="email" name="email" value="{{ old('email', $penghuni->email) }}"
                                class="w-full px-4 py-3 border border-black rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                        </div>

                        <!-- No Telepon Field -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-black">No Telepon Penghuni</label>
                            <input type="text" name="no_telp" value="{{ old('no_telp', $penghuni->phone) }}"
                                class="w-full px-4 py-3 border border-black rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                        </div>

                        <!-- Lokasi Kost Field -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-black">Lokasi Penghuni</label>
                            <select name="lokasi_kost" class="w-full border-black rounded-lg shadow-sm">
                                <option value="Gunung_Anyar"
                                    {{ old('lokasi_kost', $penghuni->lokasi_kost) === 'Gunung_Anyar' ? 'selected' : '' }}>
                                    Gunung Anyar</option>
                                <option value="Berbek"
                                    {{ old('lokasi_kost', $penghuni->lokasi_kost) === 'Berbek' ? 'selected' : '' }}>
                                    Berbek</option>
                                <option value="Rungkut"
                                    {{ old('lokasi_kost', $penghuni->lokasi_kost) === 'Rungkut' ? 'selected' : '' }}>
                                    Rungkut</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit"
                                class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg shadow hover:bg-blue-700 transition">Perbarui
                                Data Penghuni</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const form = document.getElementById('editForm');
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Yakin ingin menyimpan perubahan?',
                text: 'Perubahan yang dilakukan tidak dapat dibatalkan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, simpan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
</x-app-layout>
