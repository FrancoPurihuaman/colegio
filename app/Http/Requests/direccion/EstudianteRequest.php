<?php

namespace App\Http\Requests\direccion;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteRequest extends FormRequest
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
        $codigoEstRules = "";
        
        if ($this->method() === "PUT") {
            $codigoEstRules = 'bail|required|max:20|unique:ESTUDIANTE,STD_COD_ESTUDIANTE,'.$this->route('id').',STD_CODIGO';
        }else{
            $codigoEstRules = 'bail|required|max:20|unique:ESTUDIANTE,STD_COD_ESTUDIANTE';
        }
        
        return [
            'codigo_est'        => $codigoEstRules,
            'nombre'            => 'required|max:50',
            'apellido_pat'      => 'required|max:50',
            'apellido_mat'      => 'required|max:50',
            'sexo'              => 'required|in:M,F',
            'fecha_nacimiento'  => 'date',
            'foto'              => 'nullable|image|mimes:jpg,jpeg,png'
        ];
    }
    
    /**
     * Get custom attributes for validator errors
     *
     * @return array
     */
    public function attributes() {
        return [
            'codigo_est'        => 'código de estudiante',
            'apellido_pat'      => 'apellido paterno',
            'apellido_mat'      => 'apellido materno',
            'fecha_nacimiento'  => 'fecha de nacimiento'
        ];
    }
}
