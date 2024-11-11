<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AUTD extends Model
{
    use HasFactory;

    protected $table = 'AUTD';

    protected $fillable = [
        'IDAUT',
        'NO_ITEM',
        'IDSERVICIO',
        'CANTIDAD',
        'VALOR',
        'VALORCOPAGO',
        'VALORCOPAGOCOSTO',
        'VALOREXCEDENTE',
        'VALORTOTALCOSTO',
        'IDPLAN',
        'IMPRESO',
        'AUTORIZADO',
        'COMENTARIOS',
        'PCOBERTURA',
        'OBS',
        'NORDEN',
        'CCOSTO',
        'CODIGOCPCJ',
        'MARCAPAGO',
        'NOAUTORIZEXT',
        'ESDELAB',
        'ENLAB',
        'IDTERCEROCA',
        'IDCONTRATO',
        'FACTURADA',
        'N_FACTURA',
        'CNSFCT',
        'AQUIENCOBRO',
        'MARCACOPAGOORDEN',
        'VALORPROV',
        'PCOSTO',
        'DOSISAPL',
        'DURACIONTTOF',
        'DURACIONTTOC',
        'AUTDID',
        'CANTIDAD_AUTORIZADA',
        'REQAUTORIZACION',
        'FACTURABLE',
        'NOPOS',
        'TIPOCONTRATO',
        'KNEGID',
        'IDTARIFA',
        'ITEM_TAR',
        'capitado',
        'COBRARA',
        'ACCION',
        'NOCOBRABLE',
        'KCNTRID',
        'REALIZADO',
        'REALIZADOFECHA',
        'LABO_ORDID'
    ];

    public $timestamps = false;
}
