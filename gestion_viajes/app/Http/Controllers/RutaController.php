<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//
use App\Models\Ruta;

class RutaController extends Controller
{
    //Obtener una lista de registros
    public function index()
    {
        return Ruta::all();
    }

    //Obtener un solo registro
    public function show(Ruta $ruta)
    {
        return $ruta;
    }

    //Crear un nuevo registro
    public function store(Request $request)
    {
        $ruta = Ruta::create($request->all());
        return response()->json($ruta,  201);
    }

    //Actualizar registro
    public function update(Request $request, Ruta $ruta)
    {
        $ruta->update($request->all());
        return response()->json($ruta,  200);
    }

    //Eliminar registro
    public function delete(Request $request, Ruta $ruta)
    {
        $ruta->delete();
        return response()->json(null,  204);
    }

    //

}
