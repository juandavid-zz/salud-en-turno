<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('turnos', function (Blueprint $table) {
        $table->id();
        $table->string('codigo')->unique();
        $table->dateTime('fecha_hora_programada');
        $table->dateTime('fecha_hora_llegada')->nullable();
        $table->string('motivo');
        $table->enum('estado', ['Reservado', 'En espera', 'En atención', 'Finalizado', 'Cancelado'])->default('Reservado');
        $table->foreignId('paciente_id')->constrained('pacientes')->onDelete('cascade');
        $table->foreignId('sede_id')->constrained('sedes')->onDelete('cascade');
        $table->foreignId('modulo_id')->constrained('modulos')->onDelete('cascade');
        $table->foreignId('profesional_id')->constrained('empleados')->onDelete('cascade');
        $table->foreignId('empleado_registro_id')->constrained('empleados')->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turnos');
    }
};
