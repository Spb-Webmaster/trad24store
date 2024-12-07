    <div class="F_form  F_form_order_mini" style="display: none" id="feedback" data-token="{{ csrf_token() }}">
        @honeypot
        <x-forms.loader class="br_12"/>
        @include('include.modals.modal.responce.responce', ['feedback'=> config('site.constants.responce_feedback')])
        <div class="F_form__body new__temp">
            <div class="new__temp_top">

                <div class="F_form__flex">
                    <div class="F_form__left">
                        <div class="F_h1"><span>{{ __('Оставить отзыв') }}</span></div>
                        <div class="F_h2" ><span>{{__('Оставьте отзыв, он появится после модерации')}}</span></div>
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
                    <x-forms.textarea
                        type="textarea"
                        name="feedback"
                        placeholder="Отзыв"
                        value="{{ old('feedback')?:'' }}"
                        required="true"
                        class="input feedback"
                    />
                    <x-forms.error class="error_feedback"/>

                </div>

                 <div class="text_input">
                     @include('pages.users.partial.stars_checked', ['star' => 0, 'name' => 'feedback_star'])

                </div>


                <div class="text_input pad_t26_important">
                    <x-forms.text-input
                        type="hidden"
                        name="crm"
                        value="crm"
                    />


                <x-forms.button_call_me class="button_normal feedback__js">
                    {{__('Оставить отзыв')}}
                </x-forms.button_call_me>
                </div>
</div><!--.alax_inputs-->


            </div><!--.new__temp_middle-->
        </div><!--.F_form__body-->
    </div><!--.F_form-->

