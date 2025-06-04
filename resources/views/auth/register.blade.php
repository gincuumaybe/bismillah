@extends('layouts.welcome-layout')

@section('content')
<div class="h-screen w-screen flex justify-center items-center">
    <div class="w-full h-full bg-white shadow-none rounded-none overflow-hidden flex">
            <!-- Left Side - Image Section -->
            <div class="hidden lg:block lg:w-1/2 relative">
                <div class="h-full bg-gradient-to-br from-custom-blue to-custom-blue-light flex items-center justify-center relative">
                    <div class="text-center text-white z-10">
                        <div class="w-32 h-32 mx-auto mb-6 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                            <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z"/>
                            </svg>
                        </div>
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
                        <p class="text-gray-600">Please fill in your details</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" id="register-form">
                        @csrf

                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input id="name" type="text" name="name" class="mt-1 block w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" :value="old('name')" required autofocus>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input id="email" type="email" name="email" class="mt-1 block w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" :value="old('email')" required>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Phone -->
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                            <input id="phone" type="tel" name="phone" class="mt-1 block w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" :value="old('phone')" required>
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input id="password" type="password" name="password" class="mt-1 block w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" class="mt-1 block w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <!-- Lokasi Kost -->
                        <div class="mb-4">
                            <label for="lokasi_kost" class="block text-sm font-medium text-gray-700">Pilih Lokasi Kost</label>
                            <select id="lokasi_kost" name="lokasi_kost" required class="mt-1 block w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">-- Pilih Lokasi --</option>
                                <option value="Berbek">Berbek</option>
                                <option value="Gunung_Anyar">Gunung Anyar</option>
                                <option value="Rungkut">Rungkut</option>
                            </select>
                            <x-input-error :messages="$errors->get('lokasi_kost')" class="mt-2" />
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" id="submit-btn" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300 shadow-lg">
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
@endsection
