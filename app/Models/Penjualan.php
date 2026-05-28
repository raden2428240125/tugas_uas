<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';
    protected $primaryKey = 'idpenjualan';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'idpenjualan',
        'idresep',
        'idkasir',
        'idapoteker',
        'jumlah',
        'tanggal',
        'totalharga'
    ];
}
