<?php

use App\Http\Controllers\api\EmpleadoController;
use App\Http\Controllers\api\RolController;
use Illuminate\Http\Request;
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

// rutas clasicas
Route::get('roles', [RolController::class, 'index']);
Route::post('roles', [RolController::class, 'store']);
Route::get('roles/{rol}', [RolController::class, 'show']);
Route::put('roles/{rol}', [RolController::class, 'update']);
Route::delete('roles/{rol}', [RolController::class, 'destroy']);

// Route::apiResource('roles', RolController::class);
Route::get('empleados', [EmpleadoController::class, 'index']);
Route::post('empleados', [EmpleadoController::class, 'store']);
Route::get('empleados/{empleado}', [EmpleadoController::class, 'show']);
Route::put('empleados/{empleado}', [EmpleadoController::class, 'update']);
Route::delete('empleados/{empleado}', [EmpleadoController::class, 'destroy']);


