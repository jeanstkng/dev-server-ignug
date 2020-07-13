<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    protected $fillable = [
        'codigo',
        'codigo_padre_id',
        'nombre',
        'tipo',
        'icono',
        'estado_id'
    ];


}
