<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StoreEmpleadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => ['required', 'max:45', 'string'],
            'apellido' => ['required', 'max:45', 'string'],
            'dni' => ['required', 'max:15', 'string', Rule::unique('empleados', 'dni')],
            'telefono' => ['required', 'max:15', 'string', Rule::unique('empleados', 'telefono')],
            'direccion' => ['required', 'max:90', 'string'],
            'imagen' => ['required', 'max:255', 'string'],
            'estado' => ['required', 'string'],
            'email' => ['required', 'max:90', 'string', Rule::unique('empleados', 'email')],
            'password' => ['required', 'string', Password::defaults()],
            'rol_id' => ['required', 'integer', Rule::exists('roles', 'id')],
        ];
    }
}
