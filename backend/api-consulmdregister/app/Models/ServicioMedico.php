<?php

// app/Models/ServicioMedico.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicioMedico extends Model
{
    use SoftDeletes;

    protected $table = 'servicios_medicos';
    protected $fillable = ['nombre','categoria'];

}