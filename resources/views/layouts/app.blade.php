<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')

</head>

<body class="font-poppins antialiased h-screen">
    <div class="min-h-screen flex">

        {{-- @if (auth()->user()->role === 'admin')
            @include('layouts.navigation')
        @elseif(auth()->user()->role === 'user')
            @include('layouts.sidebar-user')
        @endif --}}

        @if (!request()->is('penyewaan/createlama') && !request()->is('penyewaan/create'))
            @if (auth()->user()->role === 'admin')
                @include('layouts.navigation')
            @elseif(auth()->user()->role === 'user')
                @include('layouts.sidebar-user')
            @endif
        @endif

        <main
            class="{{ request()->is('penyewaan/createlama') || request()->is('penyewaan/create') ? '' : 'ml-64' }} w-full h-screen overflow-auto overflow-x-hidden">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
