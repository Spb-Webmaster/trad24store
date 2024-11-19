    <div class="F_form  F_form_order_mini" style="display: none" id="sign_up">
        <x-forms.loader class="br_12"/>
        @include('include.modals.modal.responce.responce')
        <div class="F_form__body new__temp">
            <div class="new__temp_top">

                <div class="F_form__flex">
                    <div class="F_form__left">
                        <div class="F_h1"><span class="lesson__js"></span></div>
                        <div class="F_h2" ><span>{{ __('Записаться на курс') }}</span></div>
                    </div>
                </div>



            </div><!--.new__temp_top-->


            <div class="new__temp_middle">
             <div class="alax_inputs">
                <div class="text_input">

                    <div class="form_lesson_flex">
                        <div class="date_lesson"><span>Дата: </span><i class="date_lesson_js"></i></div>
                        <div class="price_lesson"><span>Сумма: </span><i class="price_lesson__js"></i></div>
                    </div>

                </div>
                <div class="text_input">
                    <x-forms.text-input_fromLabel
                        type="text"
                        name="name"
                        placeholder="Имя"
                        value="{{ old('name')?:'' }}"
                        required="true"
                        class="input name"
                    />
                    <x-forms.error class="error_name"/>


                </div>

                <div class="text_input">
                    <x-forms.text-input_fromLabel
                        type="text"
                        name="phone"
                        placeholder="Телефон"
                        value="{{ old('phone')?:'' }}"
                        required="true"
                        class="input phone"
                    />
                    <x-forms.error class="error_phone"/>

                </div>
              <div class="text_input">
                    <x-forms.text-input_fromLabel
                        type="text"
                        name="email"
                        placeholder="Email"
                        value="{{ old('email')?:'' }}"
                        required="true"
                        class="input email"
                    />
                    <x-forms.error class="error_email"/>

                </div>


                <div class="text_input pad_t26_important">
                    <input type="hidden" name="date" value="" class="date_lesson_js" />
                    <input type="hidden" name="price" value="" class="price_lesson__js" />
                    <input type="hidden" name="title" value="" class="lesson__js" />
                    <input type="hidden" name="city" value="" class="city_lesson__js" />
                <x-forms.button_call_me class="button_normal sign_up__js">
                    {{__('Отправить заявку')}}
                </x-forms.button_call_me>
                </div>
</div><!--.alax_inputs-->


            </div><!--.new__temp_middle-->
        </div><!--.F_form__body-->
    </div><!--.F_form-->

