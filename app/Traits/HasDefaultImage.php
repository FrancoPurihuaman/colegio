<?php 

namespace App\Traits;

trait HasDefaultImage
{
    /**
     * Trait retorna url de imagen.
     * Se verifica la url obtenida, si está vacia se generará una url de ui-avatars
     * con base al nombre obtenido
     * 
     * @param string $imageUrl
     * @param string $name
     * @return string
     */
    public function getImage(string $imageUrl, string $name) {
        
        if(!$imageUrl){
            $name = trim($name);
            $name = str_replace(" ", "+", $name);
            $imageUrl = "https://ui-avatars.com/api/?name={$name}&size=160&background=a4414b&color=fff";
        }
        
        return $imageUrl;
    }
}