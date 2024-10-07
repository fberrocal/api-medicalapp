<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CIT extends Model
{
    use HasFactory;

    protected $table = 'CIT';

    protected $fillable = [
        'CONSECUTIVO',
        'FECHASOL',
        'FECHA',
        'FECHAATENCION',
        'IDAFILIADO',
        'TIPOCITA',
        'TIPOSOLICITUD',
        'IDSERVICIO',
        'ATENCION',
        'PVEZ',
        'IDCONTRATANTE',
        'IDSEDE',
        'IDMEDICO',
        'URGENCIA',
        'VALORTOTAL',
        'VALORCOPAGO',
        'VALOREXEDENTE',
        'VALORTOTALCOS',
        'VALORCOPAGOCOSTO',
        'IMPRESO',
        'CUMPLIDA',
        'IDPESPECIAL',
        'ESTADO',
        'GENEROCAJA',
        'IDSEDEATENCION',
        'TELEFONOAVISO',
        'DISPONIBILIDAD',
        'SPD',
        'CLASEORDEN',
        'USUARIO',
        'GENPRESTACION',
        'FECHALLEGA',
        'USUARIOLLEGA',
        'IDSEDEORIGEN',
        'TIPOCOPAGO',
        'VPROCEDENCIA',
        'IDAREAH',
        'IDAREA',
        'CCOSTO',
        'FACTURADA',
        'VFACTURAS',
        'FACTURABLE',
        'MARCAFAC',
        'TIPODTO',
        'CLASECONTRATO',
        'ALTOCOSTO',
        'IDEMEDICA',
        'IDTERCEROCA',
        'FINALIDAD',
        'AQUIENCOBRO',
        'VALORPROV',
        'CITAVOLFE',
        'LAPSOATIENDE',
        'LAPSOASIGNA',
        'PVEZIPS',
        'PVEZMEDICO',
        'CNSCTU',
        'CTUID',
        'PPTID',
        'IDHCAIC',
        'VALORMODERADORA',
        'FECHADESEADA',
        'NOPOS',
        'IDSERVICIOADM',
        'TIPOCONTRATO',
        'KNEGID',
        'IDTARIFA',
        'ITEM_TAR',
        'COBRARA',
        'ACCION',
        'NOCOBRABLE',
        'TIPOTTEC',
        'KCNTRID',
        'AFIRCID',
        'CITASIMULTANEA',
        'GENCITASIMULTANEA',
        'TIPODX',
        'TIPOSISTEMA',
        'KCNTID',
        'IDADMINISTRADORA_AFI',
        'TIPOAFILIADO',
        'OKAUTID'
    ];

    public $timestamps = false;
}
