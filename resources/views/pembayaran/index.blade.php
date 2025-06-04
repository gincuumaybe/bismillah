{{-- <x-app-layout>
    <div class="p-6 max-w-2xl mx-auto bg-white shadow rounded">
        <h2 class="text-2xl font-bold mb-6">Pembayaran Kost</h2>

        <!-- Detail Penyewaan -->
        <div class="bg-gray-50 p-4 rounded-lg mb-6">
            <h3 class="text-lg font-semibold mb-3">Detail Penyewaan</h3>
            <div class="space-y-2">
                <div class="flex justify-between">
                    <span class="text-gray-600">Lokasi Kost:</span>
                    <span class="font-medium">{{ str_replace('_', ' ', $penyewaan->lokasi_kost) }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Nomor Kamar:</span>
                    <span class="font-medium">{{ $penyewaan->nomor_kamar }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Tanggal Masuk:</span>
                    <span class="font-medium">{{ \Carbon\Carbon::parse($penyewaan->tanggal_masuk)->format('d/m/Y') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Durasi Sewa:</span>
                    <span class="font-medium">{{ $penyewaan->durasi_bulan }} bulan</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Tanggal Berakhir:</span>
                    <span class="font-medium">
                        {{ \Carbon\Carbon::parse($penyewaan->tanggal_masuk)->addMonths($penyewaan->durasi_bulan)->format('d/m/Y') }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Detail Pembayaran -->
        <div class="bg-blue-50 p-4 rounded-lg mb-6">
            <h3 class="text-lg font-semibold mb-3">Detail Pembayaran</h3>
            <div class="space-y-2">
                <div class="flex justify-between">
                    <span class="text-gray-600">Harga per bulan:</span>
                    <span class="font-medium">Rp {{ number_format($hargaPerBulan, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Durasi:</span>
                    <span class="font-medium">{{ $penyewaan->durasi_bulan }} bulan</span>
                </div>
                <hr class="my-3">
                <div class="flex justify-between text-lg font-bold">
                    <span>Total Pembayaran:</span>
                    <span class="text-blue-600">Rp {{ number_format($totalHarga, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

        <!-- Tombol Bayar -->
        <div class="text-center">
            <button id="pay-button" class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 font-semibold transition duration-200">
                Bayar Sekarang
            </button>
        </div>
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script>
        document.getElementById('pay-button').addEventListener('click', function () {
            // Tambahkan loading state
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
                    return;
                }

                snap.pay(data.snap_token, {
                    onSuccess: function(result) {
                        alert("Pembayaran sukses!");
                        window.location.href = "{{ route('pembayaran.riwayat') }}";
                    },
                    onPending: function(result) {
                        alert("Menunggu pembayaran...");
                        window.location.href = "{{ route('pembayaran.riwayat') }}";
                    },
                    onError: function(result) {
                        alert("Pembayaran gagal!");
                    },
                    onClose: function() {
                        // Reset tombol jika user menutup popup
                        document.getElementById('pay-button').disabled = false;
                        document.getElementById('pay-button').textContent = 'Bayar Sekarang';
                    }
                });
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memproses pembayaran');
                document.getElementById('pay-button').disabled = false;
                document.getElementById('pay-button').textContent = 'Bayar Sekarang';
            });
        });
    </script>
</x-app-layout> --}}


<x-app-layout>
    <div class="p-6 max-w-2xl mx-auto bg-white shadow rounded">
        <h2 class="text-2xl font-bold mb-6">Pembayaran Kost</h2>

        <!-- Detail Penyewaan -->
        <div class="bg-gray-50 p-4 rounded-lg mb-6">
            <h3 class="text-lg font-semibold mb-3">Detail Penyewaan</h3>
            <div class="space-y-2">
                <div class="flex justify-between">
                    <span class="text-gray-600">Lokasi Kost:</span>
                    <span class="font-medium">{{ str_replace('_', ' ', $penyewaan->lokasi_kost) }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Nomor Kamar:</span>
                    <span class="font-medium">{{ $penyewaan->nomor_kamar }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Tanggal Masuk:</span>
                    <span
                        class="font-medium">{{ \Carbon\Carbon::parse($penyewaan->tanggal_masuk)->format('d/m/Y') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Durasi Sewa:</span>
                    <span class="font-medium">{{ $penyewaan->durasi_bulan }} bulan</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Tanggal Berakhir:</span>
                    <span class="font-medium">
                        {{ \Carbon\Carbon::parse($penyewaan->tanggal_masuk)->addMonths($penyewaan->durasi_bulan)->format('d/m/Y') }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Detail Pembayaran -->
        <div class="bg-blue-50 p-4 rounded-lg mb-6">
            <h3 class="text-lg font-semibold mb-3">Detail Pembayaran</h3>
            <div class="space-y-2">
                <div class="flex justify-between">
                    <span class="text-gray-600">Harga per bulan:</span>
                    <span class="font-medium">Rp {{ number_format($hargaPerBulan, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Durasi:</span>
                    <span class="font-medium">{{ $penyewaan->durasi_bulan }} bulan</span>
                </div>
                <hr class="my-3">
                <div class="flex justify-between text-lg font-bold">
                    <span>Total Pembayaran:</span>
                    <span class="text-blue-600">Rp {{ number_format($totalHarga, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

        <!-- Tombol Bayar -->
        <div class="text-center">
            <button id="pay-button"
                class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 font-semibold transition duration-200">
                Bayar Sekarang
            </button>
        </div>
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script>
        let paymentData = null;

        document.getElementById('pay-button').addEventListener('click', function() {
            // Tambahkan loading state
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

                    // Simpan data pembayaran untuk digunakan nanti
                    paymentData = {
                        order_id: data.order_id,
                        user_id: data.user_id,
                        penyewaan_id: data.penyewaan_id,
                        jumlah: data.jumlah
                    };

                    snap.pay(data.snap_token, {
                        onSuccess: function(result) {
                            // Simpan transaksi dengan status success
                            storeTransaction('success');
                            alert("Pembayaran sukses!");
                            window.location.href = "{{ route('pembayaran.riwayat') }}";
                        },
                        onPending: function(result) {
                            // Simpan transaksi dengan status pending
                            storeTransaction('pending');
                            alert("Menunggu pembayaran...");
                            window.location.href = "{{ route('pembayaran.riwayat') }}";
                        },
                        onError: function(result) {
                            // Simpan transaksi dengan status failed
                            storeTransaction('failed');
                            alert("Pembayaran gagal!");
                            resetButton();
                        },
                        onClose: function() {
                            // Simpan transaksi dengan status cancelled jika user menutup popup
                            // storeTransaction('cancelled');
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

        // function storeTransaction(status) {
        //     if (!paymentData) return;

        //     fetch("{{ route('pembayaran.store') }}", {
        //         method: "POST",
        //         headers: {
        //             "X-CSRF-TOKEN": "{{ csrf_token() }}",
        //             "Content-Type": "application/json"
        //         },
        //         body: JSON.stringify({
        //             order_id: paymentData.order_id,
        //             user_id: paymentData.user_id,
        //             penyewaan_id: paymentData.penyewaan_id,
        //             jumlah: paymentData.jumlah,
        //             status: status
        //         })
        //     })
        //     .then(res => res.json())
        //     .then(data => {
        //         console.log('Transaction stored:', data);
        //     })
        //     .catch(error => {
        //         console.error('Error storing transaction:', error);
        //     });
        // }

        // function resetButton() {
        //     const button = document.getElementById('pay-button');
        //     button.disabled = false;
        //     button.textContent = 'Bayar Sekarang';
        // }

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
                alert("Pembayaran gagal!");
            },
            onClose: function() {
                alert("Kamu menutup pembayaran sebelum selesai.");
            }
        });
    </script>
</x-app-layout>
