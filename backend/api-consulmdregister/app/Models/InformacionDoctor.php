<?php

// app/Models/InformacionDoctor.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class InformacionDoctor extends Model
{
    use SoftDeletes;

    protected $table = 'informacion_doctor';

    protected $fillable = [
        'user_id',
        'nombre_completo',
        'titulo',
        'universidad',
        'cedula_profesional',
        'especialista_en',
        'fecha_nacimiento',
        'experiencia',
        'telefono_personal',
        'telefono',
        'telefono_emergencias',
        'direccion',
        'uuid',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = Str::uuid();
            }
        });
    }

    protected $dates = ['fecha_nacimiento', 'deleted_at'];

}