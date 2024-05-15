/**
 * Libreria para generar ventana modal
 * Author: Franco Purihuaman
 * 
 */


const f_modal = {};

/**
 * Función para generar ventana modal
 * a partir de html existente
 *
 * @param { 
 *        	btnShow => String - Id del boton mostrar modal 
 *          modal = String - Id del modal a mostrar, 
 *          backdrop = String ("" | "static") - Especifica si el modal se ocultará al hacer click en el backdrop
*         }
 */
f_modal.generate = ({btnShow = "", modal = "", backdrop = ""}) => {
    btnShow = document.getElementById(btnShow);
    modal = document.getElementById(modal);
    let buttonsClose = null;

    if(modal){
	
		buttonsClose = modal.querySelectorAll("button[data-dismis=close]");
        buttonsClose.forEach(element => {
            element.addEventListener("click", function(){
                modal.style.display = "none";
            });
        });

        if(backdrop != "static"){
            modal.addEventListener("click", function(e){
                if(e.target == modal){
                    modal.style.display = "none";
                }
                
            });
        }

        if(btnShow){
            btnShow.addEventListener("click", function(){
                modal.style.display = "block";
            });
        }else{console.log("Boton mostrar modal no encontrado");}
        
    }else{
        console.error("Modal no encontrado");
    }
}

export default f_modal;