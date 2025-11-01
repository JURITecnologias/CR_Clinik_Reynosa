<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdenClinica extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ordenes_clinicas';

    protected $fillable = [
        'uuid',
        'paciente_id',
        'consulta_id',
        'folio_orden',
        'estado',
        'servicios_solicitados',
        'doctor_id',
        'fecha_orden',
        'observaciones',
        'user_id',
        'atencion_usuario_id',
    ];

    protected $casts = [
        'servicios_solicitados' => 'array',
        'fecha_orden' => 'date',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function consulta()
    {
        return $this->belongsTo(Consulta::class);
    }

    public function doctor()
    {
        return $this->belongsTo(InformacionDoctor::class, 'doctor_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function consumos()
    {
        return $this->hasMany(OrdenClinicaConsumo::class, 'orden_clinica_id');
    }
}
