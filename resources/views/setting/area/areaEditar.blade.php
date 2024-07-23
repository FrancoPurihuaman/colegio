@extends('layouts.app')

@section('control-panel')

{{-- Panel de control --}}
<div class="f_control-panel">
    <div class="f_cp__top">
        <div class="f_cp__top_left">
        	{{-- Informacion de pagina --}}
        	<span class="f_cp_title">Área</span>
            <span class="f_cp_title--secondary"> / Editar</span>
            {{-- Informacion de pagina --}}
        </div>
        <div class="f_cp__top_right"></div>
    </div>
    <div class="f_cp__bottom">
        <div class="f_cp__bottom_left">
        	{{-- Acciones buttons --}}
        	<div class="f_cp_bl_action-buttons">
                <button type="submit" form="formAreaEditar" class="f_button f_button--primary tight">GUARDAR</button>
                <a href="{{ route('area.lista') }}" class="f_button f_button--secondary tight">DESCARTAR</a>
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
<div class="f_card f_card--border mt-4">
    <div class="f_card__header">
    	<div class="f_card__title">
    		<span class="f_card__title-icon"><i class="fas fa-book mr-3"></i></span>
    		Editar área
    	</div>
    </div>
    <div class="f_card__body">
    	
    	<div class="w-full">
            <form action="{{ route('area.actualizar', [$area]) }}" 
            		method="post" class="f_input-box--flat" id="formAreaEditar" enctype="multipart/form-data">
            		
            	@method('PUT')
            	@csrf
            	
    			<table class="f_table f_table--form">
    				<tbody>
    					<tr>
    						<td><label class="f_item_label f_field--required">Nombre</label></td>
    						<td>
    							<div class="f_item_content sm:w-60">
    								<input type="text" name="nombre" 
    										value="{{ old('nombre', $area->ARE_NOMBRE) }}" required>
    							</div>
    						</td>
    					</tr>
    					<tr>
    						<td><label class="f_item_label f_field">Descripción</label></td>
    						<td>
    							<div class="f_item_content sm:w-60">
    								<textarea rows="4" name="descripcion">{{ old('descripcion', $area->ARE_DESCRIPCION) }}</textarea>
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

f_formPreventSendWithEnter.init("formAreaEditar");

</script>
@endsection
