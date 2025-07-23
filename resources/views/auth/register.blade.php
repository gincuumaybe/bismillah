{{-- @extends('layouts.welcome-layout')

@section('content')
    <div class="h-screen w-screen relative">
        <!-- Wallpaper -->
        <div class="absolute inset-0">
            <img src="{{ asset('images/wallpaper.png') }}" alt="Wallpaper" class="w-full h-full object-cover brightness-50">
        </div>

        <!-- Register Form Card -->
        <div class="relative z-10 flex justify-center items-center h-full px-4">
            <div class="w-full max-w-md bg-white bg-opacity-90 backdrop-blur-md rounded-xl shadow-lg p-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Daftar</h2>
                    <p class="text-gray-600">Mohon diisi dengan benar</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('register') }}" id="register-form" enctype="multipart/form-data">
                    @csrf

                    <!-- Name -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input id="name" type="text" name="name"
                            class="mt-1 block w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            :value="old('name')" required autofocus>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" type="email" name="email"
                            class="mt-1 block w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            :value="old('email')" required>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Phone -->
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input id="phone" type="tel" name="phone"
                            class="mt-1 block w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            :value="old('phone')" required>
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" type="password" name="password"
                            class="mt-1 block w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                            Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation"
                            class="mt-1 block w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Form for Uploading Image -->
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700">Masukkan Foto KTP</label>
                        <input type="file" id="image" name="image" accept="image/*"
                            class="mt-1 block w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <!-- Lokasi Kost -->
                    <div class="mb-4">
                        <label for="lokasi_kost" class="block text-sm font-medium text-gray-700">Pilih Lokasi Kost</label>
                        <select id="lokasi_kost" name="lokasi_kost" required
                            class="mt-1 block w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">-- Pilih Lokasi --</option>
                            <option value="Berbek">Berbek</option>
                            <option value="Gunung_Anyar">Gunung Anyar</option>
                            <option value="Rungkut">Rungkut</option>
                        </select>
                        <x-input-error :messages="$errors->get('lokasi_kost')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" id="submit-btn"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300 shadow-lg">
                        Daftar
                    </button>

                    <!-- Login Link -->
                    <div class="mt-4 text-center">
                        <p class="text-sm text-gray-500">
                            Sudah punya akun?
                            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Masuk di sini</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('register-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const form = this;

            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            Swal.fire({
                title: 'Yakin data sudah benar?',
                text: 'Pastikan semua informasi sudah sesuai.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, daftar!',
                cancelButtonText: 'Periksa lagi'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
@endsection --}}


{{-- @extends('layouts.welcome-layout')

@section('content')
    <div class="h-screen w-screen flex justify-center items-center">
        <div class="w-full h-full bg-white shadow-none rounded-none overflow-hidden flex">
            <!-- Left Side - Image Section -->
            <div class="hidden lg:block lg:w-1/2 relative">
                <div
                    class="h-full bg-gradient-to-br from-custom-blue to-custom-blue-light flex items-center justify-center relative">
                    <div class="text-center text-white z-10">
                        <h3 class="text-2xl font-bold mb-2">Selamat datang!</h3>
                        <p class="text-blue-100">Buat akun, untuk dapat menggunakan sistem Rumah Kost Rahmatika</p>
                    </div>
                </div>
            </div>

            <!-- Right Side - Register Form -->
            <div class="w-full lg:w-1/2 p-8 lg:p-12">
                <div class="max-w-md mx-auto">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">Register</h2>
                        <p class="text-gray-600">Isi dengan sesuai</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" id="register-form">
                        @csrf

                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input id="name" type="text" name="name"
                                class="mt-1 block w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                :value="old('name')" required autofocus>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input id="email" type="email" name="email"
                                class="mt-1 block w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                :value="old('email')" required>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Phone -->
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                            <input id="phone" type="tel" name="phone"
                                class="mt-1 block w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                :value="old('phone')" required>
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input id="password" type="password" name="password"
                                class="mt-1 block w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                                Password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                class="mt-1 block w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <!-- Form for Uploading Image -->
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">Masukkan Foto KTP</label>
                            <input type="file" id="image" name="image" accept="image/*"
                                class="mt-1 block w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <!-- Lokasi Kost -->
                        <div class="mb-4">
                            <label for="lokasi_kost" class="block text-sm font-medium text-gray-700">Pilih Lokasi
                                Kost</label>
                            <select id="lokasi_kost" name="lokasi_kost" required
                                class="mt-1 block w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">-- Pilih Lokasi --</option>
                                <option value="Berbek">Berbek</option>
                                <option value="Gunung_Anyar">Gunung Anyar</option>
                                <option value="Rungkut">Rungkut</option>
                            </select>
                            <x-input-error :messages="$errors->get('lokasi_kost')" class="mt-2" />
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" id="submit-btn"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300 shadow-lg">
                            Daftar
                        </button>

                        <!-- Login Link -->
                        <div class="mt-4 text-center">
                            <p class="text-sm text-gray-500">
                                Sudah punya akun?
                                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Masuk di sini</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('register-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const form = this;

            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            Swal.fire({
                title: 'Yakin data sudah benar?',
                text: 'Pastikan semua informasi sudah sesuai.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, daftar!',
                cancelButtonText: 'Periksa lagi'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
@endsection --}}


@extends('layouts.welcome-layout')

@section('content')
    <div class="h-screen w-screen flex justify-center items-center">
        <div class="w-full h-full bg-white shadow-none rounded-none overflow-hidden flex">
            <!-- Left Side - Image Section -->
            <div class="hidden lg:block lg:w-1/2 relative">
                <div
                    class="h-full bg-gradient-to-br from-custom-blue to-custom-blue-light flex items-center justify-center relative">
                    <div class="text-center text-white z-10">
                        <h3 class="text-2xl font-bold mb-2">Selamat datang!</h3>
                        <p class="text-blue-100">Buat akun terlebih dahulu, untuk dapat memesan kamar di Rumah Kost Rahmatika</p>
                    </div>
                </div>
            </div>

            <!-- Right Side - Register Form -->
            <div class="w-full lg:w-1/2 p-6 lg:p-8">
                <div class="max-w-md mx-auto">
                    <div class="text-center mb-6">
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">Register</h2>
                        <p class="text-gray-600">Isi dengan sesuai</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" id="register-form" enctype="multipart/form-data">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input id="name" type="text" name="name"
                                class="mt-1 block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                :value="old('name')" required autofocus>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input id="email" type="email" name="email"
                                class="mt-1 block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                :value="old('email')" required>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                            <input id="phone" type="tel" name="phone"
                                class="mt-1 block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                :value="old('phone')" required>
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input id="password" type="password" name="password"
                                class="mt-1 block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                                Password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                class="mt-1 block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <!-- Form for Uploading Image -->
                        <div class="mb-3">
                            <label for="image" class="block text-sm font-medium text-gray-700">Masukkan Foto KTP</label>
                            <input type="file" id="image" name="image" accept="image/*"
                                class="mt-1 block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <!-- Lokasi Kost -->
                        <div class="mb-3">
                            <label for="lokasi_kost" class="block text-sm font-medium text-gray-700">Pilih Lokasi
                                Kost</label>
                            <select id="lokasi_kost" name="lokasi_kost" required
                                class="mt-1 block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">-- Pilih Lokasi --</option>
                                <option value="Berbek">Berbek</option>
                                <option value="Gunung_Anyar">Gunung Anyar</option>
                                <option value="Rungkut">Rungkut</option>
                            </select>
                            <x-input-error :messages="$errors->get('lokasi_kost')" class="mt-2" />
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" id="submit-btn"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300 shadow-lg">
                            Register
                        </button>

                        <!-- Login Link -->
                        <div class="mt-4    text-center">
                            <p class="text-sm text-gray-500">
                                Sudah punya akun?
                                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Masuk di sini</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('register-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const form = this;

            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            Swal.fire({
                title: 'Yakin data sudah benar?',
                text: 'Pastikan semua informasi sudah sesuai.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, daftar!',
                cancelButtonText: 'Periksa lagi'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
