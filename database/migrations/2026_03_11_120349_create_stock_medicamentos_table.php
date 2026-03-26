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
    Schema::create('stock_medicamentos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('sede_id')->constrained('sedes')->onDelete('cascade');
        $table->foreignId('medicamento_id')->constrained('medicamentos')->onDelete('cascade');
        $table->integer('stock');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_medicamentos');
    }
};
