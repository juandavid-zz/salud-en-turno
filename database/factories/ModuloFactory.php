<?php

namespace Database\Factories;

use App\Models\Sede;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModuloFactory extends Factory
{
    public function definition(): array
    {
        return [
            'codigo' => strtoupper($this->faker->unique()->bothify('MOD-###')),
            'nombre' => $this->faker->randomElement(['Consulta General', 'Urgencias', 'Pediatría', 'Cardiología', 'Ventanilla']),
            'ubicacion' => 'Piso ' . $this->faker->numberBetween(1, 5),
            'estado' => $this->faker->randomElement(['disponible', 'no disponible']),
            'sede_id' => Sede::inRandomOrder()->first()->id,
        ];
    }
}