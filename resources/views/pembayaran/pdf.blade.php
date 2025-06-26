{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            min-width: 1000px; /* Membuat lebar minimal agar tidak terpotong */
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
            font-size: 14px;
            word-wrap: break-word; /* Memastikan kata yang panjang tidak keluar dari kolom */
        }

        th {
            background-color: #2196F3; /* Biru muda */
            color: white;
            font-size: 16px;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #ddd;
        }

        td {
            font-size: 14px;
            color: #333;
        }

        /* Untuk memastikan kolom-kolom tetap konsisten */
        th, td {
            word-wrap: break-word;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <h2>Laporan Transaksi</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Transaksi</th>
                    <th>Nama Penyewa</th>
                    <th>Lokasi Kost</th>
                    <th>Nomor Kamar</th>
                    <th>Jumlah (Rp)</th>
                    <th>Status</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Keluar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksiData as $transaksi)
                    <tr>
                        <td>{{ $transaksi->id }}</td>
                        <td>{{ $transaksi->kode_transaksi }}</td>
                        <td>{{ $transaksi->user->name ?? 'Tidak ada data' }}</td>
                        <td>{{ $transaksi->user->lokasi_kost ?? 'Tidak ada data' }}</td>
                        <td>{{ $transaksi->penyewaanKost->nomor_kamar ?? 'Tidak ada data' }}</td>
                        <td>{{ number_format($transaksi->jumlah, 0, ',', '.') }}</td>
                        <td>
                            @if ($transaksi->status == 'success')
                                Sukses
                            @elseif($transaksi->status == 'pending')
                                Pending
                            @else
                                Gagal
                            @endif
                        </td>
                        <td>{{ $transaksi->created_at->timezone('Asia/Jakarta')->format('d M Y H:i') }}</td>
                        <td>{{ $transaksi->penyewaanKost && $transaksi->penyewaanKost->tanggal_keluar ? \Carbon\Carbon::parse($transaksi->penyewaanKost->tanggal_keluar)->timezone('Asia/Jakarta')->format('d M Y H:i') : '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
            font-size: 14px;
        }

        th {
            background-color: #2196F3;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Laporan Transaksi</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Transaksi</th>
                <th>Nama Penyewa</th>
                <th>Lokasi Kost</th>
                <th>Nomor Kamar</th>
                <th>Jumlah (Rp)</th>
                <th>Status</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksiData as $transaksi)
                <tr>
                    <td>{{ $transaksi->id }}</td>
                    <td>{{ $transaksi->kode_transaksi }}</td>
                    <td>{{ $transaksi->user->name ?? 'Tidak ada data' }}</td>
                    <td>{{ $transaksi->user->lokasi_kost ?? 'Tidak ada data' }}</td>
                    <td>{{ $transaksi->penyewaanKost->nomor_kamar ?? 'Tidak ada data' }}</td>
                    <td>{{ number_format($transaksi->jumlah, 0, ',', '.') }}</td>
                    <td>
                        @if ($transaksi->status == 'success')
                            Sukses
                        @elseif($transaksi->status == 'pending')
                            Pending
                        @else
                            Gagal
                        @endif
                    </td>
                    <td>{{ $transaksi->created_at->timezone('Asia/Jakarta')->format('d M Y H:i') }}</td>
                    <td>{{ $transaksi->penyewaanKost && $transaksi->penyewaanKost->tanggal_keluar ? \Carbon\Carbon::parse($transaksi->penyewaanKost->tanggal_keluar)->timezone('Asia/Jakarta')->format('d M Y H:i') : '-' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
