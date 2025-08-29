<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicamento extends Model
{
    use SoftDeletes;

    protected $table = 'medicamentos';

    protected $fillable = [
        'nombre',
        'nombre_generico',
        'presentacion',
        'via_administracion',
        'concentracion',
        'unidad',
        'controlado',
        'descripcion',
    ];

    protected $casts = [
        'controlado' => 'boolean',
    ];
}