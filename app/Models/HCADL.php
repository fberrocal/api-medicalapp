<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HCADL extends Model
{
    use HasFactory;

    protected $table = 'HCADL';

    protected $fillable = [
        'CONSECUTIVO',
        'SECUENCIA',
        'ITEM',
        'VALORLISTA',
        'CHECKM',
        'DESCRIPCION',
        'HCADLID',
        'HCADID',
        'MPLDLID'
    ];

    public $timestamps = false;
}
