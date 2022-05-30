<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEtiquetaRequest;
use App\Http\Requests\UpdateEtiquetaRequest;
use App\Http\Resources\EtiquetaResource;
use App\Models\Etiqueta;
use Illuminate\Http\Request;

class EtiquetaController extends Controller
{
    public function index()
    {
        $perPage = request('perpage') ? intval(request('perpage')) : 10;
        return (EtiquetaResource::collection(Etiqueta::orderByDesc('id')->paginate($perPage)))
            ->additional([
                'res' => true,
                'msg' => 'Etiquetas listadas correctamente.',
            ]);
    }

    public function store(StoreEtiquetaRequest $request)
    {
        return (new EtiquetaResource(Etiqueta::create($request->all())))
            ->additional([
                'res' => true,
                'msg' => 'Etiqueta guardada correctamente.'
            ]);
    }

    public function show(Etiqueta $etiqueta)
    {
        return (new EtiquetaResource($etiqueta))
            ->additional([
                'res' => true,
                'msg' => 'Etiqueta mostrada correctamente.'
            ]);
    }

    public function update(UpdateEtiquetaRequest $request, Etiqueta $etiqueta)
    {
        $etiqueta->update($request->all());
        return (new EtiquetaResource($etiqueta))
            ->additional([
                'res' => true,
                'msg' => 'Etiqueta actualizada correctamente.'
            ]);
    }

    public function destroy(Etiqueta $etiqueta)
    {
        $etiqueta->update(['estado' => 'eliminado']);
        return (new EtiquetaResource($etiqueta))
            ->additional([
                'res' => true,
                'msg' => 'Etiqueta eliminada correctamente.'
            ]);
    }
}
