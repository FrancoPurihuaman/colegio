/**
 * Libreria para manipular tablas
 * Author: Franco Purihuaman
 * 
 */

 const f_table = {};

/**
 * Función para agrandar o encoger el ancho de columna de tabla
 *
 * @param { 
 *        	idTable => String - Id de la tabla
 *        }
 */
f_table.resizable = (idTable = "") =>{
	
    let pressed = false;
    let start = undefined;
    let startX, startWidth;
    let aggregatedMoveUp = false;
    
    let table = (idTable !== "") ? document.getElementById(idTable) : null;

	if(table){
		
		let headers = table.querySelectorAll("th");
    
	    [].map.call(headers, th => th.addEventListener("mousedown", function(e){
	    	start = this;
	        pressed = true;
	        startX = e.pageX;
	        startWidth = this.clientWidth;
	        start.classList.add("f_scroll--resizing");
	        start.classList.add("f_noselectable");
	        
	        addEventsMoveUp();
	    }));
	    
	    function addEventsMoveUp(){
	    	if(!aggregatedMoveUp) {
	            window.addEventListener("mousemove", assingWhidth);
	        	window.addEventListener("mouseup", restore);
	        	aggregatedMoveUp = true;
	        }
	    }
	    
	    function assingWhidth(e){
	    	if(pressed) {
	            start.style.width = startWidth + (e.pageX - startX) + "px";
	            start.style.minWidth = startWidth + (e.pageX - startX) + "px";
	        }
	    }

		function restore(){
	    	if(pressed) {
	            start.classList.remove("f_scroll--resizing");
	            pressed = false;
	            removeEventsMoveUp();
	            aggregatedMoveUp = false;
	        }
	    }
	    
	    function removeEventsMoveUp(){
	        window.removeEventListener("mousemove", assingWhidth);
	        window.removeEventListener("mouseup", restore);
	    }
	    
	    
	}else{console.error("Tabla no encontrada")}
    

}

export default f_table;