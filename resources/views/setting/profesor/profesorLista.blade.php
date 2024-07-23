@extends('layouts.app')

@section("control-panel")

{{-- Panel de control --}}
<div class="f_control-panel">
    <div class="f_cp__top">
        <div class="f_cp__top_left">
        	{{-- Informacion de pagina --}}
        	<span class="f_cp_title">Profesores</span>
            <span class="f_cp_title--secondary"></span>
            {{-- Informacion de pagina --}}
        </div>
        <div class="f_cp__top_right">
        	<div class="f_cp_tr__search">
        		<form action="{{ route('profesor.lista') }}">
        			<input type="text" class="f_input-box--flat" name="filter_dni" placeholder="DNI...">
        		</form>
    		</div>
        	<div class="f_cp_tr__filters">
            	<button type="button" class="f_filters__toggle f_button f_button--other tight" 
            			id="filtersBtnToggle" title="Aplicar filtros">
        			<i class="fas fa-filter"></i>
        		</button>
        	</div>
        </div>
    </div>
    <div class="f_cp__bottom">
        <div class="f_cp__bottom_left">
        	{{-- Acciones buttons --}}
        	<div class="f_cp_bl_action-buttons">
            	<a href="{{ route('profesor.crear') }}" class="f_button f_button--primary tight">NUEVO</a>
        	</div>
            {{-- /Acciones buttons --}}
        </div>
        <div class="f_cp__bottom_right">
        	{{-- Paginador --}}
			<div class="f_cp__pager">
				<span>
					{{ $pgdProfesoresLimits['from'] . ' - '.  $pgdProfesoresLimits['to']  }} / {{ $pgdProfesores->total() }}
				</span>
				@if ($pgdProfesores->hasPages())
				<span>
                    {{-- Previous Page Link --}}
                    @if (!$pgdProfesores->onFirstPage())
					<a rel="prev" href="{{ $pgdProfesores->previousPageUrl() }}"
                        class="f_button f_button--secondary tight" title="Página Anterior">
                        <i class="fas fa-chevron-left"></i>
					</a>
                    @else
                    <a href="#" class="f_button f_button--other tight">
                        <i class="fas fa-chevron-left"></i>
					</a>
                    @endif
                    
                    {{-- Next Page Link --}}
                    @if ($pgdProfesores->hasMorePages())
                    <a rel="next" href="{{ $pgdProfesores->nextPageUrl() }}"
                    	class="f_button f_button--secondary tight" title="Página Anterior">
                    	<i class="fas fa-chevron-right"></i>
                    </a>
                    @else
                    <a href="#" class="f_button f_button--other tight">
                        <i class="fas fa-chevron-right"></i>
					</a>
                    @endif
				</span>
				@endif
				
				<span>
					<a href="{{ route('profesor.lista')  }}"
                        class="f_button f_button--other tight" title="Quitar filtros">
                        <i class="fas fa-times"></i>
					</a>
				</span>
            </div>
            {{-- /Paginador --}}
        </div>
    </div>
    
    {{-- Filtros --}}
	<div class="f_filters">
		<div class="f_filters__hidden-panel" id="filtersHiddenPanel">
			<button class="f_filters__close f_button f_button--other small" id="filtersBtnClose">
				<i class="fas fa-times"></i>
			</button>
        	<form action="{{ route('profesor.lista') }}" method="get" 
        			class="f_filters__options-panel f_input-box--flat"
        			id="formFilters">
    			<div class="f_filters__title">Filtrar Profesores</div>
    			<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-4 gap-x-7 gap-y-4">
        			<div class="f_filters__item flex">
            			<label class="font-semibold mr-2">Ref.</label>
        				<div class="w-28">
        					<input type="text" name="filter_ref" value="{{ old('filter_ref') }}">
        				</div>
            		</div>
            		<div class="f_filters__item flex">
        				<label class="font-semibold mr-2">DNI</label>
        				<div class="w-28">
        					<input type="text" name="filter_dni" value="{{ old('filter_dni') }}">
        				</div>
        			</div>
        			<div class="f_filters__item flex">
        				<label class="font-semibold mr-2">Apellido paterno</label>
        				<div class="w-56">
        					<input type="text" name="filter_apellido_pat" value="{{ old('filter_apellido_pat') }}">
        				</div>
        			</div>
    			</div>
    			<div class="f_filters__actions">
    				<button type="button" class="f_button f_button--other tight" onclick="cleanFormFilters()">LIMPIAR</button>
    				<button type="submit" class="f_button f_button--outline tight">FILTRAR</button>
    			</div>
        	</form>
		</div>
	</div>
	{{-- /Filtros --}}
</div>
{{-- /Panel de control --}}

@endsection



@section("content-main")

{{-- Tarjeta de seccion --}}
<div class="f_card">
    
    <div class="f_card__body">
    
        {{-- Table --}}
        <div class="f_overflow_scroll-x">
            <table class="f_table" id="tableProfesores">
                <thead>
                    <tr class="list_title">
                        <th class="f_nowrap_100">REF.</th>
                        <th class="f_nowrap_200">DNI</th>
                        <th class="f_nowrap_200">NOMBRE</th>
                        <th class="f_nowrap_200">ESPECIALIDAD</th>
                        <th class="f_nowrap_200">TELEFONO</th>
                        <th class="f_nowrap_200">EMAIL</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($pgdProfesores as $profesor)
                    <tr class="f_oddeven">
                        <td>
                            <a href="{{ route('profesor.mostrar', ['id' => $profesor]) }}" class="f_link" style="display: flex">
                                <span style=" color: #a69944">
                                    <i class="fas fa-user-tie mr-1"></i>
                                </span>
                                <span class="align-middtle">{{ $profesor->PFS_CODIGO }}</span>
                            </a>
                        </td>
                        <td class="f_nowrap_200">{{ $profesor->PFS_DNI}}</td>
                        <td class="f_nowrap_200">{{ $profesor->PFS_NOMBRE .' '. $profesor->PFS_APELLIDO_PAT .' '. $profesor->PFS_APELLIDO_MAT}}</td>
                        <td class="f_nowrap_200">{{ $profesor->PFS_ESPECIALIDAD }}</td>
                        <td class="f_nowrap_200">{{ $profesor->PFS_TELEFONO }}</td>
                        <td class="f_nowrap_200">{{ $profesor->PFS_EMAIL}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- /Table --}}
    </div>
</div>
{{-- /Tarjeta de seccion --}}

@endsection





@section('scripts')
<script type="text/javascript">

f_table.resizable("tableProfesores");

function cleanFormFilters(){
	window.f_form.clean({idForm: "formFilters"});
}

</script>
@endsection
