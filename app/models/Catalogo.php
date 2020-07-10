<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    protected $fillable = [
        'codigo',
        'nombre',
        'tipo',
        'icono',
        'estado'
    ];


}
