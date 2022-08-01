<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SolicitudesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(DB::table('tblsolicitudes')->get());
    }

    /**
     * Función para generar solicitudes a usuarios en el sistema
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'nombre_Solicitante' => 'required',
            'paterno_Solicitante' => 'required',
            'materno_Solicitante' => 'required',
        ]);

        if($validator->fails())
        {   
            $errors = $validator->errors();
            return response()->json($errors->all());
        }

        $asesores = DB::table('tblusuarios')->where('cve_grupo', 1)->get();
        $id_asesor = null;
        $arrayAsesores = [];
        $i = 0;
        foreach($asesores as $asesor)
        {
            $arrayAsesores[$i]['id_asesor'] = $asesor->id_usuario;
            $arrayAsesores[$i]['total_solicitudes'] = DB::table('tblsolicitudes')->where('id_usuario_Asignado', $asesor->id_usuario)->count();
            $i++;
        }

        $ordenar = $arrayAsesores;
        $numero = [];
        for($j = 0; $j<count($arrayAsesores); $j++)
        {
            
            for($x = 0; $x < count($ordenar); $x++)
            {
                if($arrayAsesores[$j]['total_solicitudes'] < $ordenar[$x]['total_solicitudes']){
                    $numero = $arrayAsesores[$j];
                }
                else{
                    $numero = $ordenar[$x];
                }
            }
        }
        dd($numero);

        $solicitud = [
            'nombre_Solicitante' => $request->input('nombre_Solicitante'),
            'paterno_Solicitante' => $request->input('paterno_Solicitante'),
            'materno_Solicitante' => $request->input('materno_Solicitante'),
            'fecha_Solicitud' => date("Y-m-d H:i:s"),
            'activo' => 1,
            'id_usuario_Asignado' => $id_asesor
        ];

        DB::table('tblsolicitudes')->insert($solicitud);

        return response()->json([
            'message' => 'Success!'
        ]);
    }
}
