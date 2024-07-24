{{--  
|--------------------------------------------------------------------------
| Menú de cabezera de pagina
|--------------------------------------------------------------------------
|
| En este componente se muestra el menú de cabezera.
| Este componente debe ser usado en la cabezera de pagina.
|
--}}

@props(['modulo'])

@if($modulo == "direccion")

<nav {{ $attributes->merge(['class' => 'f_menu']) }} id="menuHeader">
    <ul class="f_menu__list" id="menuHeaderList">
    	<li class="f_menu__item f_menu__item--module">
    		<a href="{{ route('direccion.home') }}">{{ ucFirst($modulo) }}</a>
		</li>
    	<li class="f_menu__item"><a href="{{ route('colegio.mostrar') }}">Colegio</a></li>
    	<li class="f_menu__item">Personas
            <ul class="f_menu__list">
                <li class="f_menu__item"><a href="{{ route('profesor.lista') }}">Profesores</a></li>
                <li class="f_menu__item"><a href="{{ route('estudiante.lista') }}">Estudiantes</a></li>
            </ul>
        </li>
        <li class="f_menu__item">Programa curricular
            <ul class="f_menu__list">
                <li class="f_menu__item"><a href="{{ route('area.lista') }}">Áreas</a></li>
                <li class="f_menu__item"><a href="{{ route('grado.lista') }}">Grados</a></li>
                <li class="f_menu__item"><a href="{{ route('competencia.lista') }}">Competencias</a></li>
            </ul>
        </li>
        <li class="f_menu__item">Gestión Académica
            <ul class="f_menu__list">
                <li class="f_menu__item"><a href="#">Grupos de estudio</a></li>
                <li class="f_menu__item"><a href="#">Clases</a></li>
            	<li class="f_menu__item"><a href="#">Matrículas</a></li>
            </ul>
        </li>
    </ul>
</nav>
@endif


{{-- ================================================================================================ --}}

@if($modulo == "academia")

<nav {{ $attributes->merge(['class' => 'f_menu']) }} id="menuHeader">
    <ul class="f_menu__list" id="menuHeaderList">
    	<li class="f_menu__item f_menu__item--module">
    		<a href="{{ route('academia.home') }}">{{ ucFirst($modulo) }}</a>
		</li>
    	<li class="f_menu__item"><a href="#">Calificación</a></li>
    </ul>
</nav>
@endif