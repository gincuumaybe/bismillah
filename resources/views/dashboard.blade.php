{{-- <x-app-layout>
    <div class="py-10 max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="space-y-12">
            <!-- Section: Statistik Jumlah Penghuni -->
            <section class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2 text-gray-700">Data Jumlah Penghuni Kost Saat Ini</h2>
                <p class="text-gray-500 mb-4">
                    Menampilkan total penghuni yang sedang aktif tinggal di kost berdasarkan data terbaru. Pembaruan
                    dilakukan secara berkala untuk memastikan informasi selalu akurat.
                </p>
                <canvas id="penghuniChart" class="w-full h-56"></canvas>
            </section>

            <!-- Section: Statistik Total Pemasukan -->
            <section class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2 text-gray-700">Rekap Pendapatan Kost</h2>
                <p class="text-gray-500 mb-4">
                    Menampilkan pendapatan dari tiga lokasi kost beserta total keseluruhan untuk periode tertentu.
                </p>

                <!-- Total pemasukan summary -->
                <div class="mb-4 text-lg font-semibold text-green-700">
                    Total Pemasukan:
                    <span>
                        {{ number_format($totalPemasukanSum, 0, ',', '.') }}
                    </span>
                </div>
                <canvas id="pemasukanChart" class="w-full h-56"></canvas>
            </section>

            <!-- Section: Statistik Total Laporan -->
            <section class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2 text-gray-700">Rekap Laporan Kost</h2>
                <p class="text-gray-500 mb-4">
                    Menampilkan jumlah laporan berdasarkan lokasi kost.
                </p>
                <canvas id="laporanChart" class="w-full h-56"></canvas>
            </section>

        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Grafik Jumlah Penghuni (Vertical)
        const ctxPenghuni = document.getElementById('penghuniChart').getContext('2d');
        const dataPenghuni = {
            labels: @json($locations),
            datasets: [{
                label: 'Jumlah Penghuni',
                data: @json($userCounts),
                backgroundColor: 'rgba(37, 99, 235, 0.7)',
                borderColor: 'rgba(37, 99, 235, 1)',
                borderWidth: 1
            }]
        };
        const configPenghuni = {
            type: 'bar',
            data: dataPenghuni,
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        };
        new Chart(ctxPenghuni, configPenghuni);

        // Grafik Total Pemasukan (Vertical)
        const ctxPemasukan = document.getElementById('pemasukanChart').getContext('2d');
        const dataPemasukan = {
            labels: @json($locations),
            datasets: [{
                label: 'Total Pemasukan (Rp)',
                data: @json($totalPemasukan),
                backgroundColor: 'rgba(16, 185, 129, 0.7)',
                borderColor: 'rgba(16, 185, 129, 1)',
                borderWidth: 1
            }]
        };
        const configPemasukan = {
            type: 'bar',
            data: dataPemasukan,
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value.toLocaleString('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR',
                                    minimumFractionDigits: 0,
                                    maximumFractionDigits: 0
                                });
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        };
        new Chart(ctxPemasukan, configPemasukan);

        // Grafik Total Laporan (Vertical)
        const ctxLaporan = document.getElementById('laporanChart').getContext('2d');
        const dataLaporan = {
            labels: @json($locations),
            datasets: [{
                label: 'Jumlah Laporan',
                data: @json($laporanCounts),
                backgroundColor: 'rgba(255, 159, 64, 0.7)',
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 1
            }]
        };
        const configLaporan = {
            type: 'bar',
            data: dataLaporan,
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        };
        new Chart(ctxLaporan, configLaporan);
    </script>
</x-app-layout> --}}


