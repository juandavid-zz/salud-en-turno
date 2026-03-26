<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes';

    protected $fillable = ['tipo_documento', 'numero_documento', 'nombres', 'apellidos', 'fecha_nacimiento', 'direccion', 'ciudad_id', 'email', 'telefono_movil'];

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }

    public function turnos()
    {
        return $this->hasMany(Turno::class);
    }
}