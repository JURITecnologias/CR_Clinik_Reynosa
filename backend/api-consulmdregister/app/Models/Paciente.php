<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido',
        'sexo',
        'fecha_nacimiento',
        'telefono',
        'email',
        'direccion',
        'curp',
        'numero_seguro',
    ];
}
