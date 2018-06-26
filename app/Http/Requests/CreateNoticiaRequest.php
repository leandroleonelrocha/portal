<?php

namespace App\Http\Requests;

class CreateNoticiaRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return
        [
            'categoria_id' => 'required',
            'titulo' => 'required|max:255',
            'epigrafe' => 'max:255',
            'foto_portada' => 'min:1|max:2097152',
            'cuerpo' => 'required|max:65000',
            'tags' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return
        [
            'categoria_id.required' => 'La categoría de la noticia es obligatoria',

            'titulo.required' => 'El campo "título" es obligatorio',
            'titulo.max' => 'El título no puede exceder los 255 caracteres',

            'epigrafe.max' => 'El epígrafe no puede exceder los 255 caracteres',

            'foto_portada.min' => 'La foto seleccionada ha sido rechazada',
            'foto_portada.max' => 'La foto excede los 2Mb permitidos',

            'cuerpo.required' => 'El cuerpo de la noticia es obligatorio',
            'cuerpo.max' => 'El cuerpo de la noticia excede los 65.000 caracteres permitidos',

            'tags.max' => 'Los tags no pueden exceder los 255 caracteres',
            'tags.required' => 'Debe colocar al menos una etiqueta a su noticia'

        ];
    }
}
