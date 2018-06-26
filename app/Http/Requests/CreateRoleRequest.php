<?php

namespace App\Http\Requests;

class CreateRoleRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return
            [
                'name' => 'required|max:255|unique:roles,name,'.$this->id,
                'description' => 'required|max:255',
                'level' => 'numeric|min:1|max:10'
            ];
    }

    public function messages()
    {
        return
            [
                'name.required' => 'El nombre del rol es obligatorio',
                'name.max' => 'El nombre del rol no puede exceder los 255 caracteres',
                'name.unique' => 'Ya existe un rol con ese nombre',

                'description.required' => 'La descripción es obligatoria',
                'description.max' => 'La descripción no puede exceder los 255 caracteres',

                'level.numeric' => 'El nivel de usuario debe ser un número',
                'level.min' => 'El nivel de usuario debe estar comprendido entre 1 y 10',
                'level.max' => 'El nivel de usuario debe estar comprendido entre 1 y 10'

            ];
    }
}
