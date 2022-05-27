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
    public function index()
    {
        $perPage = request('perpage') ? intval(request('perpage')) : 10;
        return (RolResource::collection(Rol::orderByDesc('id')->paginate($perPage)))
        ->additional([
            'res' => true,
            'msg' => 'Rol listado correctamente.',
        ]);

        // return response()->json([
        //     'res' => true,
        //     'roles' => Rol::all()
        // ], 200);
    }

    public function store(StoreRolRequest $request)
    {
        return (new RolResource(Rol::create($request->all())))
        ->additional([
            'res' => true,
            'msg' => 'Rol guardado correctamente.'
        ]);

        // Rol::create($request->all());
        // return response()->json([
        //     'res' => true,
        //     'msg' => 'Rol guardado correctamente.'
        // ], 201);
    }

    public function show(Rol $rol)
    {
        return (new RolResource($rol))
        ->additional([
            'res' => true,
            'msg' => 'Rol mostrado correctamente.'
        ]);

        // return response()->json([
        //     'res' => true,
        //     'rol' => $rol
        // ], 200);

        // return new RolResource($rol);

    }

    public function update(UpdateRolRequest $request, Rol $rol)
    {
        $rol->update($request->all());
        return (new RolResource($rol))
        ->additional([
            'res' => true,
            'msg' => 'Rol actualizado correctamente.'
        ]);

        // $rol->update($request->all());
        // return response()->json([
        //     'res' => true,
        //     'msg' => 'Rol actualizado correctamente.'
        // ], 200);
    }

    public function destroy(Rol $rol)
    {
        $rol->update(['estado' => 'eliminado']);
        return (new RolResource($rol))
        ->additional([
            'res' => true,
            'msg' => 'Rol eliminado correctamente.'
        ]);

        // $rol->update(['estado' => 'eliminado']);
        // return response()->json([
        //     'res' => true,
        //     'msg' => 'Rol eliminado correctamente.'
        // ], 200);

        // $rol->delete();
        // return response()->json([
        //     'res' => true,
        //     'msg' => 'Rol eliminado correctamente.'
        // ], 200);

        // $rol->delete();
        // return (new RolResource($rol))
        // ->additional([
        //     'msg' => 'Rol eliminado correctamente.'
        // ]);
    }
}
