<?php

namespace Database\Factories;

use App\Models\Paciente;
use App\Models\Sede;
use App\Models\Modulo;
use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\Factory;

class TurnoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'codigo' => strtoupper($this->faker->unique()->bothify('TUR-#####')),
            'fecha_hora_programada' => $this->faker->dateTimeBetween('now', '+1 month'),
            'fecha_hora_llegada' => $this->faker->optional()->dateTime(),
            'motivo' => $this->faker->sentence(),
            'estado' => $this->faker->randomElement(['Reservado', 'En espera', 'En atención', 'Finalizado', 'Cancelado']),
            'paciente_id' => Paciente::inRandomOrder()->first()->id,
            'sede_id' => Sede::inRandomOrder()->first()->id,
            'modulo_id' => Modulo::inRandomOrder()->first()->id,
            'profesional_id' => Empleado::inRandomOrder()->first()->id,
            'empleado_registro_id' => Empleado::inRandomOrder()->first()->id,
        ];
    }
}