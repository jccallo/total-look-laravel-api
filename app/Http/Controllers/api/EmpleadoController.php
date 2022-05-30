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
        $empleados = Empleado::orderByDesc('id')->paginate($perPage);
        return (EmpleadoResource::collection($empleados))
            ->additional([
                'res' => true,
                'msg' => 'Empleado listado correctamente.',
            ]);
    }

    public function create()
    {
        return response()->json([
            'data' => [
                'roles' => Rol::all()->pluck('nombre', 'id'),
            ],
            'res' => true,
            'msg' => 'Combos listados correctamente.',
        ], 200);
    }

    public function store(StoreEmpleadoRequest $request)
    {
        $empleado = $request->all();
        if ($imagen = $request->file('imagen')) {
            $destino = 'storage/images/'; // tambien funciona: public_path('storage/images')
            $nombre = date('YmdHis') . "." . $imagen->getClientOriginalExtension(); // tambien se puede usar; time() y uniqid()
            $imagen->move($destino, $nombre);
            $empleado['imagen'] = $nombre;
        }
        $empleado = Empleado::create($empleado);
        return (new EmpleadoResource($empleado))
            ->additional([
                'res' => true,
                'msg' => 'Empleado guardado correctamente.'
            ]);
    }

    public function show(Empleado $empleado)
    {
        return (new EmpleadoResource($empleado))
            ->additional([
                'res' => true,
                'msg' => 'Empleado mostrado correctamente.'
            ]);
    }

    public function update(UpdateEmpleadoRequest $request, Empleado $empleado)
    {
        $empleadoRequest = $request->all();
        if ($imagen = $request->file('imagen')) {
            $destino = 'storage/images/'; // tambien funciona: public_path('storage/images')
            $nombre = date('YmdHis') . "." . $imagen->getClientOriginalExtension(); // tambien se puede usar; time() y uniqid()
            $imagen->move($destino, $nombre);
            $empleadoRequest['imagen'] = $nombre;
        }

        $empleado->update($empleadoRequest);
        return (new EmpleadoResource($empleado))
            ->additional([
                'res' => true,
                'msg' => 'Empleado actualizado correctamente.'
            ]);
        // return response()->json([
        //     'res' => true,
        //     'msg' => 'Empleado actualizado correctamente.',
        //     'data' => [
        //         'todos' => $request->all(),
        //         'empleado' => $empleado,
        //     ],
        // ], 200);

        // $empleado->update($request->all());
        // return (new EmpleadoResource($empleado))
        //     ->additional([
        //         'res' => true,
        //         'msg' => 'Empleado actualizado correctamente.'
        //     ]);
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
