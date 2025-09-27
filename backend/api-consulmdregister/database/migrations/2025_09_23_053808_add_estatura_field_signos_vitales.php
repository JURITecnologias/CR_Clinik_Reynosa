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
        Schema::table('signos_vitales', function (Blueprint $table) {
            $table->decimal('estatura', 5, 2)->default(0)->after('talla')->comment('Estatura en cm');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('signos_vitales', function (Blueprint $table) {
            $table->dropColumn('estatura');
        });
    }
};
