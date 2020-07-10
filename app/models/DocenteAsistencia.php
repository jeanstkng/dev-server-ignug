<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class DocenteAsistencia extends Model
{
    protected $fillable = [
        'fecha',
        'estado_id',
    ];

    protected $casts = [
        'fecha' => 'date:Y-m-d'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tipo()
    {
        return $this->belongsTo(Catalogo::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function jornadaActividades()
    {
        return $this->hasMany(JornadaActividad::class);
    }
}
