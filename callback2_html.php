<!--============================================================================================================
============================================================|Modal|=============================================
=============================================================================================================-->
<div class="modal modal_form js_modal_form-3 fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <button type="button" class="modal_close" data-dismiss="modal"></button>
        <div class="row">
            <div class="col-xs-12">
                <h3 class="screen_title col-xs-12 col-md-8">Заказать разработку</h3>
                <div class="col-xs-12"></div>
                <p class="col-xs-12  col-md-6">Оставьте свои контактные данные, и наш менеджер перезвонит Вам.</p>
                <div class="js_orderCallOldForm" style="display:none"></div>
                <form action="https://silkepil.com.ua/callbackhandle.php" method="post"
                      class="js_feedback-3 col-xs-12 js_orderCallForm2"
                      onsubmit="fbq('track', 'leadsmmstudio'); yaCounter46140183.reachGoal('ORDER');yaCounter42743599.reachGoal('ORDER');  return true;">
                    <div class="col-xs-12 col-md-6">
                        <div class="form_box">
                            <span class="fa fa-male"></span>
                            <input id="contact_name-2" type="text" name="name" class="js_name-2"
                                   placeholder="Введите ваше имя">
                        </div>
                        <div class="form_box">
                            <span class="fa fa-phone"></span>
                            <input id="contact_phone-2" type="tel" name="phone" class="js_phone-2"
                                   placeholder="Мобильный телефон">
                        </div>
                        <button type="submit" class="link-popup">Забронировать</button>
                    </div>
                    <div class="col-xs-12 col-md-6"></div>
                </form>
				<div class="js__success_block" style="display:none"><p>Наш менеджер уже получил ваши контакты,</br>скоро вам перезвонят...</p></div>
            </div>
        </div>
    </div>
</div>