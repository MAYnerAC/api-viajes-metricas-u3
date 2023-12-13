<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;

    protected $fillable = [
        'origen',
        'destino',
        'duracion',
        'distancia',
        'medio_transporte',
    ];


    public function viajes()
    {
        return $this->hasMany('App/Models/DetalleViaje');
    }


    public function itinerarios()
    {
        return $this->hasMany('App/Models/Itinerario');
    }
}
