<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConfiguracionSistema extends Model
{
    use SoftDeletes;

    protected $table = 'configuracion_sistema';

    protected $fillable = [
        'variable',
        'valor',
        'descripcion',
        'tipo',
    ];
}
