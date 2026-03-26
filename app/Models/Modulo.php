<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;

    protected $table = 'modulos';

    protected $fillable = ['codigo', 'nombre', 'ubicacion', 'estado', 'sede_id'];

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }

    public function turnos()
    {
        return $this->hasMany(Turno::class);
    }
}