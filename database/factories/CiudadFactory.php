<?php

namespace Database\Factories;

use App\Models\Pais;
use Illuminate\Database\Eloquent\Factories\Factory;

class CiudadFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->city(),
            'codigo_postal' => $this->faker->postcode(),
            'pais_id' => Pais::inRandomOrder()->first()->id,
        ];
    }
}