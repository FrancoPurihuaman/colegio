<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Estudiante extends Model
{
    use HasFactory;
    
    protected $table = "ESTUDIANTE";
    protected $primaryKey = 'STD_CODIGO';
    
    const CREATED_AT = 'STD_CREATED';
    const UPDATED_AT = 'STD_UPDATED';
    
    /*
     * Metodo retorna colección de matriculas asociadas a un estudiante
     *
     * @return Illuminate\Database\Eloquent\Collection;
     */
    public function matriculas()
    {
        return $this->hasMany('App\Models\Matricula', 'STD_CODIGO');
    }
    
    /**
     * Obtener foto
     */
    public function getGetSexoAttribute() {
        
        $sexo = '';
        
        if ($this->STD_SEXO == 'M') {
            $sexo = 'Masculino';
        }else if ($this->STD_SEXO == 'F') {
            $sexo = 'Femenino';
        }
        
        return $sexo;
    }
    
    /**
     * Obtener foto
     */
    public function getGetFotoAttribute() {
        if ($this->STD_FOTO) {
            return url("storage/$this->STD_FOTO");
        }
    }
    
    /**
     * Obtener edad
     */
    public function getGetEdadAttribute() {
        if ($this->STD_FECHA_NACIMIENTO) {
            return Carbon::parse($this->STD_FECHA_NACIMIENTO)->age;
        }
    }
}
