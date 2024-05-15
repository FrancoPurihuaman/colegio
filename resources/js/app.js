require('./bootstrap');
//var formSerialize = require('form-serialize');
//window.serialize = formSerialize;

import f_navegation from "./franco/components/menu";
import f_modal from "./franco/components/modal";
import f_alert from "./franco/components/alert";
import f_table from "./franco/components/table";
import f_image from "./franco/components/image";


/**
 * Agregando componente menu al objeto window
 *
 * @param {*}
 */
(function (window) {
    const _init = (containerId, menuId, toggleButtonId) => {
        f_navegation.menu(containerId, menuId, toggleButtonId);
    }
    window.f_menu = {
        init: _init
    }
})(window);


/**
 * Agregando componente ventana modal al objeto window
 *
 * @param {*}
 */
 (function (window) {
    const _init = (params) => {
        f_modal.generate(params);
    }
    window.f_modal = {
        init: _init
    }
})(window);


/**
 * Agregando componente mensaje de alerta al objeto window
 *
 * @param {*}
 */
 (function (window) {
    const _generate = (params) => {
        f_alert.generate(params);
    }
	const _convert = (params) => {
        f_alert.convert(params);
    }
    window.f_alert = {
        generate: _generate,
		convert: _convert
    }
})(window);


/**
 * Agregando componente para manipular imagen al objeto window
 *
 * @param {*}
 */
 (function (window) {
    const _show = (params) => {
        f_image.show(params);
    }
    window.f_image = {
        show: _show
    }
})(window);


/**
 * Instanciando menus para el dashboard
 * Agregando eventos para los botones del header
 * 
 */
(function (window) {
    // Instanciar los menus
    f_navegation.menu("menuModules","menuModules","btnToggleMenuModules");
    f_navegation.menu("menuHeader","menuHeader","btnToggleMenuHeader");



    // Agregar evento a la tarjeta información de usuario del header
    var btnToggleUserHeader = document.getElementById("btnToggleUserHeader");
    btnToggleUserHeader.addEventListener("click", function(event){
        event.stopPropagation();

        var cardUserHeader = document.getElementById("cardUserHeader");
        cardUserHeader.classList.toggle("show_card");

        if(cardUserHeader.classList.contains("show_card")){
            window.addEventListener("click", closeCardUserInfo);
        }

        // Cerrar tarjeta de notificación
        var cardNotificationHeader = document.getElementById("cardNotificationHeader");
        cardNotificationHeader.classList.remove("show_card");

        // Cerrar tarjeta de message del header
        var cardMessageHeader = document.getElementById("cardMessageHeader");
        cardMessageHeader.classList.remove("show_card");
    }); 

    function closeCardUserInfo(e){
        var card = document.getElementById("cardUserHeader");
        if(!card.contains(e.target)){
            card.classList.remove("show_card");
            window.removeEventListener("click", closeCardUserInfo);
        }
    }



    // Agregar evento a la tarjeta notificación del header
    var btnToggleNotificationHeader = document.getElementById("btnToggleNotificationHeader");
    btnToggleNotificationHeader.addEventListener("click", function(event){
        event.stopPropagation();

        var cardNotificationHeader = document.getElementById("cardNotificationHeader");
        cardNotificationHeader.classList.toggle("show_card");

        if(cardNotificationHeader.classList.contains("show_card")){
            window.addEventListener("click", closeCardNotification);
        }

        // Cerrar tarjeta de información de usuario
        var cardUserHeader = document.getElementById("cardUserHeader");
        cardUserHeader.classList.remove("show_card");

        // Cerrar tarjeta de message del header
        var cardMessageHeader = document.getElementById("cardMessageHeader");
        cardMessageHeader.classList.remove("show_card");
    });

    function closeCardNotification(e){
        var card = document.getElementById("cardNotificationHeader");
        if(!card.contains(e.target)){
            card.classList.remove("show_card");
            window.removeEventListener("click", closeCardNotification);
        }
    }



    // Agregar evento a la tarjeta message del header
    var btnToggleMessageHeader = document.getElementById("btnToggleMessageHeader");
    btnToggleMessageHeader.addEventListener("click", function(event){
        event.stopPropagation();

        var cardMessageHeader = document.getElementById("cardMessageHeader");
        cardMessageHeader.classList.toggle("show_card");

        if(cardMessageHeader.classList.contains("show_card")){
            window.addEventListener("click", closeCardMessage);
        }

        // Cerrar tarjeta de información de usuario
        var cardUserHeader = document.getElementById("cardUserHeader");
        cardUserHeader.classList.remove("show_card");

        // Cerrar tarjeta de notificación del header
        var cardNotificationHeader = document.getElementById("cardNotificationHeader");
        cardNotificationHeader.classList.remove("show_card");
    });

    function closeCardMessage(e){
        var card = document.getElementById("cardMessageHeader");
        if(!card.contains(e.target)){
            card.classList.remove("show_card");
            window.removeEventListener("click", closeCardMessage);
        }
    }

})(window);


