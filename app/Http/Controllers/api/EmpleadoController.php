<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmpleadoRequest;
use App\Http\Requests\UpdateEmpleadoRequest;
use App\Http\Resources\EmpleadoResource;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = request('perpage') ? intval(request('perpage')) : 10;
        return (EmpleadoResource::collection(Empleado::paginate($perPage)))
        ->additional([
            'res' => true,
            'msg' => 'Empleado listado correctamente.',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmpleadoRequest $request)
    {
        return (new EmpleadoResource(Empleado::create($request->all())))
        ->additional([
            'res' => true,
            'msg' => 'Empleado guardado correctamente.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        return (new EmpleadoResource($empleado))
        ->additional([
            'res' => true,
            'msg' => 'Empleado mostrado correctamente.'
        ]);

        // $emp = Empleado::find($empleado->id)->with('rol'); /////
        // $emp = Empleado::with('rol')->where('id', $empleado->id)->first();
        // $rol = Rol::find($empleado->id)->nombre;
        // $rol = Empleado::find($empleado->id)->rol->nombre;
        // $empleado->roles = Empleado::find($empleado->id)->rol;
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
        return (new EmpleadoResource($empleado))
        ->additional([
            'res' => true,
            'msg' => 'Empleado actualizado correctamente.'
        ]);
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
        return (new EmpleadoResource($empleado))
        ->additional([
            'res' => true,
            'msg' => 'Empleado eliminado correctamente.'
        ]);
    }
}
