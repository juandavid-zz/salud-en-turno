<?php

namespace Database\Factories;

use App\Models\Ciudad;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'tipo_documento' => $this->faker->randomElement(['CC', 'TI', 'CE', 'Pasaporte']),
            'numero_documento' => $this->faker->unique()->numerify('##########'),
            'nombres' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
            'fecha_nacimiento' => $this->faker->date(),
            'direccion' => $this->faker->address(),
            'ciudad_id' => Ciudad::inRandomOrder()->first()->id,
            'email' => $this->faker->unique()->safeEmail(),
            'telefono_movil' => $this->faker->phoneNumber(),
        ];
    }
}