<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consulta extends Model
{
    use SoftDeletes;

    protected $table = 'consultas';

    protected $fillable = [
        'paciente_id',
        'doctor_id',
        'fecha_consulta',
        'motivo_consulta',
        'sintomas',
        'diagnostico',
        'indicaciones',
        'medicamentos',
        'servicios_medicos',
        'estatus',
        'fuera_de_horario',
    ];

    protected $casts = [
        'medicamentos' => 'array',
        'servicios_medicos' => 'array',
        'fecha_consulta' => 'date',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function doctor()
    {
        return $this->belongsTo(InformacionDoctor::class);
    }

    public function signosVitales()
    {
        return $this->hasOne(SignosVitales::class);
    }
}
