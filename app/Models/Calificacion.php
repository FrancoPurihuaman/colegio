<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;
    
    protected $table = "CALIFICACION";
    protected $primaryKey = 'CLF_CODIGO';
    
    const CREATED_AT = 'CLF_CREATED';
    const UPDATED_AT = 'CLF_UPDATED';
}
