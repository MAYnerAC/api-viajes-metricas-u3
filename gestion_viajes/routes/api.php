<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//
use App\Models\Destino;
use App\Models\Viaje;
use App\Models\DetalleViaje;
use App\Models\CostoDetalle;
//
use App\Http\Controllers\RutaController;
use App\Http\Controllers\ViajeController;
use App\Http\Controllers\ItinerarioController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/


/*

//----------------------------------------Rutas------------------------------------------//

Route::get('rutas', 'RutaController@index');
Route::get('rutas/{ruta}', 'RutaController@show');
Route::post('rutas', 'RutaController@store');
Route::put('rutas/{ruta}', 'RutaController@update');
Route::delete('rutas/{ruta}', 'RutaController@delete');

//--------------------------------------Viajes-------------------------------------------//

Route::get('viajes', 'ViajeController@index');
Route::get('viajes/{viaje}', 'ViajeController@show');
Route::post('viajes', 'ViajeController@store');
Route::put('viajes/{viaje}', 'ViajeController@update');
Route::delete('viajes/{viaje}', 'ViajeController@delete');

//------------------------------------Itinerarios----------------------------------------//

Route::get('itinerarios', 'ItinerarioController@index');
Route::get('itinerarios/{itinerario}', 'ItinerarioController@show');
Route::post('itinerarios', 'ItinerarioController@store');
Route::put('itinerarios/{itinerario}', 'ItinerarioController@update');
Route::delete('itinerarios/{itinerario}', 'ItinerarioController@delete');

//---------------------------------------------------------------------------------------//

*/


/*
//Obtener una lista de registros
Route::get('viajes', function () {
    return Viaje::all();
});

//Obtener un solo registro
Route::get('viajes/{id}', function ($id) {
    return Viaje::find($id);
});

//Crear un nuevo registro
Route::post('viajes', function (Request $request) {
    return Viaje::create($request->all());
});

//Actualizar registros
Route::put('viajes/{id}', function (Request $request, $id) {
    $viaje = Viaje::findOrFail($id);
    $viaje->update($request->all());
    return $viaje;
});

//Eliminar registros
Route::delete('viajes/{id}', function ($id) {
    Viaje::find($id)->delete();
    return 204; //Retorna el codigo http 204
});
*/


//----------------------------------------Rutas------------------------------------------//

Route::get('rutas', [RutaController::class, 'index']);
Route::get('rutas/{ruta}', [RutaController::class, 'show']);
Route::post('rutas', [RutaController::class, 'store']);
Route::put('rutas/{ruta}', [RutaController::class, 'update']);
Route::delete('rutas/{ruta}', [RutaController::class, 'delete']);

//--------------------------------------Viajes-------------------------------------------//

Route::get('viajes', [ViajeController::class, 'index']);
Route::get('viajes/{viaje}', [ViajeController::class, 'show']);
Route::post('viajes', [ViajeController::class, 'store']);
Route::put('viajes/{viaje}', [ViajeController::class, 'update']);
Route::delete('viajes/{viaje}', [ViajeController::class, 'delete']);

//------------------------------------Itinerarios----------------------------------------//

Route::get('itinerarios', [ItinerarioController::class, 'index']);
Route::get('itinerarios/{itinerario}', [ItinerarioController::class, 'show']);
Route::post('itinerarios', [ItinerarioController::class, 'store']);
Route::put('itinerarios/{itinerario}', [ItinerarioController::class, 'update']);
Route::delete('itinerarios/{itinerario}', [ItinerarioController::class, 'delete']);

//---------------------------------------------------------------------------------------//