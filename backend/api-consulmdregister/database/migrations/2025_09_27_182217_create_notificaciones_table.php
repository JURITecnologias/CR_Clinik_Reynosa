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
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->enum('tipo', ['critica', 'informativa', 'normal'])->default('informativa');
            $table->string('rol_usuario');
            $table->boolean('leida')->default(false);
            $table->string('origen')->nullable();
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->unsignedBigInteger('paciente_id')->nullable();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->unsignedBigInteger('consulta_id')->nullable();
            $table->unsignedBigInteger('citas_pacientes_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Adding foreign key constraints
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('set null');
            $table->foreign('doctor_id')->references('id')->on('informacion_doctor')->onDelete('set null');
            $table->foreign('consulta_id')->references('id')->on('consultas')->onDelete('set null');
            $table->foreign('citas_pacientes_id')->references('id')->on('citas_pacientes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificaciones');
    }
};
