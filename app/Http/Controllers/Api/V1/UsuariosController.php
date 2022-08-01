<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(DB::table('tblusuarios')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'paterno' => 'required',
            'materno' => 'required',
            'password' => 'required',
            'cve_grupo' => 'required|numeric'
        ]);

        if($validator->fails())
        {   
            $errors = $validator->errors();
            return response()->json($errors->all());
        }

        $user = [
            'nombre' => $request->input('nombre'),
            'paterno' => $request->input('paterno'),
            'materno' => $request->input('materno'),
            'login' => "",
            'password' => hash('sha256', $request->input('password')),
            'archivo' => 1, 
            'cve_grupo' => $request->input('cve_grupo')
        ];

        try{
            DB::table('tblusuarios')->insert($user);
            return response()->json([
                'message' => 'Success'
            ]);
        }catch(\Illuminate\Database\QueryException $e){
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
        

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $config = DB::table('tblusuarios')->where('id_usuario', $id)->first();

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
