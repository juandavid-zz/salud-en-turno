<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;

    protected $table = 'sedes'; // 👈 agrega esta línea

    protected $fillable = ['codigo', 'nombre', 'ciudad_id'];

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }

    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }

    public function modulos()
    {
        return $this->hasMany(Modulo::class);
    }

    public function turnos()
    {
        return $this->hasMany(Turno::class);
    }

    public function stocks()
    {
        return $this->hasMany(StockMedicamento::class);
    }
}