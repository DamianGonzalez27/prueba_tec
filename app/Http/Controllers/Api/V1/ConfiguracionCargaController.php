<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\ConfiguracionCarga;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfiguracionCargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(DB::table('tblconfiguracioncarga')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreConfiguracionCargaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConfiguracionCarga  $configuracionCarga
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConfiguracionCarga  $configuracionCarga
     * @return \Illuminate\Http\Response
     */
    public function edit(ConfiguracionCarga $configuracionCarga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConfiguracionCargaRequest  $request
     * @param  \App\Models\ConfiguracionCarga  $configuracionCarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConfiguracionCarga $configuracionCarga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConfiguracionCarga  $configuracionCarga
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConfiguracionCarga $configuracionCarga)
    {
        //
    }
}
