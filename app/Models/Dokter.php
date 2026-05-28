<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokter extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'iddokter';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'iddokter',
        'namadokter',
        'spesialis',
        'jadwalpraktik'
    ];
    public $timestamps = false;
}
