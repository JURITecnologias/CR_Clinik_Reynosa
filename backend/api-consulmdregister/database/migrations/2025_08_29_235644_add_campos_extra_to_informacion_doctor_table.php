<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('informacion_doctor', function (Blueprint $table) {
            $table->uuid('uuid')->unique()->after('id')->default(Str::uuid());
            $table->string('especialista_en')->nullable()->after('cedula_profesional');
            $table->date('fecha_nacimiento')->nullable()->after('especialista_en');
            $table->integer('experiencia')->nullable()->after('fecha_nacimiento'); // años
            $table->string('telefono_personal')->nullable()->after('experiencia');
            $table->string('telefono')->nullable()->after('telefono_personal');
            $table->string('telefono_emergencias')->nullable()->after('telefono');
            $table->string('direccion')->nullable()->after('telefono_emergencias');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('informacion_doctor', function (Blueprint $table) {
            $table->dropColumn([
                'uuid',
                'especialista_en',
                'fecha_nacimiento',
                'experiencia',
                'telefono_personal',
                'telefono',
                'telefono_emergencias',
                'direccion',
            ]);
        });

    }
};
