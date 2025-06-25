<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    use HasFactory;

    protected $table = 'penghunis';


    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'role',
        'lokasi_kost',
        'password',
        'status'
    ];

    protected $hidden = [
        'password',
    ];

    public function penghuni()
    {
        return $this->hasOne(Penghuni::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'user_id');
    }
}
