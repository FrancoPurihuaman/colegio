/**
 * Libreria para generar un mensaje de alerta
 * Author: Franco Purihuaman
 * 
 */

 const f_alert = {};

/**
 * Función para generar un mensaje de alerta
 *
 * @param { 
 *        	containerId => String - Id del contenedor donde se agregará el mensaje de alerta (default body),
 *          type => String - Especifica el tipo de mensaje de alerta (success, danger, warning, info, etc),
 *          message => String - Mensje a mostrar,
 *          details => array - Detalles a mostrar como item de lista,
 *          autoremove => boolean - Especifica si el mensaje de alerta debe eliminarse automaticamente
 *        }
 */
f_alert.generate = ({
    containerId = "",
    type      = "info",
    message   = "",
    details   = [],
    autoremove = true}) =>
{
    const alert = document.createElement("div");
    let mainContainer = (containerId != "") ? document.getElementById(containerId) : null;
    if (!mainContainer) {[mainContainer] = document.getElementsByTagName("body");}

    let alertContainer = mainContainer.querySelector("div.f_alert-container");
	if (!alertContainer) {
        alertContainer = document.createElement("div");
        alertContainer.setAttribute("class", "f_alert-container");
        mainContainer.insertAdjacentElement("afterbegin", alertContainer);
    }
	
	// Agregando clase a la alerta
    alert.setAttribute("class", `f_alert ${type}`);

	// Agregando mensaje a la alerta
	alert.innerHTML = message;

    // Agregando item de lista al detalle de mensaje
    if(details){
        let ul = document.createElement('ul');

        details.forEach(element => {
	        let li = document.createElement('li');
	        li.innerHTML = element;
	        ul.appendChild(li);
        });

        alert.appendChild(ul);
    }

	// Agregando boton close a la alerta
    let buttonClose = document.createElement('button');
    buttonClose.setAttribute('class', 'f_alert__close');
    buttonClose.innerHTML = "&#x2715";
    buttonClose.addEventListener('click', function(){
        alertContainer.removeChild(alert);
    });
	alert.appendChild(buttonClose);

	// Eliminar alerta despues de "n" segundos
    if(autoremove === true){
        setTimeout(function(){
        	if(alertContainer.contains(alert)){alertContainer.removeChild(alert)};
        },5000);
    }

	// Agregar alerta al contenedor de alertas
    alertContainer.appendChild(alert);
}



/**
 * Función para convertir html en mensaje de alerta
 *
 * @param { 
 *			containerId => String - Id del contenedor donde se agregará el mensaje de alerta (default body),
 *			type => String - Especifica el tipo de mensaje de alerta (success, danger, warning, info, etc),
 *        	alertId => String - Id de la alerta,
 *          autoremove => boolean - Especifica si el mensaje de alerta debe eliminarse automaticamente
 *        }
 */
f_alert.convert = ({
	containerId = "",
	type		= "",
    alertId 	= "",
    autoremove 	= true}) =>
{
	let alertOld = (alertId != "") ? document.getElementById(alertId) : null;
	let alertNew = null;
	
	if(alertOld){
		alertNew = alertOld.cloneNode(true);
		alertOld.parentNode.removeChild(alertOld);
		
		let mainContainer = (containerId != "") ? document.getElementById(containerId) : null;
	    if (!mainContainer) {[mainContainer] = document.getElementsByTagName("body");}
	
	    let alertContainer = mainContainer.querySelector("div.f_alert-container");
		if (!alertContainer) {
	        alertContainer = document.createElement("div");
	        alertContainer.setAttribute("class", "f_alert-container");
	        mainContainer.insertAdjacentElement("afterbegin", alertContainer);
	    }

		// Agregando clase a la alerta
		if(type != ""){
			alertNew.setAttribute("class", `f_alert ${type}`);
		}

		// Agregando boton close a la alerta
		let buttonClose = alertNew.querySelector("f_alert__close");
		if(!buttonClose){
			buttonClose = document.createElement('button');
			buttonClose.setAttribute('class', 'f_alert__close');
	    	buttonClose.innerHTML = "&#x2715";
			alertNew.appendChild(buttonClose);
		}
	    buttonClose.addEventListener('click', function(){
	        alertContainer.removeChild(alertNew);
	    });
		
		// Eliminar alerta despues de "n" segundos
	    if(autoremove === true){
	        setTimeout(function(){
				if(alertContainer.contains(alertNew)){alertContainer.removeChild(alertNew);}
			},8000);
	    }

		// Agregar alerta al contenedor de alertas
		alertContainer.appendChild(alertNew);
		
	}else{
		console.error("Alerta no encontrada: " + alertId);
	}
    
}

export default f_alert;