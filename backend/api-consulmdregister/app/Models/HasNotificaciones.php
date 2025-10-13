<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasNotificaciones
{
    public function notificaciones(): BelongsToMany
    {
        return $this->belongsToMany(Notificacion::class, 'notificacion_usuario', 'usuario_id', 'notificacion_id')
            ->withPivot('leida', 'leida_en')
            ->withTimestamps();
    }
}
