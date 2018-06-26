<?php

namespace App\Http\Requests;

class DocRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'area_id' => 'required|integer',
            'area_nombre' => 'required|max:255',
            'codigo' => 'required|max:8',
            'descripcion' => 'required|max:255',
            'categoria_id' => 'required|integer|exists:categorias_documentos,id',
            'archivo' => 'required_if:type,doc|file',
            'url' => 'required_if:type,url|url'
        ];
    }

    public function messages()
    {
        return [
            'area.required' => 'El área es obligatoria',

            'area_nombre.max' => 'El nombre del área no puede exceder los 255 caracteres',
            'area_nombre.required' => 'El área es obligatoria',

            'codigo.required' => 'El código es obligatorio',
            'codigo.max' => 'El código no puede exceder los 8 caracteres',

            'descripcion.required' => 'La descripción es obligatoria',
            'descripcion.max' => 'La descripción no puede exceder los 255 caracteres',

            'categoria_id.required' => 'La categoría es obligatoria',

            'archivo.required_if' => 'El archivo es obligatorio',

            'url.required' => 'La URL es obligatoria',
            'url.url' => 'La URL debe ser una URL válida (Ej: http:\&#92;www.url.com)'
        ];
    }
}
