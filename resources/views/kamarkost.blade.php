@extends('layouts.welcome-layout')

@section('content')
    <div class="snap-y snap-mandatory scroll-smooth">
        <!-- Navbar -->
        <nav class="w-full fixed top-0 left-0 z-50 bg-white shadow-md px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <div class="text-xl font-bold text-custom-blue">
                Rumah Kost Rahmatika
            </div>

            <!-- Nav Menu -->
            <div class="hidden md:flex space-x-8 items-center">
                <a href="{{ route('home') }}" class="text-black hover:text-blue-600 font-medium">Home</a>
                <a href="{{ route('kamar.kost') }}" class="text-black hover:text-blue-600 font-medium">Informasi Kamar
                    Kost</a>
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


        <!-- Informasi Kamar Kost Section -->
        <section id="informasikamarkost" class="min-h-screen snap-start py-20 px-6 pt-24 bg-gray-100 font-[Poppins]">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-extrabold text-center text-custom-blue mb-12 uppercase tracking-wide drop-shadow" data-aos="fade-up" data-aos-duration="800">
                    Informasi Kamar Kost
                </h2>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Card 1 - Carousel -->
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden" data-aos="zoom-in-up" data-aos-delay="100">
                        <!-- Carousel Gambar -->
                        <div class="galor-swiper swiper w-full h-72" data-aos="fade" data-aos-duration="800">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ asset('images/gunung.jpeg') }}" alt="Gambar 1"
                                        class="w-full h-72 object-cover object-center">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('images/gunung1.jpeg') }}" alt="Gambar 2"
                                        class="w-full h-72 object-cover object-center">
                                </div>
                            </div>
                            <div class="swiper-pagination !bottom-0"></div>
                        </div>

                        <!-- Informasi Kost -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-blue-700 mb-4">Kost Gunung Anyar</h3>
                            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                                <li>Campur (Pria dan Wanita) 1 lantai</li>
                                <li>Ukuran Kamar 2x2,5</li>
                                <li>10 Kamar</li>
                                <li>Fasilitas: Kasur, Lemari, Meja, Kamar Mandi Luar</li>
                            </ul>

                            <!-- Harga -->
                            <p class="text-lg font-semibold text-gray-800 mb-4">Harga: <span class="text-blue-700">Rp500.000
                                    / bulan</span></p>

                            <!-- Tombol Pesan -->
                            <a href="{{ route('register') }}"
                                class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition duration-300">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>

                    <!-- Card 2 - Carousel -->
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden" data-aos="zoom-in-up" data-aos-delay="100">
                        <!-- Carousel Gambar -->
                        <div class="galor-swiper swiper w-full h-72">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ asset('images/abdulkarim.jpeg') }}" alt="Gambar 1"
                                        class="w-full h-72 object-cover object-center">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('images/abdulkarim2.jpeg') }}" alt="Gambar 2"
                                        class="w-full h-72 object-cover object-center">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('images/abdulkarim3.jpeg') }}" alt="Gambar 3"
                                        class="w-full h-72 object-cover object-center">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('images/abdulkarim4.jpeg') }}" alt="Gambar 3"
                                        class="w-full h-72 object-cover object-center">
                                </div>
                            </div>
                            <div class="swiper-pagination !bottom-0"></div>
                        </div>

                        <!-- Informasi Kost -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-blue-700 mb-4">Kost Rungkut</h3>
                            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                                <li>Campur (Pria dan Wanita) 2 lantai</li>
                                <li>Ukuran Kamar 2x2,75</li>
                                <li>16 Kamar (8 Lt1 dan 8 Lt2)</li>
                                <li>Fasilitas: Kasur, Lemari, Meja, Kamar Mandi Luar</li>
                            </ul>

                            <!-- Harga -->
                            <p class="text-lg font-semibold text-gray-800 mb-4">Harga: <span class="text-blue-700">Rp500.000
                                    / bulan</span></p>

                            <!-- Tombol Pesan -->
                            <a href="{{ route('register') }}"
                                class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition duration-300">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden" data-aos="zoom-in-up" data-aos-delay="100">
                        <!-- Carousel Gambar -->
                        <div class="galor-swiper swiper w-full h-72">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ asset('images/berbek.jpeg') }}" alt="Gambar 1"
                                        class="w-full h-72 object-cover object-center">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('images/berbek2.jpeg') }}" alt="Gambar 2"
                                        class="w-full h-72 object-cover object-center">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('images/berbek3.jpeg') }}" alt="Gambar 3"
                                        class="w-full h-72 object-cover object-center">
                                </div>
                            </div>
                            <div class="swiper-pagination !bottom-0"></div>
                        </div>

                        <!-- Informasi Kost -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-blue-700 mb-4">Kost Berbek</h3>
                            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                                <li>Keluarga 2 lantai</li>
                                <li>Ukuran Kamar 2x5,5</li>
                                <li>9 Kamar (5 Lt1 dan 4 Lt2)</li>
                                <li>Fasilitas: Kasur dan Kamar Mandi Dalam</li>
                            </ul>

                            <!-- Harga -->
                            <p class="text-lg font-semibold text-gray-800 mb-4">Harga: <span class="text-blue-700">Rp650.000
                                    / bulan</span></p>

                            <!-- Tombol Pesan -->
                            <a href="{{ route('register') }}"
                                class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition duration-300">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-custom-blue to-custom-blue-light text-center text-white py-6">
        <div class="text-sm">
            &copy; 2025 Rumah Kost Rahmatika <br>
            Telepon: <a href="tel:+6281234567890" class="text-white hover:underline">+62 813-3106-2015</a>
        </div>
    </footer>
@endsection
