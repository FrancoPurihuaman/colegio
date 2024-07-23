<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\HasDefaultImage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasDefaultImage;
    
    protected $table = "USUARIO";
    protected $primaryKey = 'USU_CODIGO';
    
    const CREATED_AT = 'USU_CREATED';
    const UPDATED_AT = 'USU_UPDATED';
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    /*
     * Método retorna url de foto de usuario,
     * si el usuario no tine foto se generará una url
     * 
     * @return String
     */
    public function getGetPhotoAttribute() {
        return  $this->getImage(asset("img/user1.jpg"), $this->name);
    }
    
    
    /*
     * Metodo retorna una instancia del "tipo de usuario" al que pertenece el usuario.
     * 
     * @return App\Models\TipoUsuario
     */
    public function tipoUsuario()
    {
        return $this->belongsTo('App\Models\TipoUsuario', 'TPU_CODIGO', 'TPU_CODIGO');
    }
}
