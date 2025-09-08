<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use HasFactory,SoftDeletes;
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

    public function historialMedico()
    {
        return $this->hasMany(PacienteHistorialMedico::class, 'paciente_id');
    }
}
