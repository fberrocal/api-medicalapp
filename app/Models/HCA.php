<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HCA extends Model
{
    use HasFactory;

    protected $table = 'HCA';

    protected $fillable = [
        'CONSECUTIVO',
        'CLASEPLANTILLA',
        'FECHA',
        'IDMEDICO',
        'IDAFILIADO',
        'NOADMISION',
        'IDDX',
        'TIPODX',
        'IMPRESO',
        'EDAD',
        'FINALIDAD',
        'DX1',
        'DX2',
        'DX3',
        'IDMEDICODILIGENCIA',
        'IDDXEG',
        'N_HISTORIA',
        'PROCEDENCIA',
        'REVISAESP',
        'IDMEDICOESP',
        'PIDEDX',
        'PIDESV',
        'TAS',
        'TAD',
        'FC',
        'FR',
        'TEMP',
        'TALLA',
        'PULSO',
        'PESO',
        'GLASGOW',
        'TIPOGLASGOW',
        'HIDRATACION',
        'ALTA',
        'CLASE',
        'ITEMHADM',
        'ESTADO',
        'CONSANULADO',
        'IDOPERADORANULA',
        'FECHAANULA',
        'CAUSALANULA',
        'RAZONANULACION',
        'CAUSAEXT',
        'LAPSOATENCION',
        'CNSCITA',
        'INVESTIGACION',
        'T',
        'N',
        'M',
        'SATO2',
        'ECOG',
        'FECHAHC',
        'HCAID',
        'AFITTOID',
        'IDAREA',
        'SYS_ComputerName',
        'AFITTODID',
        'MPLID',
        'IDSEDE',
        'IDADMINISTRADORA',
        'USUARIO',
        'IDEMEDICA',
        'AUDITADOPOR',
        'FECHAAUDIT',
        'VERSIONIMP',
        'VERSIONPLT'
    ];
    
    public $timestamps = false;
}
