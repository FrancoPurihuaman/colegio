<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/icon.png') }}"/>
    <!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Theme css -->
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
</head>
<body class="f_web-page">

    <!-- Cabezera de pagina de pagina -->
    <header class="f_web-page__header">

        <!-- Cabezera -->
        <div class="f_header">
            <div class="menu-opciones-modulo"></div>
    
            <!-- Información addional -->
            <div class="f_header__infoAux">
                <x-headerMessage />
                <x-headerNotification />
                <x-headerCardInfoUser />
            </div>
            <!-- /Información addional -->

        </div>
    </header>
    
    
    <!-- Cuerpo de pagina -->
    <div class="f_web-page__body" style="max-width: 100%; padding: 0">

		<!-- Menu de modulos -->
        <x-menuModulos class="f_menu_modules--static"/>
        <!-- /Menu de modulos -->
        

    </div>

    
    <script src="{{ asset('js/theme.js') }}"></script>
</body>
</html>