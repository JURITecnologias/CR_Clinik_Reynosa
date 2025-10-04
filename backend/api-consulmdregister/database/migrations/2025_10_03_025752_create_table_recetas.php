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
        Schema::create('receta_medica', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('consulta_id');
            $table->unsignedBigInteger('doctor_id');
            $table->text('medicamentos')->nullable(); // Campo para almacenar los medicamentos en formato json
            $table->dateTime('fecha_emision');
            $table->dateTime('fecha_consulta');
            $table->string('folio_receta')->required();
            $table->string('nombre_doctor')->required();
            $table->string('titulo_doctor')->required();
            $table->string('numero_cedula')->required();
            $table->string('telefono_doctor')->required();
            $table->string('nombre_completo_paciente')->required();
            $table->string('fecha_nacimiento_paciente')->required();
            $table->string('edad_paciente')->required();
            $table->text('signos_vitales')->nullable(); // Campo para almacenar los signos vitales en formato json
            $table->string('diagnostico')->required();
            $table->text('servicios_medicos')->nullable(); // Campo para almacenar los servicios médicos en formato json
            $table->uuid('uuid')->unique();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->text('ip_address')->nullable();
            $table->text('certificate')->nullable();
            $table->string('pc_name')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('consulta_id')->references('id')->on('consultas')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('informacion_doctor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receta_medica');
    }
};
