<div class="hbox__top pad_b1">

@if(!isset($view))

    <div class="cab_top_flex">
    <div class="cab_top_flex__left">
        <h1>@if(isset($title)) {{ $title }} @else {{__('Личный кабинет')}}@endif</h1>
    </div>
    <div class="cab_top_flex__right">
        <a class="@if(isset($class)){{ $class }}@endif cab_top_butt_edit" href="{{ route('cabinet.edit') }}">
            {{ __('Редактировать профиль')  }}
        </a>
    </div>

    </div>
    @else
        <div class="cab_top_flex">
        <div class="cab_top_flex__left">
                <h1>@if(isset($title)) {{ $title }} @else {{__('Личный кабинет')}}@endif</h1>
        </div>
        </div>


    @endif

</div>
