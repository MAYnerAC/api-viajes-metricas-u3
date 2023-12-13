<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    use HasFactory;

    protected $fillable = [
        'destino',
        'fecha_salida',
        'fecha_regreso',
        'ruta_id',
        'asiento',
        'estado',
    ];

    protected $dates = [
        'fecha_salida',
        'fecha_regreso',
    ];


    public function ruta()
    {
        return $this->belongsTo('App/Models/Ruta');
    }
}
