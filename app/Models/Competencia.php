<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    use HasFactory;
    
    protected $table = "COMPETENCIA";
    protected $primaryKey = 'CPT_CODIGO';
    
    const CREATED_AT = 'CPT_CREATED';
    const UPDATED_AT = 'CPT_UPDATED';
    
    /*
     * Metodo retorna colección de capacidades asociadas a la competencia
     *
     * @return Illuminate\Database\Eloquent\Collection;
     */
    public function capacidades()
    {
        return $this->hasMany('App\Models\Capacidad', 'CPT_CODIGO');
    }
    
    /*
     * Metodo retorna colección de calificaciones asociadas a la competencia
     *
     * @return Illuminate\Database\Eloquent\Collection;
     */
    public function calificaciones()
    {
        return $this->hasMany('App\Models\Calificacion', 'CPT_CODIGO');
    }
    
    /*
     * Metodo retorna el área asociada a la competencia
     *
     * @return Illuminate\Database\Eloquent\Collection;
     */
    public function area()
    {
        return $this->belongsTo('App\Models\Area', 'ARE_CODIGO', 'ARE_CODIGO');
    }
}
