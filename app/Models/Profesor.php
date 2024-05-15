<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Profesor extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = "PROFESOR";
    protected $primaryKey = 'PFS_CODIGO';
    
    const CREATED_AT = 'PFS_CREATED';
    const UPDATED_AT = 'PFS_UPDATED';
    const DELETED_AT = 'PFS_DELETED';
    
    /*
     * Metodo retorna colección de clases asociadas a un profesor
     *
     * @return Illuminate\Database\Eloquent\Collection;
     */
    public function clases()
    {
        return $this->hasMany('App\Models\Clase', 'PFS_CODIGO');
    }
    
    
    /**
     * Obtener foto
     */
    public function getGetSexoAttribute() {
        
        $sexo = '';
        
        if ($this->PFS_SEXO == 'M') {
            $sexo = 'Masculino';
        }else if ($this->PFS_SEXO == 'F') {
            $sexo = 'Femenino';
        }
        
        return $sexo;
    }
    
    /**
     * Obtener foto
     */
    public function getGetFotoAttribute() {
        if ($this->PFS_FOTO) {
            return url("storage/$this->PFS_FOTO");
        }
    }
    
    /**
     * Obtener edad
     */
    public function getGetEdadAttribute() {
        if ($this->PFS_FECHA_NACIMIENTO) {
            return Carbon::parse($this->PFS_FECHA_NACIMIENTO)->age;
        }
    }
}
