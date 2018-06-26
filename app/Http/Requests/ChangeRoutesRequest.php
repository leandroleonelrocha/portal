<?php

namespace App\Http\Requests;

class ChangeRoutesRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return
            [
                'rutas[]' => 'url'
            ];
    }

    public function messages()
    {
        return
            [
                'rutas[].url' => 'La ruta no es correcta'
            ];
    }
}
