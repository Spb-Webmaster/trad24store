<x-forms.article-form
    title=""
    subtitle=""
    action="{{ route($route) }}"
    method="POST"
>

    <div class="flex_search_form">

        <div class="text_input s_input_left">
            <x-forms.text-input_fromLabel
                type="text"
                name="mediator_search"
                placeholder="Имя медиатора, email или телефон"
                value="{{ old('mediator_search')?:((isset($mediator_search))?$mediator_search:'') }}"
                class="input mediator_search"
            />
            <x-forms.error class="error_mediator_search"/>
        </div>
        <div class="text_input s_input_center">
            <select class="js-chosen" name="mediator_city"
                    placeholder="Выбрать город">
                <optgroup label="Города Казахстана">
                    <option value="0">Все</option>
                    @if(isset($cities))
                        @php
                            if(!$mediator_city) {
                                $mediator_city  = 0;
                            }
                        @endphp
                        @foreach($cities as $city)

                            <option @if($mediator_city == $city->id ) selected
                                    @endif value="{{ $city->id }}">{{ $city->title }}</option>

                        @endforeach
                    @endif

                </optgroup>

            </select>
        </div>
        <div class="text_input s_input_center_2">
            <x-forms.button class="button_normal">
                {{__('Найти')}}
            </x-forms.button>
        </div>

        <div class="text_input s_input_right">
            <div data-replace="{{ route($reload) }}" class="button clear_form_2 clear_form_2__js">Очистить</div>
        </div>

    </div>


</x-forms.article-form>
