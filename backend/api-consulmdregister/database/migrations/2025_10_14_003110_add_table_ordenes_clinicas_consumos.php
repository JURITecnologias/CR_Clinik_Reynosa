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
        Schema::create('ordenes_clinicas_consumos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orden_clinica_id')->constrained('ordenes_clinicas')->onDelete('cascade');
            $table->foreignId('consumible_id')->nullable()->constrained('consumibles')->onDelete('cascade');
            $table->foreignId('kit_id')->nullable()->constrained('kits_consumibles')->onDelete('cascade');
            $table->integer('cantidad')->default(0);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nota')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenes_clinicas_consumos');
    }
};
