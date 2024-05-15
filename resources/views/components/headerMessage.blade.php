{{--  
|--------------------------------------------------------------------------
| Notificacions de Mensaje (cabezera de pagina)
|--------------------------------------------------------------------------
|
| En este componente se muestran notificaciones por mensajes recibidos.
| Este componente debe ser usado en la cabezera de pagina.
|
--}}



<div class="f_header__message">
    <div class="f_header__messaje_toggle" id="btnToggleMessageHeader">
        <i class="fas fa-comments"><span class="amount">2</span></i>
    </div>
    <div class="f_message__card" id="cardMessageHeader">
        <div class="f_message__links">
            <a class="f_message__link" href="#">
                <div class="f_message__image f_noselectable">
                    <img src="{{ asset('img/user1.jpg') }}" alt="">
                </div>
                <div class="f_message__description">
                    <div class="f_message__info">
                        <div class="f_message__sender">
                            Jhon Doe
                        </div>
                        <div class="f_message__time">hace 2 horas</div>
                    </div>
                    <div class="f_message__messaje">
                        Hola enviaré un nuevo stock de jarabes
                    </div>
                </div>
            </a>
            <a class="f_message__link" href="#">
                <div class="f_message__image f_noselectable">
                    <img src="{{ asset('img/user2.jpg') }}" alt="">
                </div>
                <div class="f_message__description">
                    <div class="f_message__info">
                        <div class="f_message__sender">
                            System
                        </div>
                        <div class="f_message__time">hace 2 horas</div>
                    </div>
                    <div class="f_message__messaje">
                        Necesito cambio algien?
                    </div>
                </div>
            </a>
        </div>
        <div class="f_message__card_footer">
            <a href="#">ver más</a>
        </div>
    </div>
</div>