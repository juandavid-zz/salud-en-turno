<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $table = 'ciudades'; 

    protected $fillable = ['nombre', 'codigo_postal', 'pais_id'];

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    public function sedes()
    {
        return $this->hasMany(Sede::class);
    }

    public function pacientes()
    {
        return $this->hasMany(Paciente::class);
    }
}