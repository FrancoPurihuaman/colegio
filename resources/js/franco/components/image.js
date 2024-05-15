/**
 * Libreria para manipular imagenes
 * Author: Franco Purihuaman
 * 
 */

 const f_image = {};

/**
 * Función para mostrar una imagen seleccionada
 *
 * @param { 
 *        	idInput => String - Id del input file
 *			idImg  => String - Id de la etiqueta de imagen
 *        }
 */
f_image.show = ({idInput = "", idImg = ""}) =>{
    
    let file = (idInput !== "") ? document.getElementById(idInput) : null;
    let image = (idImg !== "") ? document.getElementById(idImg) : null;

	if(file || image){
		
		file.addEventListener('change', function(e){
            if(e.target.files[0]){
                const reader = new FileReader();
                reader.onload = function(e){
                    image.src = e.target.result;
                }
                reader.readAsDataURL(e.target.files[0]);
            }else{
                //
            }
        });
	    
	    
	}else{console.error("InputFile o etiqueta de imagen no encontrados")}
    
}

export default f_image;