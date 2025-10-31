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
        Schema::create('movimientos_consumos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consumible_id')->constrained('consumibles')->onDelete('cascade');
            $table->enum('tipo_movimiento', ['entrada', 'salida', 'ajuste', 'devolucion', 'consumo'])->default('consumo');
            $table->integer('cantidad')->default(0);
            $table->integer('cantidad_anterior')->default(0);
            $table->integer('cantidad_nueva')->default(0);
            $table->integer('referencia_id')->nullable();
            $table->string('referencia_tipo')->nullable();
            $table->float('costo_unitario')->default(0);
            $table->float('precio_unitario')->default(0);
            $table->string('motivo')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos_consumos');
    }
};
