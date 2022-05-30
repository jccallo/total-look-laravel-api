<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Empleado extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $table = 'empleados';

    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'telefono',
        'direccion',
        'imagen',
        'estado',
        'email',
        'password',
        'rol_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function rol() {
        return $this->belongsTo(Rol::class, 'rol_id', 'id');
    }
}
