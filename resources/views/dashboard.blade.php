<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex gap-10">
            <!-- Grafik Jumlah Penghuni -->
            <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
                <h2 class="text-xl font-semibold mb-6">Statistik Jumlah Penghuni Kost</h2>
                <canvas id="penghuniChart" class="w-full h-64"></canvas>
            </div>

            <!-- Grafik Total Pemasukan -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold mb-6">Statistik Total Pemasukan Kost</h2>
                <canvas id="pemasukanChart" class="w-full h-64"></canvas>
            </div>
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
                backgroundColor: 'rgba(37, 99, 235, 0.7)', // warna biru
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
                backgroundColor: 'rgba(16, 185, 129, 0.7)', // warna hijau
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
                }
            }
        };
        new Chart(ctxPemasukan, configPemasukan);
    </script>
</x-app-layout>
