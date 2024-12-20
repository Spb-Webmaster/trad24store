<div class="c__block">
    <div class="c__flex">
        <div class="c__flex_100">
            <div class="text_input">
                <span class="blue_label">Реестр медиаторов</span>
                <div class="selectClass _type">
                    <select class="js-chosen" data-placeholder="Выбрать тип медиатора" name="type" id="registerType">

                        @foreach($user->types as $type)
                            <option value="{{ $type->id }}"
                            @if($user->user_type)
                                @if($user->user_type->id == $type->id)
                                    {{ 'selected' }}
                                    @endif
                                @endif>{{ $type->title }}</option>

                        @endforeach
                    </select>
                    <label class="labelInput show" for="registerType"></label>
                    <x-forms.error class="error_type"/>
                </div>

            </div>


        </div>
    </div>
</div>

<div class="c__block registerCompany__js @if($user->user_type->id != 2) display_none @endif ">
    <div class="c__flex">
        <div class="c__flex_100">
            <div class="text_input">
                <x-forms.text-input_fromLabel
                    type="text"
                    id="registerCompany"
                    name="company"
                    placeholder="Организация"
                    value="{{ (old('company'))?:((isset($user->company))?$user->company:'')  }}"
                    class="input company"
                    :isError="$errors->has('company')"
                />
                <x-forms.error class="error_company"/>

            </div>


        </div>
    </div>
</div>

<div class="c__block">
    <div class="c__flex">
        <div class="c__flex_100">
            <div class="text_input">
                <span class="blue_label">Город медиации</span>
                <div class="selectClass _city">
                    <select class="js-chosen" data-placeholder="Выбрать город" multiple name="city[]" id="registerCity">

                        @foreach($user->cities as $city)
                            <option value="{{ $city->id }}"
                            @if($user->city)
                                @foreach($user->city as $c)
                                    @if($c == $city->title)
                                        {{ 'selected' }}
                                        @endif
                                    @endforeach
                                @endif>{{ $city->title }}</option>

                        @endforeach
                    </select>
                    <label class="labelInput show" for="registerCity"></label>
                    <x-forms.error class="error_city"/>
                </div>

            </div>


        </div>
    </div>
</div>

<div class="c__block">

    <div class="blue_label">Адрес / Улица / Дом</div>

    <div class="c__flex">

        <div class="c__flex_33 c__flex_33_left">

            <div class="text_input">
                <x-forms.text-input_fromLabel
                    type="text"
                    id="registerStreet"
                    name="street"
                    placeholder="Улица"
                    value="{{ (old('street'))?:((isset($user->street))?$user->street:'')  }}"
                    class="input street"
                    :isError="$errors->has('street')"
                />
                <x-forms.error class="error_street"/>
            </div>

        </div><!--.c__flex_33_left-->

        <div class="c__flex_33 c__flex_33_center">


            <div class="text_input">
                <x-forms.text-input_fromLabel
                    type="text"
                    id="registerHome"
                    name="home"
                    placeholder="Дом"
                    value="{{ (old('home'))?:((isset($user->home))?$user->home:'')  }}"
                    class="input home"
                    :isError="$errors->has('home')"
                />
                <x-forms.error class="error_home"/>
            </div>

        </div><!--.c__flex_33_cebter-->
        <div class="c__flex_33 c__flex_33_right">


            <div class="text_input">
                <x-forms.text-input_fromLabel
                    type="text"
                    id="registerOffice"
                    name="office"
                    placeholder="Офис/квартира"
                    value="{{ (old('office'))?:((isset($user->office))?$user->office:'')  }}"
                    class="input office"
                    :isError="$errors->has('office')"
                />
                <x-forms.error class="error_office"/>
            </div>

        </div><!--.c__flex_33_right-->

    </div><!--.c__flex-->
</div>

