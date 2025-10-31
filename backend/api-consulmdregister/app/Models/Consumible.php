<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consumible extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'consumibles';

    protected $fillable = [
        'codigo_interno',
        'nombre',
        'descripcion',
        'unidad_medida',
        'stock_actual',
        'stock_minimo',
        'precio_unitario_promedio',
        'costo_unitario_promedio',
        'es_activo',
        'uuid',
        'categoria_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(CategoriaConsumible::class, 'categoria_id');
    }

    public function kits()
    {
        return $this->belongsToMany(KitPredefinido::class, 'kits_consumibles', 'consumible_id', 'kit_id')->withPivot('cantidad');
    }
}
