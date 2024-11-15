<div class="F_form  F_form_order_mini" style="display: none" id="bid">
    @honeypot
    <x-forms.loader class="br_12"/>
    @include('include.modals.modal.responce.responce')
    <div class="F_form__body new__temp">
        <div class="new__temp_top">

            <div class="F_form__flex">
                <div class="F_form__left">
                    <div class="F_h1"><span>{{ __('Отправить заявку') }}</span></div>
                    <div class="F_h2"><span>{{__('Оставьте заявку и мы Вам перезвоним')}}</span></div>
                </div>
            </div>


        </div><!--.new__temp_top-->


        <div class="new__temp_middle">
            <div class="alax_inputs">

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


                <div class="text_input">
                    <div class="selectClass type">
                        <select class="js-chosen" name="type" id="registerType">

                            <option value="">{{ __('Выбрать услугу') }}</option>
                            <option value="1">{{ __('Обучение') }}</option>
                            <option value="2">{{ __('Услуги медиатора') }}</option>

                        </select>
                        <label class="labelInput show" for="registerType"></label>
                        <x-forms.error class="error_type"/>
                    </div>

                </div>

 <div class="_service_mediator__js display_none">

                    <div class="text_input">
                        <div class="selectClass m_training">
                            <select class="js-chosen" name="m_training" id="registerM_training">
                                <option value="">Пройти обучение</option>

                                @if(config2('moonshine.setting.json_training'))
                                    @foreach(config2('moonshine.setting.json_training') as $training)
                                        <option value="{{ $training['json_training_label'] }}">{{ $training['json_training_label'] }}</option>
                                    @endforeach
                                @endif

                            </select>
                            <label class="labelInput show" for="registerM_training"></label>
                            <x-forms.error class="error_m_training"/>

                        </div>

                    </div>
</div>

<div class="_training_mediator__js display_none">
    <div class="text_input">
        <div class="selectClass m_service">
            <select class="js-chosen" name="m_service" id="registerM_service">
                <option value="">Выбрать услуги медиации</option>

                @if(config2('moonshine.setting.json_service'))
                    @foreach(config2('moonshine.setting.json_service') as $service)
                        <option value="{{ $service['json_service_label'] }}">{{ $service['json_service_label'] }}</option>
                    @endforeach
                @endif


            </select>
            <label class="labelInput show" for="registerM_service"></label>
            <x-forms.error class="error_m_service"/>

        </div>

    </div>

</div>





                <div class="text_input pad_t26_important">
                    <x-forms.text-input
                        type="hidden"
                        name="crm"
                        value="crm"
                    />
                    <x-forms.button_call_me class="button_normal  bid__js">
                        {{__('Отправить заявку')}}
                    </x-forms.button_call_me>
                </div>
            </div><!--.alax_inputs-->


        </div><!--.new__temp_middle-->
    </div><!--.F_form__body-->
</div><!--.F_form-->


