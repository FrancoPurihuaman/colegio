<?php

namespace App\Http\Requests\setting;

use Illuminate\Foundation\Http\FormRequest;

class ColegioRequest extends FormRequest
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
            'codigo_modular'    => 'required|max:20',
            'nombre'            => 'required|max:80',
            'director'          => 'required|max:80',
            'logo'              => 'nullable|image|mimes:jpg,jpeg,png'
        ];
    }
}
