<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialEstadoTurno extends Model
{
    use HasFactory;

    protected $table = 'historial_estados_turno';
    protected $fillable = ['turno_id', 'estado', 'fecha_hora', 'empleado_id'];

    public function turno()
    {
        return $this->belongsTo(Turno::class);
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}