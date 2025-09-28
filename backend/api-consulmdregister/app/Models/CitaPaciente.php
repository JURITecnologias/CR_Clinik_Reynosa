<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Paciente;
use App\Models\InformacionDoctor as Doctor;
use App\Models\Consulta;

class CitaPaciente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'citas_pacientes';

    protected $fillable = [
        'paciente_id',
        'doctor_id',
        'consulta_id',
        'fecha_cita',
        'hora_cita',
        'atendio_cita',
        'notas',
    ];

    // Relaciones
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function consulta()
    {
        return $this->belongsTo(Consulta::class, 'consulta_id');
    }
}