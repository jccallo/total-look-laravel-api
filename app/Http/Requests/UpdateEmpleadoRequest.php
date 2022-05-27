<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateEmpleadoRequest extends FormRequest
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
            'dni' => ['required', 'max:15', 'string', Rule::unique('empleados', 'dni')->ignore($this->empleado->id, 'id')],
            'telefono' => ['required', 'max:15', 'string', Rule::unique('empleados', 'telefono')->ignore($this->empleado->id, 'id')],
            'direccion' => ['required', 'max:90', 'string'],
            // 'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024',
            'imagen' => ['required', 'max:255', 'string'],
            'estado' => ['required', 'string'],
            'email' => ['required', 'max:90', 'string', Rule::unique('empleados', 'email')->ignore($this->empleado->id, 'id')],
            'password' => ['required', 'string', Password::defaults()],
            'rol_id' => ['required', 'integer', Rule::exists('roles', 'id')], // aunque ponga 'integer' acepta cadena numerica
        ];
    }
}
