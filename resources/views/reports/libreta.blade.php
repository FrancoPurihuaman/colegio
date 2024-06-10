@extends('layouts.app')


@section("control-panel")

{{-- Panel de control --}}
<div class="f_control-panel">
    <div class="f_cp__top">
        <div class="f_cp__top_left">
        	{{-- Informacion de pagina --}}
        	<span class="f_cp_title">Libretas</span>
            <span class="f_cp_title--secondary"></span>
            {{-- Informacion de pagina --}}
        </div>
        <div class="f_cp__top_right">
        	<div class="f_cp_tr__search">
        		<form action="#">
        			<input type="text" class="f_input-box--flat" name="filter_codigo" placeholder="Codigo de clase...">
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
            	<a href="#" class="f_button f_button--primary tight">NUEVO</a>
        	</div>
            {{-- /Acciones buttons --}}
        </div>
        <div class="f_cp__bottom_right">
        	{{-- Paginador --}}
			<div class="f_cp__pager">
				<span>
					{{ $paginatorClasesLimits['from'] . ' - '.  $paginatorClasesLimits['to']  }} / {{ $paginatorClases->total() }}
				</span>
				@if ($paginatorClases->hasPages())
				<span>
                    {{-- Previous Page Link --}}
                    @if (!$paginatorClases->onFirstPage())
					<a rel="prev" href="{{ $paginatorClases->previousPageUrl() }}"
                        class="f_button f_button--secondary tight" title="Pagina Anterior">
                        <i class="fas fa-chevron-left"></i>
					</a>
                    @else
                    <a href="#" class="f_button f_button--other tight">
                        <i class="fas fa-chevron-left"></i>
					</a>
                    @endif
                    
                    {{-- Next Page Link --}}
                    @if ($paginatorClases->hasMorePages())
                    <a rel="next" href="{{ $paginatorClases->nextPageUrl() }}"
                    	class="f_button f_button--secondary tight" title="Pagina Anterior">
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
					<a href="#"
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
        	<form action="#" method="get" 
        			class="f_filters__options-panel f_input-box--flat"
        			id="formFilters">
    			<div class="f_filters__title">Filtrar Articulos</div>
    			<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-4 gap-x-7 gap-y-4">
        			<div class="f_filters__item flex">
            			<label class="font-semibold mr-2">Codigo</label>
        				<div class="w-28">
        					<input type="text" name="filter_codigo" value="{{ old('filter_codigo') }}">
        				</div>
            		</div>
            		<div class="f_filters__item flex">
        				<label class="font-semibold mr-2">Nombre</label>
        				<div class="w-40">
        					<input type="text" name="filter_nombre" value="{{ old('filter_nombre') }}">
        				</div>
        			</div>
        			<div class="f_filters__item flex">
        				<label class="font-semibold mr-2">Codigo Digemid</label>
        				<div class="w-28">
        					<input type="text" name="filter_cod_digemid" value="{{ old('filter_cod_digemid') }}">
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
            <table class="f_table" id="tableArticulos">
                <thead>
                    <tr class="list_title">
                        <th class="f_nowrap_100">REF.</th>
                        <th class="f_nowrap_200">ÁREA</th>
                        <th class="f_nowrap_200">GRADO</th>
                        <th class="f_nowrap_200">SECCIÓN</th>
                        <th class="f_nowrap_200">AÑO</th>
                        <th class="f_nowrap_200">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($paginatorClases as $clase)
                    <tr class="f_oddeven">
                        <td>
                            <a href="{{ route('reporte.libreta.estudiante', ['idClase' => 1]) }}" class="f_link" style="display: flex">
                                <span style=" color: #a69944">
                                    <i class="fas fa-cube mr-1"></i>
                                </span>
                                <span class="align-middtle">{{ $clase->CLS_CODIGO }}</span>
                            </a>
                        </td>
                        <td class="f_nowrap_200">{{ $clase->area->ARE_NOMBRE }}</td>
                        <td class="f_nowrap_200">{{ $clase->CLS_GRADO }}</td>
                        <td class="f_nowrap_200">{{ $clase->CLS_SECCION }}</td>
                        <td class="f_nowrap_200">{{ $clase->CLS_YEAR }}</td>
                        <td class="f_nowrap_200"><a href="#" class="f_link">Descargar <i class="far fa-file-pdf"></i></a></td>
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