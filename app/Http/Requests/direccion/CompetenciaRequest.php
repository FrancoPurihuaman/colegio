<?php

namespace App\Http\Requests\direccion;

use Illuminate\Foundation\Http\FormRequest;

class CompetenciaRequest extends FormRequest
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
            'nombre'            => 'required|max:255',
            'descripcion'       => 'present|max:2000',
            'area'              => 'required|numeric|exists:AREA,ARE_CODIGO'
        ];
    }
}
