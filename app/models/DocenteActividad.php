<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class DocenteActividad extends Model
{
    protected $table = 'docente_actividades';
    protected $fillable = [
        'descripcion',
        'porcentaje_avance',
        'observaciones',
        'tipo_id',
        'estado_id',
    ];

    protected $casts = [
        'hora_inicio' => 'time:H:i:s',
        'hora_fin' => 'time:H:i:s',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function docenteAsistencia()
    {
        return $this->belongsTo(DocenteAsistencia::class);
    }

    public function tipo()
    {
        return $this->belongsTo(Catalogo::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
