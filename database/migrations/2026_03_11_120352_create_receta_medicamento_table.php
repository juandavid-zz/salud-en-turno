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
    Schema::create('receta_medicamento', function (Blueprint $table) {
        $table->id();
        $table->foreignId('receta_id')->constrained('recetas')->onDelete('cascade');
        $table->foreignId('medicamento_id')->constrained('medicamentos')->onDelete('cascade');
        $table->integer('cantidad');
        $table->text('indicaciones');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receta_medicamento');
    }
};
