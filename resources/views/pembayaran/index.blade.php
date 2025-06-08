<x-app-layout>
    <div class="p-6 w-full max-w-screen-lg mx-auto bg-white shadow rounded-lg mt-10">
        <h2 class="text-3xl font-extrabold mb-8 text-blue-900 text-center">Pembayaran Kost</h2>

        <!-- Detail Penyewaan -->
        <div class="bg-blue-50 p-6 rounded-lg shadow-md mb-8 border border-blue-200">
            <h3 class="text-xl font-semibold mb-4 text-blue-700 border-b border-blue-300 pb-2">Detail Penyewaan</h3>
            <div class="space-y-3 text-blue-900">
                <div class="flex justify-between">
                    <span class="font-medium">Lokasi Kost:</span>
                    <span>{{ str_replace('_', ' ', $user->lokasi_kost) }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-medium">Nomor Kamar:</span>
                    <span>{{ $penyewaan->nomor_kamar }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-medium">Tanggal Masuk:</span>
                    <span>{{ \Carbon\Carbon::parse($penyewaan->tanggal_masuk)->format('d/m/Y') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-medium">Durasi Sewa:</span>
                    <span>{{ $penyewaan->durasi_bulan }} bulan</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-medium">Tanggal Berakhir:</span>
                    <span>
                        {{ \Carbon\Carbon::parse($penyewaan->tanggal_masuk)->addMonths($penyewaan->durasi_bulan)->format('d/m/Y') }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Detail Pembayaran -->
        <div class="bg-blue-50 p-6 rounded-lg shadow-md mb-8 border border-blue-200">
            <h3 class="text-xl font-semibold mb-4 text-blue-700 border-b border-blue-300 pb-2">Detail Pembayaran</h3>
            <div class="space-y-3 text-blue-900">
                <div class="flex justify-between">
                    <span class="font-medium">Harga per bulan:</span>
                    <span>Rp {{ number_format($hargaPerBulan, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-medium">Durasi:</span>
                    <span>{{ $penyewaan->durasi_bulan }} bulan</span>
                </div>
                <hr class="border-blue-300 my-4">
                <div class="flex justify-between text-lg font-bold text-blue-900">
                    <span>Total Pembayaran:</span>
                    <span>Rp {{ number_format($totalHarga, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

        <!-- Tombol Bayar -->
        <div class="text-center">
            <button id="pay-button"
                class="bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white font-semibold px-10 py-3 rounded-lg shadow-lg transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-400">
                Bayar Sekarang
            </button>
        </div>
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script>
        let paymentData = null;

        function resetButton() {
            const button = document.getElementById('pay-button');
            button.disabled = false;
            button.textContent = 'Bayar Sekarang';
        }

        document.getElementById('pay-button').addEventListener('click', function() {
            this.disabled = true;
            this.textContent = 'Memproses...';

            fetch("{{ route('pembayaran.bayar') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({})
                })
                .then(res => res.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                        resetButton();
                        return;
                    }

                    paymentData = {
                        order_id: data.order_id,
                        user_id: data.user_id,
                        penyewaan_id: data.penyewaan_id,
                        jumlah: data.jumlah
                    };

                    snap.pay(data.snap_token, {
                        onSuccess: function(result) {
                            storeTransaction('success');
                            alert("Pembayaran sukses!");
                            window.location.href = "{{ route('pembayaran.riwayat') }}";
                        },
                        onPending: function(result) {
                            storeTransaction('pending');
                            alert("Menunggu pembayaran...");
                            window.location.href = "{{ route('pembayaran.riwayat') }}";
                        },
                        onError: function(result) {
                            storeTransaction('failed');
                            alert("Pembayaran gagal!");
                            resetButton();
                        },
                        onClose: function() {
                            resetButton();
                        }
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat memproses pembayaran');
                    resetButton();
                });
        });

        function storeTransaction(status) {
            fetch("{{ route('pembayaran.store') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        order_id: paymentData.order_id,
                        user_id: paymentData.user_id,
                        penyewaan_id: paymentData.penyewaan_id,
                        jumlah: paymentData.jumlah,
                        status: status
                    })
                })
                .then(response => response.json())
                .then(data => console.log("Transaksi berhasil disimpan", data))
                .catch(error => console.error("Error menyimpan transaksi", error));
        }
    </script>
</x-app-layout>
