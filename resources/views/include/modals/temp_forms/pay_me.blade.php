    <div class="F_form  F_form_order_mini" style="display: none" id="pay_me">
        @honeypot
        <x-forms.loader class="br_12"/>
        @include('include.modals.modal.responce.responce')
        <div class="F_form__body new__temp">
            <div class="new__temp_top">

                <div class="F_form__flex">
                    <div class="F_form__left">
                        <div class="F_h1"><span>{{ __('Подписка на сервисе') }}</span></div>
                        <div class="F_h2" ><span>{{__('Оставьте заявку, мы свяжемся с вами')}}</span></div>
                    </div>
                </div>

            </div><!--.new__temp_top-->


            <div class="new__temp_middle">
             <div class="alax_inputs">
                <div class="text_input">
                 <div   class="cabinet_radius12_fff green_mess">
                    <div class="subscr">
                        <div class="Y_h2">Подписка на сервисе</div>
                        <p>Вы получаете дополнительные преимущества:</p>
                        <div class="li_s">
                            <div class="li_text_s">Вы можете скрывать cкрыть отзывы</div>
                            <div class="li_text_s">Вы можете скрывать ваш рейтинг для всех пользователей</div>
                            <div class="li_text_s">Вы можете cкрыть количество проведенных медиации</div>
                            <div class="li_text_s">Ваш профиль будет доступен на портале целый год</div>
                        </div>

                    </div>
                 </div>



                </div>



                <div class="text_input pad_t26_important">
                <x-forms.button_call_me class="button_normal pay_me__js">
                    {{__('Отправить заявку')}}
                </x-forms.button_call_me>
                </div>
</div><!--.alax_inputs-->


            </div><!--.new__temp_middle-->
        </div><!--.F_form__body-->
    </div><!--.F_form-->

