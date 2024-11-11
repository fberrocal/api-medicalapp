<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HCA;
use App\Models\HCAD;
use App\Models\HCADL;
use Illuminate\Support\Facades\Validator;
use DB;

class HCAController extends Controller
{
    /**
     * [End point] para recibir Registros Clínicos y almacenarlas en la Base de Datos
     * Developed-by: Francisco Berrocal Machado - 08/Nov/2024
     */
    public function saveMedicalRegister(Request $request) {
        $validation_rules = [
            'hc'        => 'required|string',
            'campos'    => 'required|string',
            'vrlistas'  => 'required|string'
        ];

        $json = $request->input('json', null);
        
        if (is_string($json)) {
            $historiaObj     = json_decode($json);
            $historia_array  = json_decode($json, true);
        } elseif (is_array($json)) {
            $historiaObj    = $json;
            $historia_array = $json;
        }

        if ( !empty($historiaObj) && !empty($historia_array) ) {

            $validator = Validator::make($historia_array, $validation_rules);

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
                    $qryEncabezado = $historia_array['hc'];
                    $qryCampos = $historia_array['campos'];
                    $qryValoreslistas = $historia_array['vrlistas'];
    
                    DB::statement($qryEncabezado);          // 1. Inseción de encabezado // use Illuminate\Support\Facades\DB;
                    DB::statement($qryCampos);              // 2. Inseción de campos
    
                    if ($qryValoreslistas != "NO") {
                        DB::statement($qryValoreslistas);   // 3. Inseción de valores de lista
                    }
    
                    DB::commit();

                    $data = array(
                        'status'  => 'success',
                        'code'    => 201,
                        'message' => 'Registro clínico guardado exitosamente'
                    );
                    
                } catch (\Exception $e) {
                    DB::rollBack();

                    $data = array(
                        'status'  => 'error',
                        'code'    => 500,
                        'message' => 'Error al guardar los registros clícicos',
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
