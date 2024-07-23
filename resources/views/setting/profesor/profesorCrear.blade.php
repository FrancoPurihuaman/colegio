@extends('layouts.app')

@section('control-panel')

{{-- Panel de control --}}
<div class="f_control-panel">
    <div class="f_cp__top">
        <div class="f_cp__top_left">
        	{{-- Informacion de pagina --}}
        	<span class="f_cp_title">Profesor</span>
            <span class="f_cp_title--secondary"> / Nuevo</span>
            {{-- Informacion de pagina --}}
        </div>
        <div class="f_cp__top_right"></div>
    </div>
    <div class="f_cp__bottom">
        <div class="f_cp__bottom_left">
        	{{-- Acciones buttons --}}
        	<div class="f_cp_bl_action-buttons">
                <button type="submit" form="formProfesorGuardar" class="f_button f_button--primary tight">GUARDAR</button>
                <a href="{{ route('profesor.lista') }}" class="f_button f_button--secondary tight">DESCARTAR</a>
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
    		<span class="f_card__title-icon"><i class="fas fa-user-tie mr-3"></i></span>
    		Nuevo profesor
    	</div>
    </div>
    <div class="f_card__body">
    
    	<div class="w-full">
            <form action="{{ route('profesor.guardar') }}" 
            		method="post" class="f_input-box--flat" id="formProfesorGuardar" enctype="multipart/form-data">
            	@csrf
            	
    			<table class="f_table f_table--form">
    				<tbody>
    					<tr>
    						<td><label class="f_item_label f_field">Foto</label></td>
    						<td>
    							<div class="f_item_content sm:w-60">
    								<div class="f_image--ref">
    									<img alt="" src="" id="imgFoto">
    								</div>
    								<div class="pt-2">
    									<input type="file" name="foto" id="fileFoto" class="hidden" accept="image/*">
    									<label for="fileFoto" class="f_button f_button--square small">Seleccionar</label>
    								</div>
    							</div>
    						</td>
    					</tr>
    					<tr>
    						<td><label class="f_item_label f_field--required">Nombre</label></td>
    						<td>
    							<div class="f_item_content sm:w-60">
    								<input type="text" name="nombre" value="{{ old('nombre') }}" required>
    							</div>
    						</td>
    					</tr>
    					<tr>
    						<td><label class="f_item_label f_field--required">Apellido Paterno</label></td>
    						<td>
    							<div class="f_item_content sm:w-60">
    								<input type="text" name="apellido_pat" value="{{ old('apellido_pat') }}" required>
    							</div>
    						</td>
    					</tr>
    					<tr>
    						<td><label class="f_item_label f_field--required">Apellido Materno</label></td>
    						<td>
    							<div class="f_item_content sm:w-60">
    								<input type="text" name="apellido_mat" value="{{ old('apellido_mat') }}" required>
    							</div>
    						</td>
    					</tr>
    					<tr>
    						<td><label class="f_item_label f_field--required">DNI</label></td>
    						<td>
    							<div class="f_item_content sm:w-60">
    								<input type="text" name="dni" value="{{ old('dni') }}" required>
    							</div>
    						</td>
    					</tr>
    					<tr>
    						<td><label class="f_item_label f_field--required">Sexo</label></td>
    						<td>
    							<div class="f_item_content sm:w-60">
    								<select name="sexo" class="selectr" required>
    									<option value="-1">&nbsp</option>
                    					<option value="M" @if (old('sexo') == 'M') {{ "selected" }} @endif>M</option>
                    					<option value="F" @if (old('sexo') == 'F') {{ "selected" }} @endif>F</option>
                					</select>
    							</div>
    						</td>
    					</tr>
    					<tr>
    						<td><label class="f_item_label f_field">Fecha nacimiento</label></td>
    						<td>
    							<div class="f_item_content sm:w-60">
    								<input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
    							</div>
    						</td>
    					</tr>
    					<tr>
    						<td><label class="f_item_label f_field">Email</label></td>
    						<td>
    							<div class="f_item_content sm:w-60">
    								<input type="text" name="email" value="{{ old('email') }}">
    							</div>
    						</td>
    					</tr>
    					<tr>
    						<td><label class="f_item_label f_field">Teléfono</label></td>
    						<td>
    							<div class="f_item_content sm:w-60">
    								<input type="text" name="telefono" value="{{ old('telefono') }}">
    							</div>
    						</td>
    					</tr>
    					<tr>
    						<td><label class="f_item_label f_field--required">Especialidad</label></td>
    						<td>
    							<div class="f_item_content sm:w-60">
    								<input type="text" name="especialidad" value="{{ old('especialidad') }}" required>
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

f_formPreventSendWithEnter.init("formProfesorGuardar");

f_image.show({
	idInput: "fileFoto",
	idImg: "imgFoto"
});

</script>
@endsection

