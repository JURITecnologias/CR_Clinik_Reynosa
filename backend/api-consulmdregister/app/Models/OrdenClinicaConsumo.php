<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdenClinicaConsumo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ordenes_clinicas_consumos';

    protected $fillable = [
        'orden_clinica_id',
        'consumible_id',
        'kit_id',
        'cantidad',
        'user_id',
        'nota',
    ];

    public function ordenClinica()
    {
        return $this->belongsTo(OrdenClinica::class, 'orden_clinica_id');
    }

    public function consumible()
    {
        return $this->belongsTo(Consumible::class, 'consumible_id');
    }

    public function kit()
    {
        return $this->belongsTo(KitConsumible::class, 'kit_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
