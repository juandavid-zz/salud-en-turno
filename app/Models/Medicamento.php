<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;

    protected $table = 'medicamentos';

    protected $fillable = ['codigo', 'nombre', 'presentacion', 'concentracion'];

    public function stocks()
    {
        return $this->hasMany(StockMedicamento::class);
    }

    public function recetas()
    {
        return $this->belongsToMany(Receta::class, 'receta_medicamento')->withPivot('cantidad', 'indicaciones');
    }
}