<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;
    
    protected $table = "CLASE";
    protected $primaryKey = 'CLS_CODIGO';
    
    const CREATED_AT = 'CLS_CREATED';
    const UPDATED_AT = 'CLS_UPDATED';
    
    /*
     * Metodo retorna colección de matriculas asociadas a la clase
     *
     * @return Illuminate\Database\Eloquent\Collection;
     */
    public function matriculas()
    {
        return $this->hasMany('App\Models\Matricula', 'CLS_CODIGO');
    }
    
    /*
     * Metodo retorna el área asociada a la clase
     *
     * @return Illuminate\Database\Eloquent\Model;
     */
    public function area()
    {
        return $this->belongsTo('App\Models\Area', 'ARE_CODIGO', 'ARE_CODIGO');
    }
    
    /*
     * Metodo retorna el profesor asociado a la clase
     *
     * @return Illuminate\Database\Eloquent\Model;
     */
    public function profesor()
    {
        return $this->belongsTo('App\Models\Profesor', 'PFS_CODIGO', 'PFS_CODIGO');
    }
}
