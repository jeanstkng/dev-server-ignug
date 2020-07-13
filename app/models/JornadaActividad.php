<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class JornadaActividad extends Model
{
    protected $table = 'jornada_actividades';
    protected $fillable = [
        'hora_inicio',
        'hora_fin',
        'descripcion',
        'duracion',
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
