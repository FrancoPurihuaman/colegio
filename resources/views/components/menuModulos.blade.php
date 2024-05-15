{{--  
|--------------------------------------------------------------------------
| Menu de modulos del sistema
|--------------------------------------------------------------------------
|
| En este componente se detalla los enlaces a todos los modulos.
|
--}}


<div {{ $attributes->merge(['class' => 'f_menu_modules']) }}  id="menuModules">
    <div class="f_menu_modules__table">
        <ul id="menuModulesList">
            <li class="f_menu_modules__item">
                <a href="{{ route('colegio.mostrar', ['id' => 1]) }}">
                    <span class="f_menu_modules__logoItem" style="color: #a55858;">
                        <i class="fas fa-cog"></i>
                    </span>
                    <div class="f_menu_modules__description">Configuración</div>
                </a>
            </li>
            <li class="f_menu_modules__item">
                <a href="#">
                    <span class="f_menu_modules__logoItem" style="color: #c5bb78;">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </span>
                    <div class="f_menu_modules__description">Clases</div>
                </a>
            </li>
            <li class="f_menu_modules__item">
                <a href="{{ route('reporte.libreta') }}">
                    <span class="f_menu_modules__logoItem" style="color: #259093;">
                        <i class="fas fa-chart-line"></i>
                    </span>
                    <div class="f_menu_modules__description">Reportes</div>
                </a>
            </li>
        </ul>
    </div>
</div>