<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AUT;
use App\Models\AUTD;
use Illuminate\Support\Facades\Validator;
use DB;

class AUTController extends Controller
{
    /**
     * [End point] para recibir Ordenes Médicas de CE y almacenarlas en la Base de Datos
     * Developed-by: fberrocalmachado - 21/Oct/2024
     */
    public function receiveMedicalOrden(Request $request) {
        $validation_rules = [
            'ordenes.*.IDAUT'               => 'required|string|unique:AUT,IDAUT',
            'ordenes.*.NOAUT'               => 'required|string|unique:AUT,NOAUT',
            'ordenes.*.FECHA'               => 'required|date',
            'ordenes.*.IDAFILIADO'          => 'required|string',
            'ordenes.*.PREFIJO'             => 'required|string',
            'ordenes.*.IDSEDE'              => 'required|string',
            'ordenes.*.IDSOLICITANTE'       => 'required|string',
            'ordenes.*.IDPROVEEDOR'         => 'required|string', 
            'ordenes.*.IDSERVICIOADM'       => 'required|string',
            'ordenes.*.TIPOTTEC'            => 'required|string',
            'ordenes.*.TIPOSISTEMA'         => 'required|string',
            'ordenes.*.TIPOCONTRATO'        => 'required|string',
            'ordenes.*.KCNTID'              => 'required|integer|min:1',
            'ordenes.*.IDADMINISTRADORA_AFI'=> 'required|string',
            'ordenes.*.d.*.IDAUT'           => 'required|string',
            'ordenes.*.d.*.NO_ITEM'         => 'required|integer',
            'ordenes.*.d.*.IDSERVICIO'      => 'required|string',
            'ordenes.*.d.*.CANTIDAD'        => 'required|integer|min:1'
        ];

        $json = $request->input('json', null);

        if (is_string($json)) {
            $ordenesObj     = json_decode($json);
            $ordenes_array  = json_decode($json, true);
        } elseif (is_array($json)) {
            $ordenesObj    = $json;
            $ordenes_array = $json;
        }

        if ( !empty($ordenesObj) && !empty($ordenes_array) ) {

            $validator = Validator::make($ordenes_array, $validation_rules);

            if ($validator->fails()) {
                $data = array(
                    'status'  => 'error',
                    'code'    => 400,
                    'message' => 'Error en la validacion.',
                    'errors'  => $validator->errors()
                );
            } else {

                DB::beginTransaction();

                try {

					foreach ($ordenes_array as $autData) {
						AUT::create([
							'IDAUT'                 => $autData['IDAUT'],
                            'NOAUT'                 => $autData['NOAUT'],
                            'FECHA'                 => $autData['FECHA'],
                            'FECHAVENCE'            => $autData['FECHAVENCE'],
                            'IDAFILIADO'            => $autData['IDAFILIADO'],
                            'PREFIJO'               => $autData['PREFIJO'],
                            'IDSEDE'                => $autData['IDSEDE'],
                            'IDSEDEORIGEN'          => $autData['IDSEDEORIGEN'],
                            'TIPOAUTORIZACION'      => $autData['TIPOAUTORIZACION'],
                            'ALTOCOSTO'             => $autData['ALTOCOSTO'],
                            'ATENCION'              => $autData['ATENCION'],
                            'URGENCIA'              => $autData['URGENCIA'],
                            'IMPUTABLE_A'           => $autData['IMPUTABLE_A'],
                            'IDSOLICITANTE'         => $autData['IDSOLICITANTE'],
                            'IDPROVEEDOR'           => $autData['IDPROVEEDOR'],
                            'ESTADO'                => $autData['ESTADO'],
                            'CONSANULADO'           => $autData['CONSANULADO'],
                            'IDOPERADORANULA'       => $autData['IDOPERADORANULA'],
                            'NO_ITEMES'             => $autData['NO_ITEMES'],
                            'VALORTOTAL'            => $autData['VALORTOTAL'],
                            'VALORCOPAGO'           => $autData['VALORCOPAGO'],
                            'VALORBENEFICIO'        => $autData['VALORBENEFICIO'],
                            'VALOREXEDENTE'         => $autData['VALOREXEDENTE'],
                            'VALORTOTALCOSTO'       => $autData['VALORTOTALCOSTO'],
                            'VALORCOPAGOCOSTO'      => $autData['VALORCOPAGOCOSTO'],
                            'IMPRESO'               => $autData['IMPRESO'],
                            'CXPGEN'                => $autData['CXPGEN'],
                            'CXCGEN'                => $autData['CXCGEN'],
                            'AUTORIZADO'            => $autData['AUTORIZADO'],
                            'IDESTADOE'             => $autData['IDESTADOE'],
                            'USUARIO'               => $autData['USUARIO'],
                            'IDCAUSAEXT'            => $autData['IDCAUSAEXT'],
                            'AMBITO'                => $autData['AMBITO'],
                            'FINALIDAD'             => $autData['FINALIDAD'],
                            'PERSONAL_AT'           => $autData['PERSONAL_AT'],
                            'DXPPAL'                => $autData['DXPPAL'],
                            'TIPOURGENCIA'          => $autData['TIPOURGENCIA'],
                            'SPD'                   => $autData['SPD'],
                            'CLASEORDEN'            => $autData['CLASEORDEN'],
                            'GENEROCAJA'            => $autData['GENEROCAJA'],
                            'IDCONTRATANTE'         => $autData['IDCONTRATANTE'],
                            'TIPOCOPAGO'            => $autData['TIPOCOPAGO'],
                            'PEDIDOINV'             => $autData['PEDIDOINV'],
                            'ESCONTINUACION'        => $autData['ESCONTINUACION'],
                            'SEMANASCOT'            => $autData['SEMANASCOT'],
                            'LIQUIDAPC'             => $autData['LIQUIDAPC'],
                            'CLASECONT'             => $autData['CLASECONT'],
                            'ESDEINV'               => $autData['ESDEINV'],
                            'FECHAGEN'              => $autData['FECHAGEN'],
                            'IDAREAH'               => $autData['IDAREAH'],
                            'IDAREA'                => $autData['IDAREA'],
                            'CCOSTO'                => $autData['CCOSTO'],
                            'NIVELATENCION'         => $autData['NIVELATENCION'],
                            'FACTURADA'             => $autData['FACTURADA'],
                            'VFACTURAS'             => $autData['VFACTURAS'],
                            'FACTURABLE'            => $autData['FACTURABLE'],
                            'DESCUENTO'             => $autData['DESCUENTO'],
                            'TIPODTO'               => $autData['TIPODTO'],
                            'MARCAFAC'              => $autData['MARCAFAC'],
                            'IDIPS'                 => $autData['IDIPS'],
                            'CLASECONTRATO'         => $autData['CLASECONTRATO'],
                            'ENPAQUETE'             => $autData['ENPAQUETE'],
                            'SOAT'                  => $autData['SOAT'],
                            'NOADMISION'            => $autData['NOADMISION'],
                            'CLASERUBRO'            => $autData['CLASERUBRO'],
                            'PERIODICIDAD'          => $autData['PERIODICIDAD'],
                            'CONTINUACION'          => $autData['CONTINUACION'],
                            'VLRUTOTRA'             => $autData['VLRUTOTRA'],
                            'MARCAENV'              => $autData['MARCAENV'],
                            'COPAGOPROPIO'          => $autData['COPAGOPROPIO'],
                            'ESDELAB'               => $autData['ESDELAB'],
                            'ENLAB'                 => $autData['ENLAB'],
                            'COBRARA'               => $autData['COBRARA'],
                            'IDTERCEROCA'           => $autData['IDTERCEROCA'],
                            'CONSECUTIVOHCA'        => $autData['CONSECUTIVOHCA'],
                            'RAZONANULACION'        => $autData['RAZONANULACION'],
                            'PIDECCOSTO'            => $autData['PIDECCOSTO'],
                            'PEXTERNA'              => $autData['PEXTERNA'],
                            'CTUID'                 => $autData['CTUID'],
                            'CNSCTU'                => $autData['CNSCTU'],
                            'LAPSOATIENDE'          => $autData['LAPSOATIENDE'],
                            'CNSCITA'               => $autData['CNSCITA'],
                            'REQAUTORIZACION'       => $autData['REQAUTORIZACION'],
                            'OT_SELECCIONADO'       => $autData['OT_SELECCIONADO'],
                            'OT_REALIZADO'          => $autData['OT_REALIZADO'],
                            'IDSERVICIOADM'         => $autData['IDSERVICIOADM'],
                            'TIPOTTEC'              => $autData['TIPOTTEC'],
                            'IMPSINPAGOPRE'         => $autData['IMPSINPAGOPRE'],
                            'NUMMESESENTREGA'       => $autData['NUMMESESENTREGA'],
                            'NUMENTREGA'            => $autData['NUMENTREGA'],
                            'AFIRCID'               => $autData['AFIRCID'],
                            'TIPOSISTEMA'           => $autData['TIPOSISTEMA'],
                            'TIPOCONTRATO'          => $autData['TIPOCONTRATO'],
                            'KCNTID'                => $autData['KCNTID'],
                            'IDADMINISTRADORA_AFI'  => $autData['IDADMINISTRADORA_AFI'],
                            'TIPOAFILIADO'          => $autData['TIPOAFILIADO']
						]);

                        foreach ($autData['d'] as $detalle) {
							AUTD::create([
								'IDAUT'                 => $detalle['IDAUT'],
                                'NO_ITEM'               => $detalle['NO_ITEM'],
                                'IDSERVICIO'            => $detalle['IDSERVICIO'],
                                'CANTIDAD'              => $detalle['CANTIDAD'],
                                'VALOR'                 => $detalle['VALOR'],
                                'VALORCOPAGO'           => $detalle['VALORCOPAGO'],
                                'VALORCOPAGOCOSTO'      => $detalle['VALORCOPAGOCOSTO'],
                                'VALOREXCEDENTE'        => $detalle['VALOREXCEDENTE'],
                                'VALORTOTALCOSTO'       => $detalle['VALORTOTALCOSTO'],
                                'IMPRESO'               => $detalle['IMPRESO'],
                                'AUTORIZADO'            => $detalle['AUTORIZADO'],
                                'COMENTARIOS'           => $detalle['COMENTARIOS'],
                                'PCOBERTURA'            => $detalle['PCOBERTURA'],
                                'CCOSTO'                => $detalle['CCOSTO'],
                                'MARCAPAGO'             => $detalle['MARCAPAGO'],
                                'ESDELAB'               => $detalle['ESDELAB'],
                                'ENLAB'                 => $detalle['ENLAB'],
                                'IDTERCEROCA'           => $detalle['IDTERCEROCA'],
                                'FACTURADA'             => $detalle['FACTURADA'],
                                'AQUIENCOBRO'           => $detalle['AQUIENCOBRO'],
                                'MARCACOPAGOORDEN'      => $detalle['MARCACOPAGOORDEN'],
                                'VALORPROV'             => $detalle['VALORPROV'],
                                'PCOSTO'                => $detalle['PCOSTO'],
                                'DOSISAPL'              => $detalle['DOSISAPL'],
                                'AUTDID'                => $detalle['AUTDID'],
                                'CANTIDAD_AUTORIZADA'   => $detalle['CANTIDAD_AUTORIZADA'],
                                'REQAUTORIZACION'       => $detalle['REQAUTORIZACION'],
                                'FACTURABLE'            => $detalle['FACTURABLE'],
                                'NOPOS'                 => $detalle['NOPOS'],
                                'TIPOCONTRATO'          => $detalle['TIPOCONTRATO'],
                                'KNEGID'                => $detalle['KNEGID'],
                                'IDTARIFA'              => $detalle['IDTARIFA'],
                                'ITEM_TAR'              => $detalle['ITEM_TAR'],
                                'COBRARA'               => $detalle['COBRARA'],
                                'ACCION'                => $detalle['ACCION'],
                                'NOCOBRABLE'            => $detalle['NOCOBRABLE'],
                                'KCNTRID'               => $detalle['KCNTRID'],
                                'REALIZADO'             => $detalle['REALIZADO'],
                                'LABO_ORDID'            => $detalle['LABO_ORDID']
							]);
						}
					}

					DB::commit();

                    $data = array(
                        'status'  => 'success',
                        'code'    => 201,
                        'message' => 'Ordenes MEdicas guardadas exitosamente',
                        'datos'   => $ordenes_array
                    );

                } catch (\Exception $e) {
					DB::rollBack();

                    $data = array(
                        'status'  => 'error',
                        'code'    => 500,
                        'message' => 'Error al guardar las Ordenes MEdicas',
                        'details' => $e->getMessage()
                    );
				}
            }

        } else {
            $data = array(
                'status'  => 'error',
                'code'    => 404,
                'message' => 'Los datos recibidos no son correctos.'
            );
        }

        return response()->json($data, $data['code']);
    }

}
