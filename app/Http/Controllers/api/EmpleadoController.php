<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmpleadoRequest;
use App\Http\Requests\UpdateEmpleadoRequest;
use App\Http\Resources\EmpleadoResource;
use App\Models\Empleado;
use App\Models\Rol;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $perPage = request('perpage') ? intval(request('perpage')) : 10;
        return (EmpleadoResource::collection(Empleado::orderByDesc('id')->paginate($perPage)))
            ->additional([
                'res' => true,
                'msg' => 'Empleado listado correctamente.',
            ]);
    }

    public function create()
    {
        return response()->json([
            'res' => true,
            'msg' => 'Combos listado correctamente.',
            'data' => [
                'roles' => Rol::all()->pluck('nombre', 'id'),
            ],
        ], 200);
    }

    public function store(StoreEmpleadoRequest $request)
    {
        $empleado = $request->all();
        // if ($imagen = $request->file('imagen')) {
        //     $rutaGuardarImg = 'imagen/';
        //     $imagenEmpleado = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
        //     $imagen->move($rutaGuardarImg, $imagenEmpleado);
        //     $empleado['imagen'] = "$imagenEmpleado";
        // }
        return (new EmpleadoResource(Empleado::create($empleado)))
            ->additional([
                'res' => true,
                'msg' => 'Empleado guardado correctamente.'
            ]);
    }

    public function show(Empleado $empleado)
    {
        return (new EmpleadoResource($empleado))
            ->additional([
                'roles' => Rol::all()->pluck('nombre', 'id'),
                'res' => true,
                'msg' => 'Empleado mostrado correctamente.'
            ]);
    }

    public function update(UpdateEmpleadoRequest $request, Empleado $empleado)
    {
        // $prod = $request->all();
        // if ($imagen = $request->file('imagen')){
        //     $rutaGuardarImg = 'imagen/';
        //     $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
        //     $imagen->move($rutaGuardarImg, $imagenProducto);
        //     $prod['imagen'] = "$imagenProducto";
        // }
        // else {
        //     unset($prod['imagen']);
        // }

        // $empleado->update($prod);


        // return response()->json([
        //     'res' => true,
        //     'msg' => 'Empleado actualizado correctamente.',
        //     'data' => [
        //         'empleado' => $request->all(),
        //         'empleado2' => $empleado,
        //     ],
        // ], 200);

        $empleado->update($request->all());
        return (new EmpleadoResource($empleado))
            ->additional([
                'res' => true,
                'msg' => 'Empleado actualizado correctamente.'
            ]);
    }

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
