<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Role extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions() {
     return $this->belongsToMany(Permissions::class);
    }


}