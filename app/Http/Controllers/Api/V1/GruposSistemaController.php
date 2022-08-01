<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\GruposSistema;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GruposSistemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(DB::table('tblgrupos_sistema')->get());
    }

}
