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

        Schema::create('pacientes_historial_medico', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo');
            $table->date('fecha_nacimiento');
            $table->enum('sexo', ['M', 'F', 'O'])->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('ocupacion')->nullable();
            $table->text('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('contacto_emergencia')->nullable();

            $table->text('enfermedades_cronicas')->nullable();
            $table->text('hospitalizaciones_previas')->nullable();
            $table->text('medicamentos_actuales')->nullable();
            $table->text('alergias')->nullable();
            $table->boolean('transfusiones')->default(false);
            $table->text('vacunas_recientes')->nullable();

            $table->text('antecedentes_familiares')->nullable();

            $table->boolean('fuma')->default(false);
            $table->string('frecuencia_tabaco')->nullable();
            $table->boolean('alcohol')->default(false);
            $table->string('frecuencia_alcohol')->nullable();
            $table->text('sustancias_psicoactivas')->nullable();
            $table->text('alimentacion')->nullable();
            $table->string('actividad_fisica')->nullable();
            $table->string('nivel_estres')->nullable();

            $table->text('motivo_consulta')->nullable();
            $table->text('sintomas')->nullable();
            $table->date('inicio_sintomas')->nullable();
            $table->text('mejora_empeora_sintomas')->nullable();

            $table->text('salud_mental')->nullable();
            $table->boolean('apoyo_psicologico')->default(false);
            $table->text('notas')->nullable();

            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('paciente_id')->constrained('pacientes')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes_historial_medico');
    }
};
