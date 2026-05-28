<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obat';
    protected $primaryKey = 'idobat';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'idobat',
        'namaobat',
        'jenisobat',
        'tanggal_kadaluarsa',
        'harga',
        'satuan',
        'stok'
    ];
    public $timestamps = false;
}
