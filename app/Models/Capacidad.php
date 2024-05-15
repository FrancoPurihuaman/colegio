<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacidad extends Model
{
    use HasFactory;
    
    use HasFactory;
    
    protected $table = "CAPACIDAD";
    protected $primaryKey = 'CPC_CODIGO';
    
    const CREATED_AT = 'CPC_CREATED';
    const UPDATED_AT = 'CPC_UPDATED';
}