<div class="c__block">

    <div class="c__flex">

        <div class="c__flex_50 c__flex_50_left">

            <div class="text_input">
                <span class="blue_label">Пол</span>
                <div class="selectClass _sex">
                    <select class="js-chosen" data-placeholder="Выбрать пол" name="sex" id="registerSex">

                        <option value="">Выбрать пол</option>
                        <option value="Мужчина" @if($user->sex == 'Мужчина')
                            {{ 'selected' }}
                            @endif>Мужчина
                        </option>
                        <option value="Женщина" @if($user->sex == 'Женщина')
                            {{ 'selected' }}
                            @endif>Женщина
                        </option>


                    </select>
                    <label class="labelInput show" for="registerSex"></label>
                    <x-forms.error class="error_sex"/>
                </div>

            </div>


        </div><!--.c__flex_50_left-->

        <div class="c__flex_50 c__flex_50_right">

            <div class="text_input">
                <span class="blue_label">Статус</span>
                <div class="selectClass _status">
                    <select class="js-chosen" data-placeholder="Выбрать статус" name="status" id="registerStatus">


                        <option value="1" @if($user->status == 1)
                            {{ 'selected' }}
                            @endif>Действующий
                        </option>
                        <option value="0" @if($user->status == 0)
                            {{ 'selected' }}
                            @endif>Приостановлен
                        </option>


                    </select>
                    <label class="labelInput show" for="registerStatus"></label>
                    <x-forms.error class="error_status"/>
                </div>

            </div>


        </div><!--.c__flex_50_right-->

    </div><!--.c__flex-->
</div>

<div class="c__block">
    <div class="c__flex">
        <div class="c__flex_100">
            <div class="text_input">
                <span class="blue_label">Язык проведения медиации</span>
                <div class="selectClass _language">
                    <select class="js-chosen" data-placeholder="Выбрать язык" multiple name="language[]"
                            id="registerLanguage">

                        @foreach($user->languages as $language)
                            <option value="{{ $language->id }}"
                            @if(isset($user->user_language))
                                @foreach($user->user_language as $c)
                                    @if($c->title == $language->title)
                                        {{ 'selected' }}
                                        @endif
                                    @endforeach
                                @endif>{{ $language->title }}</option>

                        @endforeach
                    </select>
                    <label class="labelInput show" for="registerLanguage"></label>
                    <x-forms.error class="error_language"/>
                </div>

            </div>


        </div>
    </div>
</div>

<div class="c__block">
    <div class="c__flex">
        <div class="c__flex_100">
            <div class="text_input">
                <span class="blue_label">Виды медиации</span>
                <div class="selectClass _list">
                    <select class="js-chosen" data-placeholder="Виды медиации" multiple name="list[]" id="registerList">

                        @foreach($user->lists as $list)
                            <option value="{{ $list->id }}"
                            @if(isset($user->user_list))
                                @foreach($user->user_list as $c)
                                    @if($c->title == $list->title)
                                        {{ 'selected' }}
                                        @endif
                                    @endforeach
                                @endif>{{ $list->title }}</option>

                        @endforeach
                    </select>
                    <label class="labelInput show" for="registerList"></label>
                    <x-forms.error class="error_list"/>
                </div>

            </div>


        </div>
    </div>
</div>

<div class="c__block">

    <div class="c__flex">
        <div class="c__flex_100">
            <div class="text_input textarea_input">
                <x-forms.textarea
                    type="textarea"
                    name="certificate"
                    placeholder="Сертификат"
                    value="{!!  (isset($user->certificate))? strip_tags($user->certificate, '<code><b><i><strong>') : (old('certificate')?:'') !!}"
                    class="input certificate"
                />
                <x-forms.error class="error_certificate"/>

            </div>


        </div>
    </div>

    <div class="c__flex">
        <div class="c__flex_100">
            <div class="text_input textarea_input">
                <x-forms.textarea
                    type="textarea"
                    name="sphere"
                    placeholder="Сфера специализации"
                    value="{!!  (isset($user->sphere))? strip_tags($user->sphere, '<code><b><i><strong>') : (old('sphere')?:'') !!}"
                    class="input sphere"
                />
                <x-forms.error class="error_sphere"/>

            </div>


        </div>
    </div>

    <div class="c__flex">
        <div class="c__flex_100">
            <div class="text_input textarea_input">
                <x-forms.textarea
                    type="textarea"
                    name="oput"
                    placeholder="Опыт работы"
                    value="{!!  (isset($user->oput))? strip_tags($user->oput, '<code><b><i><strong>') : (old('oput')?:'') !!}"
                    class="input oput"
                />
                <x-forms.error class="error_oput"/>

            </div>


        </div>
    </div>


    <div class="c__flex">
        <div class="c__flex_100">
            <div class="text_input textarea_input">
                <x-forms.textarea
                    type="textarea"
                    name="dop"
                    placeholder="Дополнительно"
                    value="{!!  (isset($user->dop))? strip_tags($user->dop, '<code><b><i><strong>') : (old('dop')?:'') !!}"
                    class="input dop"
                />
                <x-forms.error class="error_dop"/>

            </div>


        </div>
    </div>
</div>
