@extends('layouts.app')

@section('control-panel')

{{-- Panel de control --}}
<div class="f_control-panel">
    <div class="f_cp__top">
        <div class="f_cp__top_left">
        	{{-- Informacion de pagina --}}
        	<span class="f_cp_title">Competencia</span>
            <span class="f_cp_title--secondary"> / Nuevo</span>
            {{-- Informacion de pagina --}}
        </div>
        <div class="f_cp__top_right"></div>
    </div>
    <div class="f_cp__bottom">
        <div class="f_cp__bottom_left">
        	{{-- Acciones buttons --}}
        	<div class="f_cp_bl_action-buttons">
                <button type="submit" form="formCompetenciaGuardar" class="f_button f_button--primary tight">GUARDAR</button>
                <a href="{{ route('competencia.lista') }}" class="f_button f_button--secondary tight">DESCARTAR</a>
            </div>
            {{-- /Acciones buttons--}}
        </div>
        <div class="f_cp__bottom_right"></div>
    </div>
</div>
{{-- /Panel de control --}}

@endsection



@section('content-main')

{{-- Tarjeta de seccion --}}
<div class="f_card-section f_card-section--border mt-4">
    <div class="f_card-section__header">
    	<div class="f_card-section__title">
    		<span class="f_card-section__title-icon"><i class="fas fa-tag mr-3"></i></span>
    		Nueva competencia
    	</div>
    </div>
    <div class="f_card-section__body">
    
    	<div class="w-full">
            <form action="{{ route('competencia.guardar') }}" 
            		method="post" class="f_input-box--flat" id="formCompetenciaGuardar" enctype="multipart/form-data">
            	@csrf
            	
    			<table class="f_table f_table--form">
    				<tbody>
    					<tr>
    						<td><label class="f_item_label f_field--required">Nombre</label></td>
    						<td>
    							<div class="f_item_content sm:w-60">
    								<input type="text" name="nombre" value="{{ old('nombre') }}" required>
    							</div>
    						</td>
    					</tr>
    					<tr>
    						<td><label class="f_item_label f_field">Descripción</label></td>
    						<td>
    							<div class="f_item_content sm:w-60">
    								<textarea rows="4" name="descripcion">{{ old('descripcion') }}</textarea>
    							</div>
    						</td>
    					</tr>
    					<tr>
    						<td><label class="f_item_label f_field f_field--required">Área</label></td>
    						<td>
    							<div class="f_item_content sm:w-60">
    								<select name="area" class="selectr" required>
                						<option value="">&nbsp</option>
        								@foreach($areas as $area)
                    					<option value="{{ $area->ARE_CODIGO }}"
                    							@if ($area->ARE_CODIGO == old('area')) selected @endif
                							>{{ $area->ARE_NOMBRE }}</option>
                    					@endforeach
                					</select>
    							</div>
    						</td>
    					</tr>
    				</tbody>
    			</table>
    			
            </form>
        </div>
        
    </div>
</div>
{{-- /Tarjeta de seccion --}}

@endsection




@section('scripts')
<script type="text/javascript">

f_formPreventSendWithEnter.init("formCompetenciaGuardar");

</script>
@endsection
