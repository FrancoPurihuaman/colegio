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
        return  $this->getImage("https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fwallup.net%2Fwp-content%2Fuploads%2F2016%2F06%2F06%2F97658-glasses-brunette-smiling-face-closeup-women.jpg&f=1&nofb=1", $this->name);
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
