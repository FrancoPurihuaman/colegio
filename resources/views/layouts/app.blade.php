<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Etiquetas meta --}}
    <title>{{ env('APP_NAME') }}</title>
    {{-- Favicon --}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/icon.png') }}"/>
    {{-- Font Awesome --}}
	  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
	  <!-- SOLO PARA USO OFFLINE - QUITAR PARA SUBIR A PRODUCCION -->
      <link href="/font_offline/css/fontawesome.css" rel="stylesheet" />
      <link href="/font_offline/css/brands.css" rel="stylesheet" />
      <link href="/font_offline/css/solid.css" rel="stylesheet" />
      <!-- FIN SOLO PARA USO OFFLINE --->
	{{-- Tailwind --}}
	<script src="{{ asset('js/tailwind.js') }}"></script>
	{{-- Selectr --}}
	<link href="https://cdn.jsdelivr.net/gh/mobius1/selectr@latest/dist/selectr.min.css" rel="stylesheet" type="text/css">
    {{-- Tema css --}}
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    
    {{-- Elementos para agragar al head --}}
    @yield('head')
    
</head>
<body class="f_web-page">
    {{-- Cabezera de pagina --}}
    <header class="f_web-page__header">
        {{-- Cabezera --}}
        <div class="f_header">
            
            <button class="f_menu__btnToggle f_menu_modules__btnToggle" id="btnToggleMenuModules"><i class="fas fa-bars"></i></button>

            {{-- Menu - opciones de modulo --}}
            <x-headerMenu class="f_menu--right" :modulo="$modulo"/>
            {{-- /Menu - opciones de modulo --}}
    
            {{-- Información addional --}}
            <div class="f_header__infoAux">
                <x-headerMessage />
                <x-headerNotification />
                <div class="f_header__btnToggle">
                    <button class="f_menu__btnToggle" id="btnToggleMenuHeader"><i class="fas fa-th"></i></button>
                </div>
                <x-headerCardInfoUser />
            </div>
            {{-- /Información addional --}}

        </div>
    </header>

    {{-- Cuerpo de pagina --}}
    <div class="f_web-page__body f_body-page">
    
		<div class="f_body-page__header">
			{{-- Panel de control --}}
			@yield('control-panel')
		</div>
		
		<div class="f_body-page__body">
			{{-- Contenido de principal --}}
        	@yield('content-main')
		</div>
    </div>


    {{-- Menu de modulos --}}
    <x-menuModulos />
    {{-- /Menu de modulos --}}
    
    @yield('modals')
    
    
    {{-- Selectr --}}
    <script src="https://cdn.jsdelivr.net/gh/mobius1/selectr@latest/dist/selectr.min.js" type="text/javascript"></script>
    {{-- App js --}}
    <script src="{{ asset('js/app.js') }}"></script>
    
    <script type="text/javascript">
    	
    	{{-- Verificar si hay mensajes que mostrar --}}
    	
        {{-- Mensaje por error de validación --}}
        @if($errors->any())
            f_alert.generate({
                type      : "error",
                message   : "<b>Error de validación</b>",
                details   : Object.values({{ Illuminate\Support\Js::from($errors->all()) }})
            });
        @endif
        
        
        {{-- Mensaje de estado --}}
        @if(session('status'))
            var detailsSt = [];
            @isset(session('status')['details']) 
        		detailsSt = {{ Illuminate\Support\Js::from(session('status')['details']) }}
            @endisset
            
            f_alert.generate({
                type      : "{{ session('status')['type'] }}",
                message   : "<b> {{ session('status')['message'] }} </b>",
                details   : Object.values(detailsSt)
            });
        @endif
        
        
        {{-- Mensaje personalizado --}}
    	@isset($message)
    		@if($message)
                var messageJS = {{ Illuminate\Support\Js::from($message) }};
                var detailsMJS = (typeof(messageJS.details) === "undefined") ? [] : messageJS.details;
                if(messageJS){
                    f_alert.generate({
                        type      : messageJS.type,
                        message   : "<b>" + messageJS.message + "</b>",
                        details   : Object.values(detailsMJS)
                    });
                }
    		@endif
        @endisset
        
        {{-- /Verificar si hay alertas que mostrar --}}
        
        
        
        {{-- Crear inputs selectr --}}
        
        var selectrColection = document.querySelectorAll('.selectr');
	    [].map.call(selectrColection, selectrItem => {
	    	new Selectr( selectrItem, {
            	placeholder: "&nbsp"
            });
	    });
	    {{-- /Crear inputs selectr --}}
        
    </script>
    
    {{-- Scripts --}}
    @yield('scripts')
    
</body>
</html>