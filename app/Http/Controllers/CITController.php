<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CIT;
use Illuminate\Support\Facades\Validator;

class CITController extends Controller
{
    /**
     * Tipo GET
     * <$idmedico> : ID del Médico
     * Developed/by: fberrocalmachado
     */
    public function citasMedico($idmedico) {
        $citas = CIT::select('*')->where('IDMEDICO', $idmedico)->get();

        if (is_object($citas)) {
            $data = [
                'code'   => 200,
                'status' => 'success',
                'items'  => $citas
            ];
        } else {
            $data = [
                'code'   => 404,
                'status' => 'Error',
                'items'  => 'No se encontraron detalles'
            ];
        }

        return response()->json($data, $data['code']);
    }

    /**
     * Tipo: POST
     * Insert in CIT the registers included in the Array CIT JSON
     * Developed/by: fberrocalmachado - Mon Oct 07, 2024
     */
    public function storeRecords(Request $request) {
        
        $validation_rules = [
            'citas.*.CONSECUTIVO'   => 'required|string|max:13',
            'citas.*.IDAFILIADO'    => 'required|string',
            'citas.*.FECHA'         => 'required',
            'citas.*.IDSERVICIO'    => 'required|string',
            'citas.*.IDCONTRATANTE' => 'required|string',
            'citas.*.IDMEDICO'      => 'required|string'
        ];

        $citas       = $request->input('json');
        $citasObj    = json_decode($citas);
        $citas_array = json_decode($citas, true);

        $validator = Validator::make($citas_array, $validation_rules);

        if ($validator->fails()) {
            $data = array(
                'status' => 'error',
                'code' => 400, 
                'message' => 'Error en la validacion.', 
                'errors' => $validator->errors()
            );
        } else {
            if (!empty($citas_array) && !empty($citasObj)) {
                try {
                    /*
                    foreach ($citas_array['citas'] as $record) {
                        $record = array_map('trim', $record);
                        CIT::create($record); // INSERCION UNO A UNO
                    }
                    */

                    CIT::insert($citas_array['citas']); // INSERCION MASIVA
            
                    $data = array(
                        'status' => 'success',
                        'code' => 201,
                        'message' => 'Registros insertados correctamente'
                    );
        
                } catch (\Exception $e) {
                    $data = array(
                        'status' => 'error',
                        'code' => 500,
                        'message' => 'Error al insertar los registros',
                        'details' => $e->getMessage()
                    );
                }

            } else {
                $data = array(
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'Los datos recibidos no son correctos.'
                );
            }

        }    

        return response()->json($data, $data['code']);

    }
}
