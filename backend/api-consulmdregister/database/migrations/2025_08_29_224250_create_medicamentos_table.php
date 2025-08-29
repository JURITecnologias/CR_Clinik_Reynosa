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
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('nombre_generico')->nullable();
            $table->string('presentacion')->nullable();
            $table->string('via_administracion')->nullable();
            $table->string('concentracion')->nullable();
            $table->string('unidad')->nullable();
            $table->boolean('controlado')->default(false);
            $table->text('descripcion')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamentos');
    }
};
