<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * Todas las rutas dentro de este middleware contienen la validación
 * del protocolo cors, si se desea escalar es necesario modificar el fichero del middleware
 * de cors
 * 
 * @see \App\Http\Middleware/Cors
 */
Route::group(['middleware' => 'cors'], function(){

    //Rutas públicas
    Route::post('ConfiguracionCarga', [\App\Http\Controllers\Api\V1\ConfigCargaController::class, 'store'])->name('ConfiguracionCarga');
    Route::get('ConfiguracionCarga/{id}', [\App\Http\Controllers\Api\V1\ConfigCargaController::class, 'show']);
    Route::get('ConfiguracionCarga', [\App\Http\Controllers\Api\V1\ConfigCargaController::class, 'index']);

    // Rutas de acciones del sistema
    Route::get('Acciones', [\App\Http\Controllers\Api\V1\AccionesController::class,'index' ]);

    //Rutas de los usuarios
    Route::get('Usuarios', [\App\Http\Controllers\Api\V1\UsuariosController::class, 'index']);
    Route::post('Usuarios', [\App\Http\Controllers\Api\V1\UsuariosController::class, 'store']);
    Route::get('Usuarios/{id}', [\App\Http\Controllers\Api\V1\UsuariosController::class, 'show']);

    // Rutas para gestionar solicitudes
    Route::get('Solicitud', [\App\Http\Controllers\Api\V1\SolicitudesController::class, 'index']);
    Route::post('Solicitud', [\App\Http\Controllers\Api\V1\SolicitudesController::class, 'store']);

    // Rutas de grupos de usuarios del sistema
    Route::get('GruposSistema', [\App\Http\Controllers\Api\V1\GruposSistemaController::class, 'index']);
});
