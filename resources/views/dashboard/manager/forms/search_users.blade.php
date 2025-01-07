<div class="formCabinet formCabinetInput_bunon pad_b1_important">
    <x-forms.form
        title=""
        subtitle=""
        action="{{ route('search.users') }}"
        method="POST"
    >
                   <div class="text_input">
                        <x-forms.text-input_fromLabel
                            type="text"
                            id="searchSearch"
                            name="search"
                            placeholder="Поиск"
                            value="{{ (isset($item->search)) ? $item->search : ((isset($search))? $search :'') }}"
                            class="input search"
                            required="true"
                            :isError="$errors->has('search')"
                        />
                        <x-forms.error class="error_search"/>

                    </div>


        <div class="slotButtons slotButtons__right pad_t15">
            <div class=" text_input w_30">
                <x-forms.button>
                    {{ __('Поиск') }}
                </x-forms.button>
            </div>
        </div>

    </x-forms.form>

    </div>


