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
    Schema::create('historial_estados_turno', function (Blueprint $table) {
        $table->id();
        $table->foreignId('turno_id')->constrained('turnos')->onDelete('cascade');
        $table->enum('estado', ['Reservado', 'En espera', 'En atención', 'Finalizado', 'Cancelado']);
        $table->dateTime('fecha_hora');
        $table->foreignId('empleado_id')->constrained('empleados')->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_estados_turno');
    }
};
