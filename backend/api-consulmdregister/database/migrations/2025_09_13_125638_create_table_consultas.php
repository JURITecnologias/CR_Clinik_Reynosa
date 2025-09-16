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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();

            // Relaciones
            $table->foreignId('paciente_id')->constrained('pacientes')->onDelete('cascade');
            $table->foreignId('doctor_id')->constrained('informacion_doctor')->onDelete('cascade');

            // Información clínica
            $table->date('fecha_consulta');
            $table->text('motivo_consulta')->nullable();
            $table->text('sintomas')->nullable();
            $table->text('diagnostico')->nullable();
            $table->text('indicaciones')->nullable();

            // Receta y servicios
            $table->json('medicamentos')->nullable();
            $table->json('servicios_medicos')->nullable();

            $table->timestamps();
            $table->softDeletes(); // ← habilita el borrado lógico
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_consultas');
    }
};
