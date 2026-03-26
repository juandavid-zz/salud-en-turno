<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pais;
use App\Models\Ciudad;
use App\Models\Sede;
use App\Models\Rol;
use App\Models\Empleado;
use App\Models\Paciente;
use App\Models\Modulo;
use App\Models\Turno;
use App\Models\Medicamento;
use App\Models\StockMedicamento;
use App\Models\Receta;
use App\Models\RecetaMedicamento;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Paises
        Pais::factory(5)->create();

        // 2. Ciudades
        Ciudad::factory(10)->create();

        // 3. Roles
        Rol::factory()->create(['nombre' => 'Administrador']);
        Rol::factory()->create(['nombre' => 'Asesor']);
        Rol::factory()->create(['nombre' => 'Profesional de Salud']);

        // 4. Sedes (12 como dice el enunciado)
        Sede::factory(12)->create();

        // 5. Empleados
        Empleado::factory(30)->create();

        // 6. Pacientes
        Paciente::factory(50)->create();

        // 7. Modulos
        Modulo::factory(20)->create();

        // 8. Turnos
        Turno::factory(50)->create();

        // 9. Medicamentos
        Medicamento::factory(20)->create();

        // 10. Stock
        StockMedicamento::factory(30)->create();

        // 11. Recetas
        Receta::factory(20)->create();

        // 12. Receta Medicamento
        Receta::all()->each(function ($receta) {
            $medicamentos = Medicamento::inRandomOrder()->take(rand(1, 3))->get();
            foreach ($medicamentos as $medicamento) {
                RecetaMedicamento::create([
                    'receta_id' => $receta->id,
                    'medicamento_id' => $medicamento->id,
                    'cantidad' => rand(1, 5),
                    'indicaciones' => 'Tomar cada 8 horas con agua',
                ]);
            }
        });
    }
}