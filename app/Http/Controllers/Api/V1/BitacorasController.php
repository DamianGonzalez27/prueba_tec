<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Bitacoras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BitacorasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(DB::table('tblbitacoras')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBitacorasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validador = Validator::make($request->all(), [
            'id_usuario' => 'required|numeric',
            'cve_accion' => 'required|numeric',
            'fecha' => 'required|date',
            'movimiento' => 'required|string',
        ]);

        if($validador->fails())
        {   
            $errors = $validador->errors();
            return response()->json($errors->all());
        }

        DB::table('tblbitacoras')->insert($request->all());
        
        return response()->json([
            'message' => 'Success!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bitacoras  $bitacoras
     * @return \Illuminate\Http\Response
     */
    public function show(Bitacoras $bitacoras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBitacorasRequest  $request
     * @param  \App\Models\Bitacoras  $bitacoras
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bitacoras $bitacoras)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bitacoras  $bitacoras
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bitacoras $bitacoras)
    {
        //
    }
}
