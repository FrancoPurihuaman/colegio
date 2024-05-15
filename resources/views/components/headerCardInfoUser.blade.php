{{--  
|--------------------------------------------------------------------------
| Tarjeta de información de usurio logeado (cabezera de pagina)
|--------------------------------------------------------------------------
|
| En este componente se muestra información del usuario logeado,
| más opciones según se requiera y botón de cierre de seción.
| Este componente debe ser usado en la cabezera de pagina.
|
--}}



<div class="f_user--forheader">
    <div class="f_user__image f_noselectable" id="btnToggleUserHeader"><img alt="" src="{{ auth()->user()->getPhoto }}"></div>
    <div class="f_user__card" id="cardUserHeader">
        <div class="f_user__info">
            <div class="f_user__image f_noselectable"><img alt="" src="{{ auth()->user()->getPhoto }}"></div>
            <div class="f_user__description">
                <span class="f_user__name">{{ auth()->user()->name }}</span>
                <span class="f_user__type">{{ auth()->user()->tipoUsuario->TPU_NOMBRE }}</span>
            </div>
        </div>
        <div class="f_user__actions">
            <ul>
                <li><a href="#">Mi perfil</a></li>
                <li><a href="#">Soporte</a></li>
                <li>
                	<form action="{{ route('logout') }}" method="post">
                		@csrf
                		<button type="submit" class="f_button--light">Cerrar sesión</button>
                	</form>
            	</li>
            </ul>
        </div>
        <div class="f_user__card_footer">
            <i class="fas fa-info-circle"></i>
            <span>Terminos y condiciones reservados</span>
        </div>
    </div>
</div>