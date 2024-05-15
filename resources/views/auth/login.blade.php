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
    <!-- Style css -->
    <link rel="stylesheet" href="{{ asset('css/access.css') }}">
    
	<style type="text/css">
         /*.f_content-access{
             background-repeat: no-repeat;
             background-position: center center;
             background-image: url({{ asset('img/fondo-botica.png') }});
             background-size: cover;
         }*/
    </style>
</head>
<body class="f_web-page" style="background-color: #e9ecef;">

    <!-- Contenido principal -->
    <div class="f_content-access">
    
        <div style="text-align: center; margin-bottom: 2rem;">
            <img src="{{ asset('img/logo.png') }}" width="100px" height="100px">
        </div>
        <div>
            <div class="f_access">
                <div class="f_access__title">Autentificación</div>
                <form action="login" method="post">
                	@csrf
                	
                	@if($errors->any())
            		<div class="f_alert f_alert--static danger" style="margin-bottom: 16px">
                		@foreach($errors->all() as $error)
                		<div>{{ $error }}</div>
                		@endforeach
            		</div>
                	@endif
                	
                    <div>
                        <span class="f_access__input-group">
                            <input type="text" name="email" placeholder="Email">
                            <span><i class="fas fa-at"></i></span>
                        </span>
                    </div>
                    <div>
                        <span class="f_access__input-group">
                            <input type="password" name="password" placeholder="Password">
                            <span><i class="fas fa-lock"></i></span>
                        </span>
                    </div>
                    <div class="f_access__actions">
                        <div style="width: 40%;">
                            <button type="submit" class="f_button f_button--default">Acceder</button>
                        </div>
                        <div style="width: 60%; text-align: right;">
                            <a href="#" style="font-size: .7rem; float: right;">Olvidaste tu Contraseña?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>