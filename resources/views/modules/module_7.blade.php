<div class="F_form F_form_blue" id="send_form" data-token="{{ csrf_token() }}">



<div class="new__temp_middle">
        <x-forms.loader class="br_12"/>
        @include('include.modals.modal.responce.responce')
        <div class=" new__temp_middle_blue">




                <div class="form_text">
                    Оставьте заявку - мы обсудим ваши цели и подберем решения
                </div>

            <div class="alax_inputs__flex">
                <div class="i__left">

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

                </div>

                <div class="i__right">

                <div class="text_input">
                    <x-forms.text-input_fromLabel
                        type="email"
                        name="email"
                        placeholder="Email"
                        value="{{ old('email')?:'' }}"
                        required="true"
                        class="input email"
                    />
                    <x-forms.error class="error_email"/>

                </div>
                <div class="text_input">
                    <x-forms.text-input
                        type="hidden"
                        name="crm"
                        value="crm"
                    />
                    <x-forms.button_call_me class="button_normal send_form__js">
                        {{__('Отправить заявку')}}
                    </x-forms.button_call_me>
                </div>

                </div>
            </div><!--.alax_inputs__flex-->


        </div>
</div><!--.new__temp_middle-->

</div><!--.F_form_blue-->


