<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;

    protected $table = 'turnos';

    protected $fillable = ['codigo', 'fecha_hora_programada', 'fecha_hora_llegada', 'motivo', 'estado', 'paciente_id', 'sede_id', 'modulo_id', 'profesional_id', 'empleado_registro_id'];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }

    public function modulo()
    {
        return $this->belongsTo(Modulo::class);
    }

    public function profesional()
    {
        return $this->belongsTo(Empleado::class, 'profesional_id');
    }

    public function empleadoRegistro()
    {
        return $this->belongsTo(Empleado::class, 'empleado_registro_id');
    }

    public function historialEstados()
    {
        return $this->hasMany(HistorialEstadoTurno::class);
    }

    public function receta()
    {
        return $this->hasOne(Receta::class);
    }
}