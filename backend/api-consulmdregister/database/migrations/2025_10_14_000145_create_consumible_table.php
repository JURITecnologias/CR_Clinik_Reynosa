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
        Schema::create('consumibles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('codigo_interno')->unique();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->string('unidad_medida');
            $table->integer('stock_actual')->default(0);
            $table->integer('stock_minimo')->default(0);
            $table->decimal('precio_unitario_promedio', 8, 2);
            $table->decimal('costo_unitario_promedio', 8, 2);
            $table->boolean('es_activo')->default(true);
            $table->uuid('uuid')->unique();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consumibles');
    }
};
