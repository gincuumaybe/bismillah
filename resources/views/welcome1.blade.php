@extends('layouts.welcome-layout')

@section('content')
    <div class="h-screen overflow-y-scroll snap-y snap-mandatory scroll-smooth">
        <!-- Navbar -->
        <nav class="w-full fixed top-0 left-0 z-50 bg-white shadow-md px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <div class="text-xl font-bold text-custom-blue">
                Rumah Kost Rahmatika
            </div>

            <!-- Nav Menu -->
            <div class="hidden md:flex space-x-8 items-center">
                <a href="#home" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
                <a href="#kamarkost" class="text-gray-700 hover:text-blue-600 font-medium">Kamar Kost</a>
            </div>

            <!-- Auth Buttons -->
            <div class="flex space-x-4">
                <a href="{{ route('login') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition duration-300">
                    Log in
                </a>
                <a href="{{ route('register') }}"
                    class="border-2 border-blue-600 text-blue-600 hover:bg-blue-50 font-semibold py-2 px-4 rounded transition duration-300">
                    Register
                </a>
            </div>
        </nav>


        <!-- Tentang Kami Section -->
        <section id="tentang"
            class="min-h-screen snap-start flex items-center bg-gradient-to-br from-custom-blue to-custom-blue-light py-20 px-6 text-white pt-24 font-[Poppins]">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-5xl font-extrabold mb-6 tracking-wide uppercase leading-tight drop-shadow-lg">
                    Tentang Kami
                </h2>
                <p class="text-lg text-justify leading-relaxed font-light tracking-wide">
                    Rumah Kost Rahmatika merupakan gabungan dari tiga rumah kost yang berlokasi strategis di area berbeda,
                    dirancang untuk memberikan kenyamanan dan keamanan bagi para penghuni. Setiap unit kami dilengkapi
                    fasilitas
                    lengkap, lingkungan bersih, dan akses mudah ke berbagai fasilitas umum.
                </p>
            </div>
        </section>


        <!-- Lokasi Kost Section -->
        <section id="lokasi" class="min-h-screen snap-start flex items-center py-20 px-6 bg-white pt-24">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Lokasi Rumah Kost</h2>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Kost 1 -->
                    <div class="bg-white border rounded-lg shadow-lg overflow-hidden">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-blue-700 mb-2">Kost Galor - Jl. Gunung Anyar Lor No.85
                            </h3>
                            <p class="text-gray-600 mb-4">Dekat dengan kampus Universitas Pembangunan Nasional.</p>
                        </div>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.1572067023167!2d112.77822517503603!3d-7.336235692672253!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb6c70473db1%3A0x906417865caa3524!2sKost%20%22GALor%22!5e0!3m2!1sen!2sid!4v1753152545695!5m2!1sen!2sid"
                            width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <!-- Kost 2 -->
                    <div class="bg-white border rounded-lg shadow-lg overflow-hidden">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-blue-700 mb-2">Kost A'Karim – Jl. Kyai Abdul Karim No.62
                            </h3>
                            <p class="text-gray-600 mb-4">Dekat dengan sarana dan prasana, lokasi strategis.</p>
                        </div>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.1264869438346!2d112.77253467503598!3d-7.339689692668875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fba972254d75%3A0xe1112246c53198f8!2sRumah%20Kost%20A&#39;KARIM!5e0!3m2!1sen!2sid!4v1753152782831!5m2!1sen!2sid"
                            width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <!-- Kost 3 -->
                    <div class="bg-white border rounded-lg shadow-lg overflow-hidden">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-blue-700 mb-2">Kost Rahmatika – Jl. Berbek IIIG, No. 89
                            </h3>
                            <p class="text-gray-600 mb-4">Dekat dengan wilayah pabrik, cocok bagi pekerja buruh.</p>
                        </div>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.0891298238207!2d112.7587784750359!3d-7.343887792664773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb9d251805b9%3A0xc54923c654ecabee!2sRumah%20Kos%20Rahmatika&#39;89!5e0!3m2!1sen!2sid!4v1753152961801!5m2!1sen!2sid"
                            width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
