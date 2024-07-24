<?php

namespace App\Http\Requests\direccion;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfesorRequest extends FormRequest
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
        $dniRules = "";
        
        if ($this->method() === "PUT") {
            $dniRules = 'bail|required|size:8|unique:PROFESOR,PFS_DNI,'.$this->route('id').',PFS_CODIGO';
        }else{
            $dniRules = 'bail|required|size:8|unique:PROFESOR,PFS_DNI';
        }
        
        return [
            'nombre'            => 'required|max:50',
            'apellido_pat'      => 'required|max:50',
            'apellido_mat'      => 'required|max:50',
            'dni'               => $dniRules,
            'sexo'              => 'required|in:M,F',
            'fecha_nacimiento'  => 'nullable|date',
            'email'             => 'nullable|email',
            'telefono'          => 'nullable|numeric',
            'especialidad'      => 'required|max:50',
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
            'apellido_pat'      => 'apellido paterno',
            'apellido_mat'      => 'apellido materno',
            'fecha_nacimiento'  => 'fecha de nacimiento'
        ];
    }
}
