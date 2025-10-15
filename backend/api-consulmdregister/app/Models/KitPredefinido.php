<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KitPredefinido extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kits_predefinidos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'es_activo',
        'uuid',
    ];

    public function consumibles()
    {
        return $this->belongsToMany(Consumible::class, 'kits_consumibles', 'kit_id', 'consumible_id')->withPivot('cantidad');
    }
}
