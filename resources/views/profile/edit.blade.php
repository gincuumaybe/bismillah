{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<!-- resources/views/profile/edit.blade.php -->
<x-app-layout>
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <input type="text" name="name" value="{{ old('name', $user->name) }}">
        <input type="email" name="email" value="{{ old('email', $user->email) }}">
        <input type="file" name="image">
        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}">
        <input type="text" name="lokasi_kost" value="{{ old('lokasi_kost', $user->lokasi_kost) }}">

        <button type="submit">Save</button>
    </form>

    <form method="POST" action="{{ route('profile.destroy') }}">
        @csrf
        @method('delete')

        <input type="password" name="password" placeholder="Confirm Password">
        <button type="submit">Delete Account</button>
    </form>
</x-app-layout>
