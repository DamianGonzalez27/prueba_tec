<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ConfigCargaController extends Controller
{

    /**
     * Función para retornar todos los elementos de la tabla tblconfiguracioncarga
     *
     * @return void
     */
    public function index()
    {
        return response()->json(DB::table('tblconfiguracioncarga')->get());
    }

    /**
     * Controlador para insertar información en la tabla
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $validador = Validator::make($request->all(), [
            'proporcion' => 'required|numeric',
            'diferencia' => 'required|numeric',
            'anio' => 'required|numeric',
            'activo' => 'required|numeric'
        ]);

        if($validador->fails())
        {   
            $errors = $validador->errors();
            return response()->json($errors->all());
        }

        DB::table('tblconfiguracioncarga')->insert($request->all());
        
        return response()->json([
            'message' => 'Success!'
        ]);
    }

    /**
     * Función para mostrar a un elemento por su ID
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function show($id)
    {
        $config = DB::table('tblconfiguracioncarga')->where('id_Configuracion_Carga', $id)->first();

        if(!$config)
            return response()->json(['meesage' => 'Oops, resource not found']);

        return response()->json($config);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $configUpdated = DB::table('tblconfiguracioncarga')->where('id', $id)->update($request->all());

        return response()->json([
            'message' => 'Success!',
            'data' => $configUpdated
        ]);
    }
}
