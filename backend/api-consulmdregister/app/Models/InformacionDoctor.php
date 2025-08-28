<?php

// app/Models/InformacionDoctor.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformacionDoctor extends Model
{
    protected $table = 'informacion_doctor';

    protected $fillable = [
        'user_id',
        'nombre_completo',
        'titulo',
        'universidad',
        'cedula_profesional',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}