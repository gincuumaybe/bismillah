<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Laporan extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi
    protected $fillable = [
        'user_id',
        'name',
        'lokasi_kost',
        'nomor_kamar',
        'judul',
        'deskripsi',
        'gambar',
        'status',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);  // Relasi dengan model User
    }
}
