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
        Schema::create('signos_vitales', function (Blueprint $table) {
            $table->id();

            // Relación con la consulta
            $table->foreignId('consulta_id')->constrained('consultas')->onDelete('cascade');

            // Campos clínicos
            $table->decimal('temperatura', 4, 1)->nullable(); // °C
            $table->integer('frecuencia_cardiaca')->nullable(); // latidos por minuto
            $table->integer('frecuencia_respiratoria')->nullable(); // respiraciones por minuto
            $table->string('presion_arterial')->nullable(); // formato "120/80"
            $table->integer('saturacion_oxigeno')->nullable(); // porcentaje %
            $table->decimal('peso', 5, 2)->nullable(); // kg
            $table->decimal('talla', 4, 2)->nullable(); // metros

            $table->timestamps();
            $table->softDeletes(); // borrado lógico
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signos_vitales');
    }
};
