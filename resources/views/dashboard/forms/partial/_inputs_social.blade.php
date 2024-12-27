<div class="c__block">

    <div class="c__flex">

        <div class="c__flex_50 c__flex_50_left">

            <div class="text_input">
                <span class="blue_label">Показать в профиле</span>
                <div class="selectClass _active_contact">
                    <select class="js-chosen" data-placeholder="Показать в профиле" name="active_contact" id="registerActive_contact">

                        <option value="1" @if($user->active_contact)
                            {{ 'selected' }}
                            @endif>Да
                        </option>
                        <option value="0" @if($user->active_contact == 0)
                            {{ 'selected' }}
                            @endif>Нет
                        </option>


                    </select>
                    <label class="labelInput show" for="registerActive_contact"></label>
                    <x-forms.error class="error_active_contact"/>
                </div>

            </div>


        </div><!--.c__flex_50_left-->

        <div class="c__flex_50 c__flex_50_right">

            <div class="text_input">
                <div class="active_contact">{{ config('site.constants.active_contact_text') }}</div>


            </div>


        </div><!--.c__flex_50_right-->

    </div><!--.c__flex-->
</div>

<div class="c__block">

    <div class="c__flex">
        <div class="c__flex_100">
            <div class="text_input">
                <x-forms.text-input_fromLabel
                    type="text"
                    id="registerTelegram"
                    name="telegram"
                    placeholder="Telegram"
                    value="{{ (old('telegram'))?:((isset($user->telegram))?$user->telegram:'')  }}"
                    class="input telegram"
                    :isError="$errors->has('telegram')"
                />
                <x-forms.error class="error_telegram"/>
            </div>


        </div>
    </div>
</div>

<div class="c__block">
    <div class="c__flex">
        <div class="c__flex_100">
            <div class="text_input">
                <x-forms.text-input_fromLabel
                    type="text"
                    id="registerWhatsapp"
                    name="whatsapp"
                    placeholder="Whatsapp"
                    value="{{ (old('whatsapp'))?:((isset($user->whatsapp))?$user->whatsapp:'')  }}"
                    class="input whatsapp"
                    :isError="$errors->has('whatsapp')"
                />
                <x-forms.error class="error_whatsapp"/>
            </div>


        </div>
    </div>
</div>

<div class="c__block">
    <div class="c__flex">
        <div class="c__flex_100">
            <div class="text_input">
                <x-forms.text-input_fromLabel
                    type="text"
                    id="registerInstagram"
                    name="instagram"
                    placeholder="Instagram"
                    value="{{ (old('instagram'))?:((isset($user->instagram))?$user->instagram:'')  }}"
                    class="input instagram"
                    :isError="$errors->has('instagram')"
                />
                <x-forms.error class="error_instagram"/>
            </div>


        </div>
    </div>
</div>

<div class="c__block">
    <div class="c__flex">
        <div class="c__flex_100">
            <div class="text_input">
                <x-forms.text-input_fromLabel
                    type="text"
                    id="registerSocial"
                    name="social"
                    placeholder="Соц. сеть"
                    value="{{ (old('social'))?:((isset($user->social))?$user->social:'')  }}"
                    class="input social"
                    :isError="$errors->has('social')"
                />
                <x-forms.error class="error_social"/>
            </div>


        </div>
    </div>
</div>

<div class="c__block">
    <div class="c__flex">
        <div class="c__flex_100">
            <div class="text_input">
                <x-forms.text-input_fromLabel
                    type="text"
                    id="registerWebsite"
                    name="website"
                    placeholder="Web Site"
                    value="{{ (old('website'))?:((isset($user->website))?$user->website:'')  }}"
                    class="input website"
                    :isError="$errors->has('website')"
                />
                <x-forms.error class="error_website"/>
            </div>


        </div>
    </div>
</div>
