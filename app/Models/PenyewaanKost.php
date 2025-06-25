<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PenyewaanKost extends Model
{
    use HasFactory;

    protected $table = 'penyewaan_kosts';

    protected $fillable = [
        'user_id',
        'lokasi_kost',
        'nomor_kamar',
        'tanggal_masuk',
        'tanggal_keluar',
        'durasi_bulan',
        'status',
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke Transaksi
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'penyewaan_id');
    }


    // Mutator untuk otomatis hitung tanggal keluar
    public function setTanggalMasukAttribute($value)
    {
        $this->attributes['tanggal_masuk'] = $value;

        // Auto-calculate tanggal_keluar jika durasi_bulan sudah ada
        if (isset($this->attributes['durasi_bulan'])) {
            $tanggalMasuk = Carbon::parse($value);
            $this->attributes['tanggal_keluar'] = $tanggalMasuk->addMonths($this->attributes['durasi_bulan'])->toDateString();
        }
    }

    public function setDurasiBulanAttribute($value)
    {
        $this->attributes['durasi_bulan'] = $value;

        // Auto-calculate tanggal_keluar jika tanggal_masuk sudah ada
        if (isset($this->attributes['tanggal_masuk'])) {
            $tanggalMasuk = Carbon::parse($this->attributes['tanggal_masuk']);
            $this->attributes['tanggal_keluar'] = $tanggalMasuk->addMonths($value)->toDateString();
        }
    }
}
