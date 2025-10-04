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
        Schema::create('configuracion_sistema', function (Blueprint $table) {
            $table->id();
            $table->string('variable')->required();
            $table->string('valor')->required();
            $table->string('descripcion')->nullable();
            $table->enum('tipo', ['string', 'integer', 'boolean'])->default('string');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuracion_sistema');
    }
};
