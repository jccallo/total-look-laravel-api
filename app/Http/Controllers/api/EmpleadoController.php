<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmpleadoRequest;
use App\Http\Requests\UpdateEmpleadoRequest;
use App\Http\Resources\EmpleadoResource;
use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'res' => true,
            'empleados' => Empleado::all()
        ], 200);

        // return Empleado::find(1)->rol->nombre;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmpleadoRequest $request)
    {
        Empleado::create($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Empleado guardado correctamente.'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        return response()->json([
            'res' => true,
            'empleado' => $empleado
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmpleadoRequest $request, Empleado $empleado)
    {
        $empleado->update($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Empleado actualizado correctamente.'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->update(['estado' => 'eliminado']);
        return response()->json([
            'res' => true,
            'msg' => 'Empleado eliminado correctamente.'
        ], 200);

        // $empleado->delete();
        // return response()->json([
        //     'res' => true,
        //     'msg' => 'Empleado eliminado correctamente.'
        // ], 200);
    }
}
