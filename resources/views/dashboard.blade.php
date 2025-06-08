<x-app-layout>
    <div class="py-10 max-w-5xl mx-auto sm:px-6 lg:px-8">

        <div class="space-y-12">
            <!-- Section: Statistik Jumlah Penghuni -->
            <section class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2 text-gray-700">Jumlah Penghuni Kost</h2>
                <p class="text-gray-500 mb-4">
                    Total penghuni tersebar di lokasi kost dengan perbandingan yang jelas. Data membantu pemilik kost
                    dalam pengelolaan dan perencanaan kamar.
                </p>
                <canvas id="penghuniChart" class="w-full h-56"></canvas>
            </section>

            <!-- Section: Statistik Total Pemasukan -->
            <section class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2 text-gray-700">Total Pemasukan Kost</h2>
                <p class="text-gray-500 mb-4">
                    Ringkasan pemasukan dari masing-masing lokasi kost, memudahkan evaluasi performa keuangan secara
                    cepat.
                </p>

                <!-- Total pemasukan summary -->
                <div class="mb-4 text-lg font-semibold text-green-700">
                    Total Pemasukan:
                    <span>
                        {{ number_format($totalPemasukanSum, 0, ',', '.') }}
                    </span>
                    <span class="text-base font-normal text-gray-600"></span>
                </div>
                <canvas id="pemasukanChart" class="w-full h-56"></canvas>
            </section>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Grafik Jumlah Penghuni
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
        new Chart(ctxPenghuni, configPenghuni);

        // Grafik Total Pemasukan
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
    </script>
</x-app-layout>
