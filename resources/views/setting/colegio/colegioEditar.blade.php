@extends('layouts.app')

@section('control-panel')

{{-- Panel de control --}}
<div class="f_control-panel">
    <div class="f_cp__top">
        <div class="f_cp__top_left">
        	{{-- Informacion de pagina --}}
        	<span class="f_cp_title">Colegio</span>
            <span class="f_cp_title--secondary"> / Editar</span>
            {{-- Informacion de pagina --}}
        </div>
        <div class="f_cp__top_right"></div>
    </div>
    <div class="f_cp__bottom">
        <div class="f_cp__bottom_left">
        	{{-- Acciones buttons --}}
        	<div class="f_cp_bl_action-buttons">
                <button type="submit" form="formColegioEditar" class="f_button f_button--primary tight">GUARDAR</button>
                <a href="{{ route('colegio.mostrar') }}" class="f_button f_button--secondary tight">DESCARTAR</a>
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
    		<span class="f_card-section__title-icon"><i class="fas fa-school mr-3"></i></span>
    		Editar colegio
    	</div>
    </div>
    <div class="f_card-section__body">
    	
    	<div class="w-full">
            <form action="{{ route('colegio.actualizar') }}" 
            		method="post" class="f_input-box--flat" id="formColegioEditar" enctype="multipart/form-data">
            		
            	@method('PUT')
            	@csrf
            	
    			<table class="f_table f_table--form">
    				<tbody>
    					<tr>
    						<td><label class="f_item_label f_field--required">Logo</label></td>
    						<td>
    							<div class="f_item_content sm:w-60">
    								<div class="f_image--ref">
    									<img alt="" src="{{ $colegio->getLogo }}" id="imgLogo">
    								</div>
    								<div class="pt-2">
    									<input type="file" name="logo" id="fileLogo" class="hidden">
    									<label for="fileLogo" class="f_button f_button--square small">Cambiar</label>
    								</div>
    							</div>
    						</td>
    					</tr>
    					<tr>
    						<td><label class="f_item_label f_field--required">Código modular</label></td>
    						<td>
    							<div class="f_item_content sm:w-60">
    								<input type="text" name="codigo_modular" 
    										value="{{ old('codigo_modular', $colegio->CLG_CODIGO_MODULAR) }}" required>
    							</div>
    						</td>
    					</tr>
    					<tr>
    						<td><label class="f_item_label f_field--required">Nombre</label></td>
    						<td>
    							<div class="f_item_content sm:w-60">
    								<input type="text" name="nombre" 
    										value="{{ old('nombre', $colegio->CLG_NOMBRE) }}" required>
    							</div>
    						</td>
    					</tr>
    					<tr>
    						<td><label class="f_item_label f_field--required">Director</label></td>
    						<td>
    							<div class="f_item_content sm:w-60">
    								<input type="text" name="director" 
    										value="{{ old('director', $colegio->CLG_DIRECTOR) }}" required>
    							</div>
    						</td>
    					</tr>
    					<tr>
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

f_formPreventSendWithEnter.init("formColegioEditar");

f_image.show({
	idInput: "fileLogo",
	idImg: "imgLogo"
});


</script>
@endsection
