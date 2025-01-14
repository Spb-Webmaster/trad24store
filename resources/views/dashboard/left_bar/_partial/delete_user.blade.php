<div class="">
<div class="delete_user">
    <div class="c__title_subtitle ">
        <h3 class="F_h1">Удаление анкеты</h3>
        <div class="F_h2 pad_t5"><span>ВЫ можете создать запрос на удаления вашей анкеты на портале.</span></div>
    </div>

    <x-forms.auth-form
        action="{{ route('delete_user') }}"
        method="POST"
    >
        <div class=" text_input">
            <x-forms.button class="blocked active">
                {{ __('Удалить') }}
            </x-forms.button>
        </div>
    </x-forms.auth-form>
</div>
</div>
