<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colegio extends Model
{
    use HasFactory;
    
    protected $table = "COLEGIO";
    protected $primaryKey = 'CLG_CODIGO';
    
    const CREATED_AT = 'CLG_CREATED';
    const UPDATED_AT = 'CLG_UPDATED';
    
    
    /**
     * Obtener logo
     */
    public function getGetLogoAttribute() {
        if ($this->CLG_LOGO) {
            return url("storage/$this->CLG_LOGO");
        }
    }
    
}
