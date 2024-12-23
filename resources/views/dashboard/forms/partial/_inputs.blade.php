<div class="c__flex">
    <div class="c__flex_50 c__flex_50_left">

        <div class="text_input">
            <x-forms.text-input_fromLabel
                type="text"
                id="registerName"
                name="name"
                placeholder="Имя"
                value="{{ (old('name'))?:((isset($user->name))?$user->name:'') }}"
                class="input name"
                required="true"
                :isError="$errors->has('name')"
            />
            <x-forms.error class="error_name"/>
        </div>

        <div class="text_input">
            <x-forms.text-input_fromLabel
                type="text"
                id="registerPhone"
                name="phone"
                placeholder="Номер телефона"
                required="true"
                class="input phone"
                value="{{ (old('phone'))?:((isset($user->phone))?$user->phone:'')  }}"
                :isError="$errors->has('phone')"
            />
            <x-forms.error class="error_phone"/>

        </div>





    </div><!--.c__flex_50_left-->

    <div class="c__flex_50 c__flex_50_right">
        <div class="text_input">
            <x-forms.text-input_fromLabel
                type="text"
                id="registerUsername"
                name="username"
                placeholder="ФИО*"
                value="{{ (old('username'))?:((isset($user->username))?$user->username:'')  }}"
                class="input username"
                required="true"
                :isError="$errors->has('username')"
            />
            <x-forms.error class="error_username"/>
        </div>

        <div class="text_input ">

            <div class="birthdate_wrap">
                @if(isset($user->birthday))
                    <div class="birthdate">
                        {{ __('Дата рождения') }}

                        <div class="birthdate_pic">
                            <input type="text" name="birthday" class="datepicker__js datepicker-birthdate"
                                   value="{{ ((isset($user->birthday))?$user->birthday:'') }}"/>
                            <a href="javascript:void(0);" class="datepicker-birthdate_result"
                               id="alternate">{{ rusdate3($user->birthday) }}</a>
                        </div>
                    </div>
                @else
                    <div class="birthdate">

                        <span>{{ __('Дата рождения') }}</span>

                        <div class="birthdate_pic">
                            <input type="text" name="birthday" class="datepicker__js datepicker-birthdate" value="1970-01-01"/>
                            <a href="javascript:void(0);" class="datepicker-birthdate_result"
                               id="alternate">{{ __('Добавить') }}</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>



    </div><!--.c__flex_50_right-->

</div><!--.c__flex-->

