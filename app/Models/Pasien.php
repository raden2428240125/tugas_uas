<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';

    protected $primaryKey = 'idpasien';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [

        'idpasien',
        'namapasien',
        'alamat',
        'notelp',
        'jeniskelamin',
        'golongandarah',
        'alergiobat',
        'keluhan'

    ];
}
