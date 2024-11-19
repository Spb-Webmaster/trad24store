<div class="F_form F_form_search_diplom" id="search_diplom">



    <div class="new__temp_middle">
        <x-forms.loader class="br_12"/>
        @include('include.modals.modal.responce.responce')
        <div class="new__temp_middle_search_diplom">




            <div class="form_text">
            </div>

            <div class="alax_inputs__flex">
                <div class="i__left">

                    <div class="text_input _diplom_title">
                        <x-forms.text-input_fromLabel
                            type="text"
                            name="diplom_title"
                            placeholder="Номер диплома"
                            value="{{ old('Номер диплома')?:'' }}"
                            class="input diplom_title"
                        />
                        <x-forms.error class="error_diplom_title"/>


                    </div>
                    <div class="text_input _diplom_name">
                        <x-forms.text-input_fromLabel
                            type="text"
                            name="diplom_name"
                            placeholder="ФИО слушателя"
                            value="{{ old('ФИО слушателя')?:'' }}"
                            class="input diplom_name"
                        />
                        <x-forms.error class="error_diplom_name"/>

                    </div>

                </div>

                <div class="i__right">

                    <div class="text_input">
                        <x-forms.button_call_me class="button_normal search_diplom__js">
                            {{__('Искать')}}
                        </x-forms.button_call_me>

                    </div>
                    <div class="text_input">

                        <x-forms.button_call_me class="button_normal form_clear clear_form__js">
                            {{__('Очистить')}}
                        </x-forms.button_call_me>
                    </div>

                </div>
            </div><!--.alax_inputs__flex-->


        </div>
    </div><!--.new__temp_middle-->

   <div class="F_form_search_diplom__result" id="diplom__result">

   </div>

</div><!--.F_form_search_diplom-->


