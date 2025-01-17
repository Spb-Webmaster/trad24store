<div class="formCabinet">
    <x-forms.auth-form
        title=""
        subtitle=""
        action="{{ route('reports_update.handel') }}"
        method="POST"
        enctype="multipart/form-data"
    >

        <div class="c__title_subtitle">
            <h3 class="F_h1">{{ __('Создать отчет') }}</h3>
            <div class="F_h2 pad_t5"><span>{{__('Данные будут проверены модератоом')}}</span></div>
        </div>

        @include('dashboard.report.forms._partial.update_inputs', ['report' => ($report)??null])


        <div class="slotButtons slotButtons__right pad_t15">
            <div class=" text_input w_30">
                <input type="hidden" value="{{ $user->id  }}" name="id">
                <input type="hidden" value="{{ $report->id  }}" name="report_id">
                <x-forms.primary-button>
                    {{ __('Отправить') }}
                </x-forms.primary-button>
            </div>
        </div>

    </x-forms.auth-form>

</div>

