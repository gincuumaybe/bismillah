<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                class="mt-1 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                class="mt-1 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <div>
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-700">Nomor Telepon</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
                class="mt-1 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <div>
            <label for="lokasi_kost" class="block mb-2 text-sm font-medium text-gray-700">Lokasi Kost</label>
            <select name="lokasi_kost" id="lokasi_kost"
                class="mt-1 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
                <option value="Berbek" {{ old('lokasi_kost', $user->lokasi_kost) == 'Berbek' ? 'selected' : '' }}>Berbek
                </option>
                <option value="Gunung_Anyar"
                    {{ old('lokasi_kost', $user->lokasi_kost) == 'Gunung_Anyar' ? 'selected' : '' }}>Gunung Anyar
                </option>
                <option value="Rungkut" {{ old('lokasi_kost', $user->lokasi_kost) == 'Rungkut' ? 'selected' : '' }}>
                    Rungkut</option>
            </select>
        </div>

        <!-- Menampilkan Foto Profil -->
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Foto Profil</label>
            <div class="mt-2">
                @if ($user->image)
                    <!-- Menampilkan Gambar dari Storage -->
                    <img src="{{ asset('storage/images/' . $user->image) }}" alt="Foto Profil"
                        class="w-24 h-24 rounded-full">
                @else
                    <span class="text-gray-500">Belum ada gambar profil</span>
                @endif
            </div>
            <input type="file" name="image" id="image" accept="image/*"
                class="mt-1 block w-full text-blue-700 file:border file:border-blue-400 file:rounded file:px-6 file:py-3 file:bg-blue-50 file:text-blue-600 cursor-pointer hover:file:bg-blue-100 transition">
        </div>


        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">
            Simpan Perubahan
        </button>
    </form>


</section>
