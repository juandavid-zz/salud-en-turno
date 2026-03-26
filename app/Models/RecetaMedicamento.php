<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecetaMedicamento extends Model
{
    use HasFactory;

    protected $table = 'receta_medicamento';
    protected $fillable = ['receta_id', 'medicamento_id', 'cantidad', 'indicaciones'];
}