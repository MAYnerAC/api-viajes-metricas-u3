<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//
use App\Models\Itinerario;

class ItinerarioController extends Controller
{
    //Obtener una lista de registros
    public function index()
    {
        return Itinerario::all();
    }

    //Obtener un solo registro
    public function show(Itinerario $itinerario)
    {
        return $itinerario;
    }

    //Crear un nuevo registro
    public function store(Request $request)
    {
        $itinerario = Itinerario::create($request->all());
        return response()->json($itinerario,  201);
    }

    //Actualizar registro
    public function update(Request $request, Itinerario $itinerario)
    {
        $itinerario->update($request->all());
        return response()->json($itinerario,  200);
    }

    //Eliminar registro
    public function delete(Request $request, Itinerario $itinerario)
    {
        $itinerario->delete();
        return response()->json(null,  204);
    }

    //
}