<x-app-layout>
    <div class="py-10 max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="space-y-12">
            <!-- Section: Statistik Kartu -->
            <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card Jumlah Penghuni Kost -->
                <div class="bg-blue-50 p-6 rounded-lg shadow-md text-center">
                    <h3 class="text-xl font-semibold text-blue-800 mb-2">Jumlah Penghuni Kost</h3>
                    <p class="text-gray-500 mb-4">Menampilkan jumlah penghuni kost yang sedang aktif.</p>
                    <div class="text-3xl font-bold text-blue-600">
                        {{ $totalActiveUsers }}
                    </div>
                </div>

                <!-- Card Total Pendapatan -->
                <div class="bg-blue-50 p-6 rounded-lg shadow-md text-center">
                    <h3 class="text-xl font-semibold text-blue-800 mb-2">Total Pendapatan Kost</h3>
                    <p class="text-gray-500 mb-4">Menampilkan total pendapatan dari kost.</p>
                    <div class="text-3xl font-bold text-green-600">
                        {{ number_format($totalPemasukanSum, 0, ',', '.') }}
                    </div>
                </div>

                <!-- Card Total Laporan -->
                <div class="bg-blue-50 p-6 rounded-lg shadow-md text-center">
                    <h3 class="text-xl font-semibold text-blue-800 mb-2">Total Laporan Kost</h3>
                    <p class="text-gray-500 mb-4">Menampilkan jumlah total laporan.</p>
                    <div class="text-3xl font-bold text-orange-600">
                        {{ array_sum($laporanCounts) }}
                    </div>
                </div>
            </section>

            <!-- Section: Statistik Grafik -->
            <section class="space-y-6">
                <!-- Grafik Jumlah Penghuni -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold mb-2 text-blue-700">Penghuni Kost</h2>
                    <canvas id="penghuniChart" class="w-full h-56"></canvas>
                </div>

                <!-- Grafik Total Pemasukan -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold mb-2 text-blue-700">Pendapatan Kost</h2>
                    <canvas id="pemasukanChart" class="w-full h-56"></canvas>
                </div>

                <!-- Grafik Total Laporan -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold mb-2 text-blue-700">Laporan Kost</h2>
                    <canvas id="laporanChart" class="w-full h-56"></canvas>
                </div>
            </section>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Grafik Jumlah Penghuni (Vertical)
        const ctxPenghuni = document.getElementById('penghuniChart').getContext('2d');
        const dataPenghuni = {
            labels: @json($locations),
            datasets: [{
                label: 'Jumlah Penghuni',
                data: @json($userCounts),
                backgroundColor: 'rgba(37, 99, 235, 0.7)',
                borderColor: 'rgba(37, 99, 235, 1)',
                borderWidth: 1
            }]
        };
        const configPenghuni = {
            type: 'bar',
            data: dataPenghuni,
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        };
        new Chart(ctxPenghuni, configPenghuni);

        // Grafik Total Pemasukan (Vertical)
        const ctxPemasukan = document.getElementById('pemasukanChart').getContext('2d');
        const dataPemasukan = {
            labels: @json($locations),
            datasets: [{
                label: 'Total Pemasukan (Rp)',
                data: @json($totalPemasukan),
                backgroundColor: 'rgba(16, 185, 129, 0.7)',
                borderColor: 'rgba(16, 185, 129, 1)',
                borderWidth: 1
            }]
        };
        const configPemasukan = {
            type: 'bar',
            data: dataPemasukan,
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value.toLocaleString('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR',
                                    minimumFractionDigits: 0,
                                    maximumFractionDigits: 0
                                });
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        };
        new Chart(ctxPemasukan, configPemasukan);

        // Grafik Total Laporan (Vertical)
        const ctxLaporan = document.getElementById('laporanChart').getContext('2d');
        const dataLaporan = {
            labels: @json($locations),
            datasets: [{
                label: 'Jumlah Laporan',
                data: @json($laporanCounts),
                backgroundColor: 'rgba(255, 159, 64, 0.7)',
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 1
            }]
        };
        const configLaporan = {
            type: 'bar',
            data: dataLaporan,
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        };
        new Chart(ctxLaporan, configLaporan);
    </script>
</x-app-layout>
