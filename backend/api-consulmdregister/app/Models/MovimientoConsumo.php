<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MovimientoConsumo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'movimientos_consumos';

    protected $fillable = [
        'consumible_id',
        'tipo_movimiento',
        'cantidad',
        'cantidad_anterior',
        'cantidad_nueva',
        'referencia_id',
        'referencia_tipo',
        'costo_unitario',
        'precio_unitario',
        'motivo',
        'user_id',
    ];

    public function consumible()
    {
        return $this->belongsTo(Consumible::class, 'consumible_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
