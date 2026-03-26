<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $table = 'recetas';

    protected $fillable = ['turno_id'];

    public function turno()
    {
        return $this->belongsTo(Turno::class);
    }

    public function medicamentos()
    {
        return $this->belongsToMany(Medicamento::class, 'receta_medicamento')->withPivot('cantidad', 'indicaciones');
    }
}