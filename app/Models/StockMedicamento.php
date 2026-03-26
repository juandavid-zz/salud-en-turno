<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMedicamento extends Model
{
    use HasFactory;

    protected $table = 'stock_medicamentos';
    protected $fillable = ['sede_id', 'medicamento_id', 'stock'];

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }

    public function medicamento()
    {
        return $this->belongsTo(Medicamento::class);
    }
}