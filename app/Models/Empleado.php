<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

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
