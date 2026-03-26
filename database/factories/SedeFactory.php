<?php

namespace Database\Factories;

use App\Models\Ciudad;
use Illuminate\Database\Eloquent\Factories\Factory;

class SedeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'codigo' => strtoupper($this->faker->unique()->bothify('SEDE-###')),
            'nombre' => 'Sede ' . $this->faker->city(),
            'ciudad_id' => Ciudad::inRandomOrder()->first()->id,
        ];
    }
}