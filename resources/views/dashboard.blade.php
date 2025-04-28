<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('penghuni.index') }}"
                        class="inline-block mb-4 px-4 py-2 bg-blue-600 text-black rounded hover:bg-blue-700">
                        Penghuni
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('laporan.index') }}"
                        class="inline-block mb-4 px-4 py-2 bg-blue-600 text-black rounded hover:bg-blue-700">
                        Laporan
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
