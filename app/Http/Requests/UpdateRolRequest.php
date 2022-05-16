<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRolRequest extends FormRequest
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
            // alternativa con route(): ignore($this->route('rol')->id, 'id')
            'nombre' => ['required', 'max:45', 'string', Rule::unique('roles', 'nombre')->ignore($this->rol->id, 'id')],
            'descripcion' => ['required', 'max:90', 'string'],
            'estado' => ['required', 'string'],
        ];
    }
}
