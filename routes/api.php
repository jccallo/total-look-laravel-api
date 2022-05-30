<?php

use App\Http\Controllers\api\AccessController;
use App\Http\Controllers\api\EmpleadoController;
use App\Http\Controllers\api\EtiquetaController;
use App\Http\Controllers\api\RolController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// acceso
Route::post('login', [AccessController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    // logout
    Route::post('logout', [AccessController::class, 'logout']);

    // roles
    Route::get('roles', [RolController::class, 'index']);
    Route::post('roles', [RolController::class, 'store']);
    Route::get('roles/{rol}', [RolController::class, 'show']);
    Route::put('roles/{rol}', [RolController::class, 'update']);
    Route::delete('roles/{rol}', [RolController::class, 'destroy']);

    // etiquetas
    Route::get('etiquetas', [EtiquetaController::class, 'index']);
    Route::post('etiquetas', [EtiquetaController::class, 'store']);
    Route::get('etiquetas/{etiqueta}', [EtiquetaController::class, 'show']);
    Route::put('etiquetas/{etiqueta}', [EtiquetaController::class, 'update']);
    Route::delete('etiquetas/{etiqueta}', [EtiquetaController::class, 'destroy']);

    // empleados
    Route::get('empleados', [EmpleadoController::class, 'index']);
    Route::get('empleados/crear', [EmpleadoController::class, 'create']);
    Route::post('empleados', [EmpleadoController::class, 'store']);
    Route::get('empleados/{empleado}', [EmpleadoController::class, 'show']);
    Route::put('empleados/{empleado}', [EmpleadoController::class, 'update']);
    Route::delete('empleados/{empleado}', [EmpleadoController::class, 'destroy']);
});

// Route::get('users', [UserController::class, 'index']);




