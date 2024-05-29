<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;
    
    protected $table = "GRADO";
    protected $primaryKey = 'GRD_CODIGO';
    
    const CREATED_AT = 'GRD_CREATED';
    const UPDATED_AT = 'GRD_UPDATED';
    
    /*
     * Metodo retorna colección de competencias asociadas al área
     *
     * @return Illuminate\Database\Eloquent\Collection;
     */
    public function grupos()
    {
        return $this->hasMany('App\Models\Grupo', 'GRD_CODIGO');
    }
}
