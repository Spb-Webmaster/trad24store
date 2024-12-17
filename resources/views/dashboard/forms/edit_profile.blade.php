<div class="formCabinet">
    <x-forms.auth-form
        title=""
        subtitle=""
        action="{{ route('setting.handel') }}"
        method="POST"
        enctype="multipart/form-data"
    >

           @include('dashboard.forms.partial._inputs')

        <div class="slotButtons slotButtons__right pad_t15">
            <div class=" text_input w_30">
                <input type="hidden" value="{{ $user->id  }}" name="id">
                <x-forms.primary-button>
                    {{ __('Изменить личные данные') }}
                </x-forms.primary-button>
            </div>
        </div>

    </x-forms.auth-form>

</div>



