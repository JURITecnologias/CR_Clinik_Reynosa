<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //si ya existe la tabla de movimientos_consumos que la elimine para evitar errores al correr la migración
        if (Schema::hasTable('movimientos_consumos')) {
            Schema::dropIfExists('movimientos_consumos');
        }
        Schema::create('movimientos_consumos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('consumible_id');
            $table->enum('tipo_movimiento', ['entrada', 'salida', 'ajuste']);
            $table->integer('cantidad');
            $table->integer('cantidad_anterior');
            $table->integer('cantidad_nueva');
            $table->decimal('precio_unitario', 8, 2)->nullable();
            $table->decimal('costo_unitario', 8, 2)->nullable();
            $table->string('motivo')->nullable();
            $table->string('referencia_tipo')->nullable();
            $table->unsignedBigInteger('referencia_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('consumible_id')->references('id')->on('consumibles');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimientos_consumos');
    }
};
