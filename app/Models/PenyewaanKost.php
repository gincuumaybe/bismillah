<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyewaanKost extends Model
{
    use HasFactory;

    protected $table = 'penyewaan_kosts';

    protected $fillable = [
        'user_id',
        'nomor_kamar',
        'tanggal_masuk',
        'status',
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
