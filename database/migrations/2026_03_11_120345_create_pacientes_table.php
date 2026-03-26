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
    Schema::create('pacientes', function (Blueprint $table) {
        $table->id();
        $table->string('tipo_documento');
        $table->string('numero_documento')->unique();
        $table->string('nombres');
        $table->string('apellidos');
        $table->date('fecha_nacimiento');
        $table->string('direccion');
        $table->foreignId('ciudad_id')->constrained('ciudades')->onDelete('cascade');
        $table->string('email')->unique();
        $table->string('telefono_movil');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
