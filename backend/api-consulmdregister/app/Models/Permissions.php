<?php

namespace App\Models;

use App\Models\Role;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Permissions extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}