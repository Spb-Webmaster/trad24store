<div class="formCabinet">
    <x-forms.auth-form
        title=""
        subtitle=""
        action="{{ route('setting_full.handel') }}"
        method="POST"
        enctype="multipart/form-data"
    >

        <div class="c__title_subtitle">
            <h3 class="F_h1">{{ __('Редактировать профиль') }}</h3>
            <div class="F_h2 pad_t5"><span>{{__('Изменения будут проверены модератоом')}}</span></div>
        </div>

           @include('dashboard.forms.partial._inputs_chosen')


        <div class="c__title_subtitle pad_t26">
            <h3 class="F_h1">{{ __('Контактные данные') }}</h3>
            <div class="F_h2 pad_t5"><span>{{__('Изменения будут проверены модератоом')}}</span></div>
        </div>

           @include('dashboard.forms.partial._inputs_social')

        <div class="slotButtons slotButtons__right pad_t15">
            <div class=" text_input w_30">
                <input type="hidden" value="{{ $user->id  }}" name="id">
                <x-forms.primary-button>
                    {{ __('Изменить профиль') }}
                </x-forms.primary-button>
            </div>
        </div>

    </x-forms.auth-form>

</div>



