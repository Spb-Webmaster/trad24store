<div class="c__block">

    <div class="c__flex">

        <div class="c__flex_50 c__flex_50_left">


            <div class="text_input pad_t6_important">
                <span class="blue_label">Выбрать периуд медиации</span>

                <div class="birthdate_wrap">

                        <div class="birthdate">

                            <span>{{ __('Учитывается месяц') }}</span>

                            <div class="birthdate_pic">
                                <input type="text" name="month" class="datepicker_report__js datepicker-birthdate" value=""/>
                                <a href="javascript:void(0);" class="datepicker-birthdate_result"
                                   id="alternate">{{ __('Выбрать') }}</a>
                            </div>
                        </div>
                </div>

            </div>


            <hr>



            <div class="text_input">
                <span class="blue_label">Количество проведенных медиаций</span>
                <div class="selectClass _sem">
                    <select class="js-chosen" data-placeholder="Количество проведенных медиаций" name="sem"
                            id="registerSem">

                        <option value="">Семейная медиация</option>
                        {!!  $user->user_html_report_options !!}


                    </select>
                    <label class="labelInput show" for="registerSem"></label>
                    <x-forms.error class="error_sem"/>
                </div>

            </div>


            <div class="text_input">
                <span class="blue_label">Количество проведенных медиаций</span>
                <div class="selectClass _ugo">
                    <select class="js-chosen" data-placeholder="Количество проведенных медиаций" name="ugo"
                            id="registerUgo">

                        <option value="">Уголовная медиация</option>
                        {!!  $user->user_html_report_options !!}


                    </select>
                    <label class="labelInput show" for="registerUgo"></label>
                    <x-forms.error class="error_ugo"/>
                </div>

            </div>


            <div class="text_input">
                <span class="blue_label">Количество проведенных медиаций</span>
                <div class="selectClass _gra">
                    <select class="js-chosen" data-placeholder="Количество проведенных медиаций" name="gra"
                            id="registerGra">

                        <option value="">Гражданская медиация</option>
                        {!!  $user->user_html_report_options !!}


                    </select>
                    <label class="labelInput show" for="registerGra"></label>
                    <x-forms.error class="error_gra"/>
                </div>

            </div>

            <div class="text_input">
                <span class="blue_label">Количество проведенных медиаций</span>
                <div class="selectClass _uve">
                    <select class="js-chosen" data-placeholder="Количество проведенных медиаций" name="uve"
                            id="registerUve">

                        <option value="">Ювенальная медиация</option>
                        {!!  $user->user_html_report_options !!}


                    </select>
                    <label class="labelInput show" for="registerUve"></label>
                    <x-forms.error class="error_uve"/>
                </div>

            </div>

            <div class="text_input">
                <span class="blue_label">Количество проведенных медиаций</span>
                <div class="selectClass _kor">
                    <select class="js-chosen" data-placeholder="Количество проведенных медиаций" name="kor"
                            id="registerKor">

                        <option value="">Корпоративная медиация</option>
                        {!!  $user->user_html_report_options !!}


                    </select>
                    <label class="labelInput show" for="registerKor"></label>
                    <x-forms.error class="error_kor"/>
                </div>

            </div>

            <div class="text_input">
                <span class="blue_label">Количество проведенных медиаций</span>
                <div class="selectClass _tru">
                    <select class="js-chosen" data-placeholder="Количество проведенных медиаций" name="tru"
                            id="registerTru">

                        <option value="">Трудовые споры</option>
                        {!!  $user->user_html_report_options !!}


                    </select>
                    <label class="labelInput show" for="registerTru"></label>
                    <x-forms.error class="error_tru"/>
                </div>

            </div>

            <div class="text_input">
                <span class="blue_label">Количество проведенных медиаций</span>
                <div class="selectClass _ban">
                    <select class="js-chosen" data-placeholder="Количество проведенных медиаций" name="ban"
                            id="registerBan">

                        <option value="">Банковские споры</option>
                        {!!  $user->user_html_report_options !!}


                    </select>
                    <label class="labelInput show" for="registerBan"></label>
                    <x-forms.error class="error_ban"/>
                </div>

            </div>


        </div><!--.c__flex_50_left-->

        <div class="c__flex_50 c__flex_50_right">

            <div class="text_input">
                <div class="medi_summ">
                    @if($user->user_mediator_sum==0)

                        <div class="em_18">Вы пока не создали ни одного отчета о проведенных медиациях</div>
                    @else

                        <div class="em_18">Общее количество проведенных медиаций <br><br><span
                                class="b_36">{{ $user->user_mediator_sum }}</span></div>
                    @endif

                </div>

            </div>


        </div><!--.c__flex_50_right-->

    </div><!--.c__flex-->
</div>
