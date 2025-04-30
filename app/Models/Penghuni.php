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
    ];

    protected $hidden = [
        'password',
    ];

    public function penghuni()
    {
        return $this->hasOne(Penghuni::class);
    }


}
