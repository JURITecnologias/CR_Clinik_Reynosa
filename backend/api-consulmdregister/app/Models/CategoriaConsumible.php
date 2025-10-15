<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaConsumible extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categoria_consumibles';

    protected $fillable = [
        'nombre',
        'descripcion',
        'es_activo',
        'uuid',
    ];

    public function consumibles()
    {
        return $this->hasMany(Consumible::class, 'categoria_id');
    }
}