/**
 * Agregando acciones para mostrar u ocultar el panel de filtros
 *
 * @param {*}
 */
 (function () {
    var filtersBtnToggle = document.getElementById('filtersBtnToggle');
	if(filtersBtnToggle){
		filtersBtnToggle.addEventListener('click', function(){
			var filtersHiddenPanel = document.getElementById('filtersHiddenPanel');
			if(filtersHiddenPanel){
				filtersHiddenPanel.classList.toggle("show");
			}
		}, false);
	}
	
	var filtersBtnClose = document.getElementById('filtersBtnClose');
	if(filtersBtnClose){
		filtersBtnClose.addEventListener('click', function(){
			var filtersHiddenPanel = document.getElementById('filtersHiddenPanel');
			if(filtersHiddenPanel){
				filtersHiddenPanel.classList.remove("show");
			}
		}, false);
	}
})();


/**
 * Agregando componente para manipular tablas al objeto window
 *
 * @param {*}
 */
(function (window) {
    const _resizable = (idTable) => {
        f_table.resizable(idTable);
    }
    window.f_table = {
        resizable: _resizable
    }
})(window);


/**
 * Limpiar formulario
 *
 * @param { 
 *        	idForm => String - Id de formulario
 *			hidden => bolean - Limpiar campo oculto
 *        }
 */
(function (window) {
	const _cleanForm = ({idForm = "", hidden = false}) => {
		
		let oForm = (idForm != "") ? document.getElementById(idForm) : null;
		
		if(oForm){
			
		  	oForm.reset();
			let elements = oForm.elements; 
			
			for(let i=0; i<elements.length; i++) {
		      
				let field_type = elements[i].type.toLowerCase();
				
				switch(field_type) {
				
					case "text": 
					case "password": 
					case "textarea":
						elements[i].value = ""; 
						break;
						
			        case "hidden":
						if(hidden){
							elements[i].value = ""; 
						}	
						break;
			        
					case "radio":
					case "checkbox":
			  			if (elements[i].checked) {
			   				elements[i].checked = false; 
						}
						break;
			
					case "select-one":
					case "select-multi":
						elements[i].selectedIndex = -1;
						break;
			
					default: 
						break;
				}
		    }
		}else{console.error("formulario no encontrado")}
		
	}
    window.f_form = {
        clean: _cleanForm
    }
})(window);



/**
 * Evitar envio de formulario con la tecla enter
 *
 * @param idForm Id de formulario
 */
(function (window) {
	const _formPreventSendWithEnter = (idForm) => {
		
		let oForm = (idForm != "") ? document.getElementById(idForm) : null;
		
		if(oForm){
			oForm.addEventListener("keypress", function(e){
		    	if(e.keyCode == 13){
		    		e.preventDefault();
		    		return false;
		    	}
	    	});
		  	
		}else{console.error("formulario no encontrado")}
		
	}
    window.f_formPreventSendWithEnter = {
        init: _formPreventSendWithEnter
    }
})(window);