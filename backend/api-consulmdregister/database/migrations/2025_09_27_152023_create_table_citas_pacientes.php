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
        Schema::create('citas_pacientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('doctor_id')->nullable(); // Make doctor_id nullable
            $table->unsignedBigInteger('consulta_id')->nullable(); // Add consulta_id as nullable
            $table->date('fecha_cita');
            $table->time('hora_cita');
            $table->boolean('atendio_cita')->default(false);
            $table->text('notas')->nullable();

            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('informacion_doctor')->onDelete('cascade');
            $table->foreign('consulta_id')->references('id')->on('consultas')->onDelete('set null'); // Add foreign key for consulta_id
            $table->timestamps();
            $table->softDeletes(); // Add soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas_pacientes');
    }
};
