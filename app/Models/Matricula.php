<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;
    
    protected $table = "MATRICULA";
    protected $primaryKey = 'MTL_CODIGO';
    
    const CREATED_AT = 'MTL_CREATED';
    const UPDATED_AT = 'MTL_UPDATED';
    
    
    /*
     * Metodo retorna colección de calificaciones asociadas a una matricula
     *
     * @return Illuminate\Database\Eloquent\Collection;
     */
    public function calificaciones()
    {
        return $this->hasMany('App\Models\Calificacion', 'MTL_CODIGO');
    }
    
    /*
     * Metodo retorna el modelo estudiante asociado a la matricula
     *
     * @return Illuminate\Database\Eloquent\Collection;
     */
    public function estudiante()
    {
        return $this->belongsTo('App\Models\Estudiante', 'STD_CODIGO', 'STD_CODIGO');
    }
    
}
