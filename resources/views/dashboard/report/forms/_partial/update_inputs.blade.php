<div class="c__block">


    <div class="c__flex">

        <div class="c__flex_50 c__flex_50_left">


            <div class="text_input pad_t6_important">
                <span class="blue_label">Периуд медиации изменить нельзя</span>

                <div class="birthdate_wrap">

                    <div class="birthdate">


                        <div class="birthdate_pic" style="padding-left: 0">
                            {{ rusdate_month($report->created_at) }}
                            <input type="hidden" name="month" value="{{ $report->created_at }}" />
                        </div>
                    </div>
                </div>

            </div>


            <hr>


            <div class="text_input">
                <span class="blue_label">Семейная медиация</span>
                <div class="selectClass _sem">
                    <select class="js-chosen" data-placeholder="Количество проведенных медиаций" name="sem"
                            id="registerSem">

                        <option value="">0</option>
                        {!!  $user->UserHtmlReportOptions($report->sem) !!}


                    </select>
                    <label class="labelInput show" for="registerSem"></label>
                    <x-forms.error class="error_sem"/>
                </div>

            </div>


            <div class="text_input">
                <span class="blue_label">Уголовная медиация</span>
                <div class="selectClass _ugo">
                    <select class="js-chosen" data-placeholder="Количество проведенных медиаций" name="ugo"
                            id="registerUgo">

                        <option value="">0</option>
                        {!!  $user->UserHtmlReportOptions($report->ugo) !!}


                    </select>
                    <label class="labelInput show" for="registerUgo"></label>
                    <x-forms.error class="error_ugo"/>
                </div>

            </div>


            <div class="text_input">
                <span class="blue_label">Гражданская медиация</span>
                <div class="selectClass _gra">
                    <select class="js-chosen" data-placeholder="Количество проведенных медиаций" name="gra"
                            id="registerGra">

                        <option value="">0</option>
                        {!!  $user->UserHtmlReportOptions($report->gra) !!}


                    </select>
                    <label class="labelInput show" for="registerGra"></label>
                    <x-forms.error class="error_gra"/>
                </div>

            </div>

            <div class="text_input">
                <span class="blue_label">Ювенальная медиация</span>
                <div class="selectClass _uve">
                    <select class="js-chosen" data-placeholder="Количество проведенных медиаций" name="uve"
                            id="registerUve">

                        <option value="">0</option>
                        {!!  $user->UserHtmlReportOptions($report->uve) !!}


                    </select>
                    <label class="labelInput show" for="registerUve"></label>
                    <x-forms.error class="error_uve"/>
                </div>

            </div>

            <div class="text_input">
                <span class="blue_label">Корпоративная медиация</span>
                <div class="selectClass _kor">
                    <select class="js-chosen" data-placeholder="Количество проведенных медиаций" name="kor"
                            id="registerKor">

                        <option value="">0</option>
                        {!!  $user->UserHtmlReportOptions($report->kor) !!}


                    </select>
                    <label class="labelInput show" for="registerKor"></label>
                    <x-forms.error class="error_kor"/>
                </div>

            </div>

            <div class="text_input">
                <span class="blue_label">Трудовые споры</span>
                <div class="selectClass _tru">
                    <select class="js-chosen" data-placeholder="Количество проведенных медиаций" name="tru"
                            id="registerTru">

                        <option value="">0</option>
                        {!!  $user->UserHtmlReportOptions($report->tru) !!}


                    </select>
                    <label class="labelInput show" for="registerTru"></label>
                    <x-forms.error class="error_tru"/>
                </div>

            </div>

            <div class="text_input">
                <span class="blue_label">Банковские споры</span>
                <div class="selectClass _ban">
                    <select class="js-chosen" data-placeholder="Количество проведенных медиаций" name="ban"
                            id="registerBan">

                        <option value="">0</option>
                        {!!  $user->UserHtmlReportOptions($report->ban) !!}


                    </select>
                    <label class="labelInput show" for="registerBan"></label>
                    <x-forms.error class="error_ban"/>
                </div>

            </div>


        </div><!--.c__flex_50_left-->

        <div class="c__flex_50 c__flex_50_right">

            <div class="text_input">
                <div class="medi_summ">

                    @if($report->desc )

                        <div class="suret_text desc">
                            <h3>Сообщение модератора</h3>
                            {!! $report->desc !!}
                        </div>
                    @endif
                </div>

            </div>


        </div><!--.c__flex_50_right-->

    </div><!--.c__flex-->
</div>
