<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KitConsumible extends Model
{
    use HasFactory;

    protected $table = 'kits_consumibles';

    protected $fillable = [
        'kit_id',
        'consumible_id',
        'cantidad',
    ];

    public function kit()
    {
        return $this->belongsTo(KitPredefinido::class, 'kit_id');
    }

    public function consumible()
    {
        return $this->belongsTo(Consumible::class, 'consumible_id');
    }
}
