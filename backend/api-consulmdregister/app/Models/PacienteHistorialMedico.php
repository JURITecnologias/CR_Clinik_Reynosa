<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Importa el trait

class PacienteHistorialMedico extends Model
{
    use HasFactory, SoftDeletes; // Usa el trait

    protected $table = 'pacientes_historial_medico';

    protected $fillable = [
        'nombre_completo',
        'fecha_nacimiento',
        'sexo',
        'estado_civil',
        'ocupacion',
        'direccion',
        'telefono',
        'contacto_emergencia',
        'enfermedades_cronicas',
        'hospitalizaciones_previas',
        'medicamentos_actuales',
        'alergias',
        'transfusiones',
        'vacunas_recientes',
        'antecedentes_familiares',
        'fuma',
        'frecuencia_tabaco',
        'alcohol',
        'frecuencia_alcohol',
        'sustancias_psicoactivas',
        'alimentacion',
        'actividad_fisica',
        'nivel_estres',
        'motivo_consulta',
        'sintomas',
        'inicio_sintomas',
        'mejora_empeora_sintomas',
        'salud_mental',
        'apoyo_psicologico',
        'notas',
        'paciente_id',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }
}
?>