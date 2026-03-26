<?php

namespace Database\Factories;

use App\Models\Turno;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecetaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'turno_id' => Turno::inRandomOrder()->first()->id,
        ];
    }
}