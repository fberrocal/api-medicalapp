<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HCAD extends Model
{
    use HasFactory;

    protected $table = 'HCAD';

    protected $fillable = [
        'CONSECUTIVO',
        'SECUENCIA',
        'CLASEPLANTILLA',
        'CAMPO',
        'NADA',
        'NORMAL',
        'ANORMAL',
        'DETALLAR',
        'NOTAS',
        'TIPOCAMPO',
        'ALFANUMERICO',
        'FECHA',
        'MEMO',
        'OBS',
        'LISTA',
        'ENEPICRISIS',
        'HCADID',
        'HCAID',
        'MPLDID',
        'VLRNUMERICO1',
        'VLRNUMERICO2',
        'SECUENCIAIMP'
    ];

    public $timestamps = false;
}
