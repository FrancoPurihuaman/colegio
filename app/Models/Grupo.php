<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    
    protected $table = "GRUPO";
    protected $primaryKey = 'GRP_CODIGO';
    
    const CREATED_AT = 'GRP_CREATED';
    const UPDATED_AT = 'GRP_UPDATED';
}
