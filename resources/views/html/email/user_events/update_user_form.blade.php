@php
    $user = \App\Models\User::find($data['id']); /** получим новый объект и распарсим его */
@endphp
@extends('html.email.layouts.layout_default_mail')
@section('title', 'Пользователь '. $user->user .' изменил данные в своем ЛК.')
@section('description')
    {{__('Необходимо корректно проверить данные перед публикацией.')}}<br>
@endsection
@section('content')
    <p style="word-wrap: break-word; color: #282828">
        <b>{{__('Реестр медиаторов:')}}</b> {{ ($user->user_type->type)??'' }} <br>
        <b>{{__('Компания:')}}</b> {{ ($user->company)??' - ' }} <br>
        <b>{{__('Сертификат:')}}</b> {{ ($user->certificate)??'' }} <br>
        <b>{{__('Город:')}}</b> @foreach($user->user_city as $city)
            @if($loop->last)
                {{ $city->title }}
            @else
                {{ $city->title }},
            @endif
        @endforeach <br>
        <b>{{ __('Показать контакты:') }}</b> @if($user->active_contact)
            {{ __('Да') }}
        @else
            {{ __('Нет') }}
        @endif <br>
        <b>{{ __('Адрес:') }}</b> @if($user->street)
            {{ $user->street }},
            <span>д.</span> {{ ($user->home)?:' - ' }},
            <span>Офис/кв.</span> {{ ($user->office)?:' - '}}
        @endif <br>
        <b>{{__('Статус')}}:</b> @if($user->status)
            {{ $user->user_status }}
        @endif
        <br>

        <b>{{ __('Язык медиации:') }}</b> @foreach($user->user_language as $language)
            @if($loop->last)
                {{ $language->title }}
            @else
                {{ $language->title }},
            @endif
        @endforeach<br>
        <b>{{ __('Виды медиации:') }}</b> @foreach($user->user_list as $list)
            @if($loop->last)
                {{ $list->title }}
            @else
                {{ $list->title }},
            @endif
        @endforeach<br>
        <b>{{ __('Тренер медиатор:') }} </b>{{ $user->user_teacher }}</p>

    <p style="line-height: 1.4em; color: #858585; font-weight: 200;  font-size: 1em;">
        <b>Дополнительно (текстовые поля)</b>
    </p>

    <p style="word-wrap: break-word; color: #282828">
        <b>{{ __('Сфера специализации:') }}</b><br>{!!  $user->sphere !!}<br>
        <b>{{ __('Опыт работы:') }}</b><br>{!!   $user->oput !!}<br>
        <b>{{ __('Дополнительно:') }}</b><br>{!!  $user->dop !!}<br>
    </p>

    <p style="line-height: 1.4em; color: #858585; font-weight: 200;  font-size: 1em;">
        <b>Контактные данные</b>
    </p>

    <p style="word-wrap: break-word; color: #282828">
        <b>{{ __('Показывать контакты:') }}</b> {{ ($user->active_contact)?'Да':'Нет' }}<br>
        <b>{{ __('Telegram:') }}</b> {{ $user->telegram }}<br>
        <b>{{ __('WhatsApp:') }}</b> {{ $user->whatsapp }}<br>
        <b>{{ __('Facebook:') }}</b> {{ $user->social }}<br>
        <b>{{ __('Website:') }}</b> {{ $user->website }}<br>


    </p>
    <hr style=" margin-top: 1rem; margin-bottom: 1.4rem;  border: 0; border-top: 1px solid rgba(0, 0, 0, 0.1);">
    <p><a href="{{ route('update_user_self', ['token'=> $data['hash'], 'id' => $user->id  ]) }}"
          class="btn btn-primary"
          style="background: #29abe2;border-radius: 5px;color: #ffffff;display: inline-block;padding: 10px 15px 10px 15px;text-decoration: none;">{{ __('Одобрить изменения') }}</a>
    </p>
    <p style="word-wrap: break-word;">{{ route('update_user_self', ['token'=> $data['hash'], 'id' => $user->id  ]) }}</p>

@endsection

