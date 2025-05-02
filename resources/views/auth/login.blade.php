<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" id="loginForm">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            {{-- Forgot Password (paling kiri) --}}
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <div class="flex gap-4">
                <x-primary-button type="submit" id="submitButton">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </div>
    </form>

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

            // Simulate a delay before submitting form
            setTimeout(() => {
                // Submit the form after a short delay (this mimics async processing)
                document.getElementById('loginForm').submit();
            }, 2000); // Adjust delay as needed (2000ms = 2 seconds)
        });
    </script>
</x-guest-layout>
