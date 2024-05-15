{{--  
|--------------------------------------------------------------------------
| Notificación (cabezera de pagina)
|--------------------------------------------------------------------------
|
| En este componente se muestran las notificaciones recibidas.
| Este componente debe ser usado en la cabezera de pagina.
|
--}}


<div class="f_header__notification">
    <div class="f_header__notification_toggle" id="btnToggleNotificationHeader">
        <i class="fas fa-bell"><span class="amount">1</span></i>
    </div>
    <div class="f_notification__card" id="cardNotificationHeader">
        <div class="f_notification__links">
            <a class="f_notification__link" href="#">
                <div class="f_notification__image f_noselectable"><span><i class="fas fa-cog"></i></span></div>
                <div class="f_notification__description">
                    <div class="f_notification__info">
                        <div class="f_notification__sender">
                            Jhon Doe
                        </div>
                        <div class="f_notification__time">hace 2 horas</div>
                    </div>
                    <div class="f_notification__messaje">
                        Genero una copia de la base de datos
                    </div>
                </div>
            </a>
            <a class="f_notification__link" href="#">
                <div class="f_notification__image f_noselectable"><span><i class="fas fa-cog"></i></span></div>
                <div class="f_notification__description">
                    <div class="f_notification__info">
                        <div class="f_notification__sender">
                            System
                        </div>
                        <div class="f_notification__time">hace 2 horas</div>
                    </div>
                    <div class="f_notification__messaje">
                        <span>Actulaizar Stock de Antipireticos</span>
                    </div>
                </div>
            </a>
            <a class="f_notification__link" href="#">
                <div class="f_notification__image f_noselectable"><span><i class="fas fa-cog"></i></span></div>
                <div class="f_notification__description">
                    <div class="f_notification__info">
                        <div class="f_notification__sender">
                            Jhon Doe
                        </div>
                        <div class="f_notification__time">hace 2 horas</div>
                    </div>
                    <div class="f_notification__messaje">
                        Actualizar stock de paneles
                    </div>
                </div>
            </a>
        </div>
        <div class="f_notification__card_footer">
            <a href="#">ver más</a>
        </div>
    </div>
</div>