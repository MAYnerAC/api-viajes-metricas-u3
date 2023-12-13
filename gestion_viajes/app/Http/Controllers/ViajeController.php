<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//
use App\Models\Viaje;

class ViajeController extends Controller
{
    //Obtener una lista de registros
    public function index()
    {
        return Viaje::all();
    }

    //Obtener un solo registro
    public function show(Viaje $viaje)
    {
        return $viaje;
    }

    //Crear un nuevo registro
    public function store(Request $request)
    {
        $viaje = Viaje::create($request->all());
        return response()->json($viaje,  201);
    }

    //Actualizar registro
    public function update(Request $request, Viaje $viaje)
    {
        $viaje->update($request->all());
        return response()->json($viaje,  200);
    }

    //Eliminar registro
    public function delete(Request $request, Viaje $viaje)
    {
        $viaje->delete();
        return response()->json(null,  204);
    }

    //
}
