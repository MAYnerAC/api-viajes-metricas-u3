<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itinerario extends Model
{
    use HasFactory;

    protected $fillable = [
        'ruta_id',
        'actividad',
        'fecha',
        'hora',
    ];

    protected $dates = [
        'fecha',
        'hora',
    ];


    public function ruta()
    {
        return $this->belongsTo('App/Models/Ruta');
    }
}
