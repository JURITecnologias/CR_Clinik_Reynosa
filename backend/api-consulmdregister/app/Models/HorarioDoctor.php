<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioDoctor extends Model
{
    protected $table = 'horarios_doctores';

    protected $fillable = [
        'doctor_id',
        'dia_semana',
        'hora_inicio',
        'hora_fin',
        'activo',
    ];

    public function doctor()
    {
        return $this->belongsTo(InformacionDoctor::class);
    }

}
