<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    use HasFactory;
    
    protected $table = "TIPO_USUARIO";
    protected $primaryKey = 'TPU_CODIGO';
    
    const CREATED_AT = 'TPU_CREATED';
    const UPDATED_AT = 'TPU_UPDATED';
    
    
    /*
     * Metodo retorna colección de usuarios asociados al tipo de usuario
     * 
     * @return Illuminate\Database\Eloquent\Collection;
     */
    public function usuarios()
    {
        return $this->hasMany('App\Models\User', 'TPU_CODIGO');
    }
}
