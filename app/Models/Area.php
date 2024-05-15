<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    
    protected $table = "AREA";
    protected $primaryKey = 'ARE_CODIGO';
    
    const CREATED_AT = 'ARE_CREATED';
    const UPDATED_AT = 'ARE_UPDATED';
    
    /*
     * Metodo retorna colección de competencias asociadas al área
     *
     * @return Illuminate\Database\Eloquent\Collection;
     */
    public function competencias()
    {
        return $this->hasMany('App\Models\Competencia', 'ARE_CODIGO');
    }
    
    /*
     * Metodo retorna colección de clases asociadas al área
     *
     * @return Illuminate\Database\Eloquent\Collection;
     */
    public function clases()
    {
        return $this->hasMany('App\Models\Clase', 'ARE_CODIGO');
    }
}
