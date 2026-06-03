<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_obat',
        'jenis_obat',
        'tanggal_kadaluarsa',
        'harga',
        'satuan',
        'stok',
        'deskripsi',
        'kategori_id'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function detailPesanans()
    {
        return $this->hasMany(DetailPesanan::class);
    }
}
