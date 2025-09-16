<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SignosVitales extends Model
{
    use SoftDeletes;

    protected $table = 'signos_vitales';

    protected $fillable = [
        'consulta_id',
        'temperatura',
        'frecuencia_cardiaca',
        'frecuencia_respiratoria',
        'presion_arterial',
        'saturacion_oxigeno',
        'peso',
        'talla',
    ];

    public function consulta()
    {
        return $this->belongsTo(Consulta::class);
    }


}
