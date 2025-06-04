<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'penyewaan_id',
        'kode_transaksi',
        'jumlah',
        'status',
    ];


    // Tambahkan relasi ke penyewaan_kost
    public function penyewaanKost()
    {
        return $this->belongsTo(PenyewaanKost::class, 'penyewaan_id');
    }

    // (Opsional) relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
