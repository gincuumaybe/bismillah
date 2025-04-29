<x-guest-layout>
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-10">
        <h2 class="text-2xl font-semibold text-center mb-6">Welcome to Our Website!</h2>

        <div class="text-center">
            <p class="text-lg text-gray-700 mb-4">Please log in or register to continue.</p>

            <!-- Button untuk Login -->
            <a href="{{ route('login') }}">
                <x-primary-button class="w-full bg-blue-600 hover:bg-blue-700">
                    {{ __('Log in') }}
                </x-primary-button>
            </a>

            <!-- Button untuk Register -->
            <a href="{{ route('register') }}">
                <x-primary-button class="w-full bg-gray-600 hover:bg-gray-700 mt-4">
                    {{ __('Register') }}
                </x-primary-button>
            </a>
        </div>
    </div>
</x-guest-layout>
