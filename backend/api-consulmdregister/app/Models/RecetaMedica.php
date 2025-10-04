<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecetaMedica extends Model
{
    use SoftDeletes;

    protected $table = 'receta_medica';

    protected $fillable = [
        'paciente_id',
        'consulta_id',
        'doctor_id',
        'medicamentos',
        'fecha_emision',
        'fecha_consulta',
        'folio_receta',
        'nombre_doctor',
        'titulo_doctor',
        'numero_cedula',
        'telefono_doctor',
        'nombre_completo_paciente',
        'fecha_nacimiento_paciente',
        'edad_paciente',
        'signos_vitales',
        'diagnostico',
        'servicios_medicos',
        'uuid',
        'created_by',
        'updated_by',
        'deleted_by',
        'ip_address',
        'certificate',
        'pc_name',
    ];

    protected $casts = [
        'medicamentos' => 'array',
        'signos_vitales' => 'array',
        'servicios_medicos' => 'array',
        'fecha_emision' => 'datetime',
        'fecha_consulta' => 'datetime',
    ];

    // Relaciones
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function consulta()
    {
        return $this->belongsTo(Consulta::class, 'consulta_id');
    }

    public function doctor()
    {
        return $this->belongsTo(InformacionDoctor::class, 'doctor_id');
    }
}