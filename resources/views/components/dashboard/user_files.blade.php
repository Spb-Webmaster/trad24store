@props([
   'title' => '',
   'name' => '',
   'array'=> [],
   'count' => 4,
   'free' => 0,
   'field' => '',
])

@php
    $empty_file = '<div class="input-file-list-item"><span class="input-file-list-name"><img class="_ext" src="'.Storage::url('images/icons/none.svg').'" title="null"></span></div>';
@endphp
<div class="c__block wrapp_loading__js">

    <div class="blue_label blue_label__js">{{ $title }}</div>
    <div class="c__flex parent_loading__js">

        <div class="c__flex_50 c__flex_50_left">

            <div class="text_input __load__js">
                <div class="input-file-row-load">
                    <div class="input-file-list">
                        @if(count($array))

                            @foreach($array as $files)

                                <div class="input-file-list-item" >
                                    {!!  $files['html']  !!}
                                </div>

                            @endforeach

                            @for($i=4;$i>count($array);$i--)
                                {!! $empty_file !!}
                            @endfor

                        @else
                            @for($i=1;$i<=4;$i++)
                                {!! $empty_file !!}
                            @endfor
                        @endif

                    </div>
                </div>
            </div>
        </div><!--.c__flex_50_left-->

        <div class="c__flex_50 c__flex_50_right">
            <div class="text_input">

                <div class="input-file-row">
                    <label class="input-file">
                        <input type="file" data-field="{{ $field }}" name="{{ $field.'[]' }}" multiple
                               accept=".jpg,.jpeg,.png,.pdf,.xml,.txt,.xlsx,.xls,.xltx,.xlt,.xlsm,.xltm,.xlsb,.xps,.htm,.html,.csv,.ods,.docx,.doc,.dotx,.dot,.docm,.dotm">
                        <span>+</span>
                    </label>
                  {{--  <div class="input-file-list"></div>--}}
                </div>
                <div class="text_load_file">Файлов для загрузки: <span class="limit__js">{{ $count  - $free }}</span>
                </div>


            </div>
        </div><!--.c__flex_50_right-->

    </div>
</div>



