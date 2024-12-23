<x-forms.auth-form
    title="{{__('Войти в личный кабинет')}}"
    action="{{ route('login.handle') }}"
    method="POST"
>



    <div class="text_input">

    <x-forms.text-input_fromLabel
        type="text"
        id="enterPhoneEmail"
        name="phone_email"
        placeholder="Номер телефона или email"
        required="true"
        class="input phone_email"
        value="{{ old('phone_email') }}"
        :isError="$errors->has('phone_email')"
    />
    <x-forms.error class="error_phone_email"/>

    </div>

    <div class="text_input">
        <x-forms.text-input
            id="loginPassword"
            type="password"
            name="password"
            placeholder="Пароль"
            required="true"
            :isError="$errors->has('email')"
        />
    </div>


    <x-slot:buttons>
        <div class="pageLogin__slotButtons slotButtons">
            <div class="slotButtons__flex">
                <div class="slotButtons__left">
                    <a href="{{ route('forgot') }}" class="">{{ __('Забыли пароль?') }}</a>
                </div>
                <div class="slotButtons__right">
                    <x-forms.primary-button>
                        {{ __('Войти') }}
                    </x-forms.primary-button>
                </div>
            </div>
            <div class="slotButtons__bottom">
                <a class="button_big button_gray wi100"
                   href="{{ route('register') }}"><span>{{ __('Регистрация') }}</span></a>
            </div>
        </div>
    </x-slot:buttons>
</x-forms.auth-form>
