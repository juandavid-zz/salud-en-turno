<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';

    protected $fillable = ['legajo', 'nombres', 'apellidos', 'email', 'telefono_movil', 'fecha_alta', 'sede_id', 'rol_id'];

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    public function turnosProfesional()
    {
        return $this->hasMany(Turno::class, 'profesional_id');
    }

    public function turnosRegistrados()
    {
        return $this->hasMany(Turno::class, 'empleado_registro_id');
    }

    public function historialEstados()
    {
        return $this->hasMany(HistorialEstadoTurno::class);
    }
}