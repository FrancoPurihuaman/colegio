@extends('layouts.app')

@section("content-main")
<div class="grid grid-cols-1 md:grid-cols-4 gap-3 mt-4">
    <div class="f_actividad-rapida">
    	<div class="f_actividad-rapida__image">
    		<span style=" color: #a69944">
                <i class="fas fa-user"></i>
            </span>
    	</div>
    	<div class="f_actividad-rapida__content">
    		<div class="f_actividad-rapida__body">
    			<div class="f_actividad-rapida__cantidad">{{ $cantEstudiantes }}</div>
    			<div class="f_actividad-rapida__descripcion">Total de estudiantes</div>
    		</div>
    		<div class="f_actividad-rapida__footer">
    			<a class="f_button small f_button--other" href="{{ route('estudiante.lista') }}">Ver más</a>
    		</div>
    	</div>
    </div>
    
    <div class="f_actividad-rapida">
    	<div class="f_actividad-rapida__image">
    		<span style=" color: #a69944">
                <i class="fas fa-user-tie"></i>
            </span>
    	</div>
    	<div class="f_actividad-rapida__content">
    		<div class="f_actividad-rapida__body">
    			<div class="f_actividad-rapida__cantidad">{{ $cantProfesores }}</div>
    			<div class="f_actividad-rapida__descripcion">Total de profesores</div>
    		</div>
    		<div class="f_actividad-rapida__footer">
    			<a class="f_button small f_button--other" href="{{ route('profesor.lista') }}">Ver más</a>
    		</div>
    	</div>
    </div>
    
    <div class="f_actividad-rapida">
    	<div class="f_actividad-rapida__image">
    		<span style=" color: #a69944">
                <i class="fas fa-book"></i>
            </span>
    	</div>
    	<div class="f_actividad-rapida__content">
    		<div class="f_actividad-rapida__body">
    			<div class="f_actividad-rapida__cantidad">{{ $cantAreas }}</div>
    			<div class="f_actividad-rapida__descripcion">Total de áreas</div>
    		</div>
    		<div class="f_actividad-rapida__footer">
    			<a class="f_button small f_button--other" href="{{ route('area.lista') }}">Ver más</a>
    		</div>
    	</div>
    </div>
    
    <div class="f_actividad-rapida">
    	<div class="f_actividad-rapida__image">
    		<span style=" color: #a69944">
                <i class="fas fa-graduation-cap"></i>
            </span>
    	</div>
    	<div class="f_actividad-rapida__content">
    		<div class="f_actividad-rapida__body">
    			<div class="f_actividad-rapida__cantidad">{{ $cantGrados }}</div>
    			<div class="f_actividad-rapida__descripcion">Total de grados</div>
    		</div>
    		<div class="f_actividad-rapida__footer">
    			<a class="f_button small f_button--other" href="{{ route('grado.lista') }}">Ver más</a>
    		</div>
    	</div>
    </div>
</div>
@endsection