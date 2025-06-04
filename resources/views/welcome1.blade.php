@extends('layouts.welcome-layout')

@section('content')
    <div class="h-screen w-screen flex justify-center items-center">
        <div class="w-full h-full bg-white shadow-none rounded-none overflow-hidden flex">
            <!-- Left Side - Image Section -->
            <div class="hidden lg:block lg:w-1/2 h-full relative">
                <div class="h-full w-full bg-gradient-to-br from-custom-blue to-custom-blue-light flex items-center justify-center relative">
                    <!-- Image/Content -->
                    <div class="text-center text-white z-10">
                        <div class="w-32 h-32 mx-auto mb-6 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                            <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Selamat datang!</h3>
                        <p class="text-blue-100">Silahkan masuk untuk dapat menggunakan sistem Rumah Kost Rahmatika</p>
                    </div>
                </div>
            </div>

            <!-- Right Side - Login/Register Section -->
            <div class="w-full lg:w-1/2 h-full p-8 lg:p-12 flex items-center justify-center">
                <div class="w-full max-w-md">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">Ayo Mulai</h2>
                        <p class="text-gray-600">Silahkan pilih!</p>
                    </div>

                    <div class="space-y-4">
                        <!-- Login Button -->
                        <a href="{{ route('login') }}" class="block">
                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-6 rounded-xl transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300 shadow-lg">
                                <div class="flex items-center justify-center space-x-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                    </svg>
                                    <span>{{ __('Log in') }}</span>
                                </div>
                            </button>
                        </a>

                        <!-- Register Button -->
                        <a href="{{ route('register') }}" class="block">
                            <button class="w-full bg-white border-2 border-blue-600 text-blue-600 hover:bg-blue-50 font-semibold py-4 px-6 rounded-xl transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300 shadow-lg">
                                <div class="flex items-center justify-center space-x-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                    </svg>
                                    <span>{{ __('Register') }}</span>
                                </div>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

