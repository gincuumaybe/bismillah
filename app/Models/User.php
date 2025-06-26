<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'role',
        'lokasi_kost',
        'password',
        'image',
        'status',
    ];

    protected $dates = ['deleted_at'];


    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }


    public function penyewaanKost()
    {
        return $this->hasOne(\App\Models\PenyewaanKost::class, 'user_id'); // Satu user memiliki satu penyewaan kost
    }

    // Relasi ke Penghuni
    public function penghuni()
    {
        return $this->hasOne(Penghuni::class); // Satu user memiliki satu penghuni
    }

    public function laporans()
    {
        return $this->hasMany(\App\Models\Laporan::class);
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
