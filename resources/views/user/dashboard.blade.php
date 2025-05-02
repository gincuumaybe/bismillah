

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card for Laporan -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Laporan</h3>
                    <a href="{{ route('laporan.indexUser') }}"
                        class="inline-block px-4 py-2 bg-blue-600 text-black rounded hover:bg-blue-700">
                        Lapor Keluhan
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
