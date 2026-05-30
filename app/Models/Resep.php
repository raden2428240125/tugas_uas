<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $fillable = [
        'pelanggan_id',
        'file_resep',
        'status',
        'catatan'
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }
}
