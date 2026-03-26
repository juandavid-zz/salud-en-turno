<?php

namespace Database\Factories;

use App\Models\Sede;
use App\Models\Medicamento;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockMedicamentoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'sede_id' => Sede::inRandomOrder()->first()->id,
            'medicamento_id' => Medicamento::inRandomOrder()->first()->id,
            'stock' => $this->faker->numberBetween(0, 500),
        ];
    }
}