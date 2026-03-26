<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MedicamentoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'codigo' => strtoupper($this->faker->unique()->bothify('MED-###')),
            'nombre' => $this->faker->randomElement(['Ibuprofeno', 'Paracetamol', 'Amoxicilina', 'Omeprazol', 'Loratadina']),
            'presentacion' => $this->faker->randomElement(['Tableta', 'Jarabe', 'Cápsula', 'Inyectable']),
            'concentracion' => $this->faker->randomElement(['500mg', '250mg', '100mg', '50mg']),
        ];
    }
}