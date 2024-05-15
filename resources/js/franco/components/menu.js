/**
 * Libreria para crear menu responsive
 * Author: Franco Purihuaman
 * 
 */


var f_navegation = {};

/**
 * Función para generar un menu.
 * Se agregara toda la funcionalidad no asi los estilos.
 *
 * @param String Id del contenedor de menu
 * @param String Id del menu
 * @param String Id del botón mostrar u ocultar menu
 *            
 */
f_navegation.menu = function (containerId, menuId, toggleButtonId) {
    var container = document.getElementById(containerId);
    var menu = document.getElementById(menuId);
    var toggleButton = document.getElementById(toggleButtonId);

    function toggleContainerVisibility(e) {
		e.stopPropagation();
		
        container.classList.toggle('show_menu');
		
		// Evento para cerrar el menu por fuera de foco
		if(container.classList.contains('show_menu')){
			window.addEventListener('click', closeMenuForOutFocus);
		}
    }

	function closeMenuForOutFocus(e){
		e.stopPropagation();
		
		if(!container.contains(e.target)){
			container.classList.remove('show_menu');
            window.removeEventListener("click", closeMenuForOutFocus);
        }
	}
	

    function closeSubmenu(e){
        var menuItems = menu.querySelectorAll("li.parent_submenu");
        var menuItemsLength = menuItems.length;

        while(menuItemsLength--){
            var menuItem = menuItems[menuItemsLength];
            
            if(menuItem.dataset.itemNumber != e.target.dataset.itemNumber){
                menuItem.classList.remove("active");

                if (menuItem.querySelector('ul') != null) {
                    menuItem.querySelector('ul').classList.remove('show_submenu');
                }
            }
        }
    }

	function closeSubmenuForOutFocus(e){
		
		if(!container.contains(e.target)){
			var menuItems = menu.querySelectorAll("li.parent_submenu");
	        var menuItemsLength = menuItems.length;
	
	        while(menuItemsLength--){
	            var menuItem = menuItems[menuItemsLength];
	            
	            menuItem.classList.remove("active");
	
                if (menuItem.querySelector('ul') != null) {
                    menuItem.querySelector('ul').classList.remove('show_submenu');
                }
	        }
			
            window.removeEventListener("click", closeSubmenuForOutFocus);
        }
	}

    function showSubMenu(e) {
        if (e.target.classList.contains('parent_submenu')) {
            e.preventDefault();

            if(e.target.parentNode.parentNode.classList.contains('f_container-menu')){
                closeSubmenu(e);
            }

            e.target.classList.toggle('active');
            e.target.querySelector('ul').classList.toggle('show_submenu');
	
			// Evento para ocultar submenu cuando el menu pierda el foco
			window.addEventListener("click", closeSubmenuForOutFocus);
        }
    }

    // si el contenedor de menu y boton toggle existen mostrar u ocultar menu
    if (container) {
		container.classList.add("f_container-menu");
		
        if (toggleButton) {
            toggleButton.addEventListener('click', toggleContainerVisibility);
        } else {
            console.error('Not found ' + toggleButtonId + ' Id');
        }
    } else {
        console.error('Not found ' + containerId + ' Id');
    }

    // Establecer propiedades de menu
    if (menu) {
        var menuItems = menu.querySelectorAll('li');
        var menuItemsLength = menuItems.length;

        // show submenus
        menu.addEventListener('click', function (e) {
            showSubMenu(e);
        });

        var count = 0;
        while (menuItemsLength--) {
            var menuItem = menuItems[menuItemsLength];
            menuItem.setAttribute('data-item-number', count++);

            // Detectar si un item es padre de un submenu
            if (menuItem.querySelector('ul') != null) {
                menuItem.classList.add('parent_submenu');

                //Crear toggle button para submenus
                var expandSubmenu = document.createElement('div');
                expandSubmenu.classList.add('expand_submenu');
                menuItem.appendChild(expandSubmenu);
            }
        }
    } else {
        console.error('Not found ' + menuId + ' Id');
    }
};

export default f_navegation;