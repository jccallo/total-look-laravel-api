<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRolRequest;
use App\Http\Requests\UpdateRolRequest;
use App\Http\Resources\RolResource;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
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
            'roles' => Rol::all()
        ], 200);

        // return RolResource::collection(Rol::all());
        // return Rol::find(1)->empleados;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolRequest $request)
    {
        Rol::create($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Rol guardado correctamente.'
        ], 201);

        // return (new RolResource(Rol::create($request->all())))
        // ->additional([
        //     'msg' => 'Rol guardado correctamente.'
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $rol)
    {
        return response()->json([
            'res' => true,
            'rol' => $rol
        ], 200);

        // return new RolResource($rol);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolRequest $request, Rol $rol)
    {
        $rol->update($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Rol actualizado correctamente.'
        ], 200);

        // $rol->update($request->all());
        // return (new RolResource($rol))
        // ->additional([
        //     'msg' => 'Rol actualizado correctamente.'
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rol $rol)
    {
        $rol->delete();
        return response()->json([
            'res' => true,
            'msg' => 'Rol eliminado correctamente.'
        ], 200);

        // $rol->delete();
        // return (new RolResource($rol))
        // ->additional([
        //     'msg' => 'Rol eliminado correctamente.'
        // ]);
    }
}
