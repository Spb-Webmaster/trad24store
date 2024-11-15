@extends('html.email.layouts.layout_default_mail')
@section('title', 'Форма заявки на обучение или услугу.')
@section('description')
    {{__('Пользователь отправил заявку с сайта.')}}<br>
@endsection
@section('content')
    <p style="word-wrap: break-word; color: #282828"><b>{{__('Имя:')}}</b> {{$data['name']}}<br><b>{{__('Телефон:')}}</b> {{$data['phone']}}<br><b>{{__('Email:')}}</b> {{$data['email']}}</p>
    <p style="word-wrap: break-word; color: #282828"><b>{{ __('Выбрана услуга') }}</b>  {{ $data['type'] }}<br><b>{{ __('Обучение') }}</b> {{$data['training']}}<br><b>{{__('Услуга')}}</b> {{ $data['service'] }}</p>
    <hr style=" margin-top: 1rem; margin-bottom: 1.4rem;  border: 0; border-top: 1px solid rgba(0, 0, 0, 0.1);">
    <p><a href="{{ config('app.app_url') . '/login' }}" class="btn btn-primary" style="background: #29abe2;border-radius: 5px;color: #ffffff;display: inline-block;padding: 10px 15px 10px 15px;text-decoration: none;">{{ __('Войти на сайт') }}</a></p>
    <p style="word-wrap: break-word;">{{__('Страница перехода')}} -
        <span style=" color: #29abe2"> {{$data['url']}}</span></p>
@endsection

