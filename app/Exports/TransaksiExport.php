<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransaksiExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Transaksi::with(['user', 'penyewaanKost'])->get([
            'id',
            'kode_transaksi',
            'jumlah',
            'status',
            'created_at',
            'penyewaan_id'
        ]);
    }
    /**
     * Menambahkan judul kolom
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Kode Transaksi',
            'Nama Penyewa',
            'Lokasi Kost',
            'Nomor Kamar',
            'Jumlah (Rp)',
            'Status',
            'Tanggal Masuk',
            'Tanggal Keluar'
        ];
    }
}
