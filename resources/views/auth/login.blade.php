@extends('layouts.welcome-layout')

@section('content')
    <div class="h-screen w-screen flex justify-center items-center">
        <div class="w-full h-full bg-white shadow-none rounded-none overflow-hidden flex">
            <!-- Left Side - Image Section -->
            <div class="hidden lg:block lg:w-1/2 relative">
                <div
                    class="h-full bg-gradient-to-br from-custom-blue to-custom-blue-light flex items-center justify-center relative">
                    <!-- Image/Content -->
                    <div class="text-center text-white z-10">
                        <h3 class="text-2xl font-bold mb-2">Selamat datang!</h3>
                        <p class="text-blue-100">Silahkan masuk untuk dapat menggunakan sistem Rumah Kost Rahmatika</p>
                    </div>
                </div>
            </div>
            <!-- Right Side - Login Form -->
            <div class="w-full lg:w-1/2 p-8 lg:p-12 flex items-center justify-center h-full">
                <div class="w-full max-w-md">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">Masuk</h2>
                        <p class="text-gray-600">Silahkan masukkan data diri!</p>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input id="email"
                                class="mt-1 block w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                type="email" name="email" :value="old('email')" required autofocus>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input id="password"
                                class="mt-1 block w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                type="password" name="password" required>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" id="submitButton"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300 shadow-lg">
                            Masuk
                        </button>

                        <!-- Register Link -->
                        <div class="mt-4 text-center">
                            <p class="text-sm text-gray-500">
                                Belum punya akun?
                                <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Daftar di sini</a>
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
        // Handle form submission
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form from submitting immediately

            // Show SweetAlert loading spinner
            Swal.fire({
                title: 'Masuk...',
                text: 'Tunggu sebentar...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading(); // Show loading animation
                }
            });

            // Simulate delay
            setTimeout(() => {
                this.submit();
            }, 2000);
        });
    </script>
@endsection
