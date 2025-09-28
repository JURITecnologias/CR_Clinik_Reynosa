<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notificacion extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'notificaciones';

    protected $fillable = [
        'descripcion',
        'tipo',
        'rol_usuario',
        'leida',
        'origen',
        'usuario_id',
        'paciente_id',
        'doctor_id',
        'consulta_id',
        'citas_pacientes_id',
    ];

    // Relaciones
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function doctor()
    {
        return $this->belongsTo(InformacionDoctor::class, 'doctor_id');
    }

    public function consulta()
    {
        return $this->belongsTo(Consulta::class, 'consulta_id');
    }

    public function citaPaciente()
    {
        return $this->belongsTo(CitaPaciente::class, 'citas_pacientes_id');
    }
}
