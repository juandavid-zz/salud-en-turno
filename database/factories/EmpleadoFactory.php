<?php

namespace Database\Factories;

use App\Models\Sede;
use App\Models\Rol;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpleadoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'legajo' => strtoupper($this->faker->unique()->bothify('EMP-####')),
            'nombres' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'telefono_movil' => $this->faker->phoneNumber(),
            'fecha_alta' => $this->faker->date(),
            'sede_id' => Sede::inRandomOrder()->first()->id,
            'rol_id' => Rol::inRandomOrder()->first()->id,
        ];
    }
}