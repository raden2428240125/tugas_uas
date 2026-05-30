<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'password',
        'no_telp',
        'alamat'
    ];

    public function reseps()
    {
        return $this->hasMany(Resep::class);
    }

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }
}
