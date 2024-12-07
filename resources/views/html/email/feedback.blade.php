@extends('html.email.layouts.layout_default_mail')
@section('title', 'Отзыв о медиаторе.')
@section('description')
    {{__('Пользователь оставил отзыв.')}}<br>
@endsection
@section('content')
    <p style="word-wrap: break-word; color: #282828"><b>{{__('Имя отправителя:')}}</b> {{$data['name']}}<br><b>{{__('Телефон отправителя:')}}</b> {{$data['phone']}}<br><b>{{__('Email отправителя:')}}</b> {{$data['email']}}</p>
    <hr style=" margin-top: 1rem; margin-bottom: 1.4rem;  border: 0; border-top: 1px solid rgba(0, 0, 0, 0.1);">
    <p style="word-wrap: break-word; color: #282828"><b>{{__('Медиатор:')}}</b> {{$data['mediator_name']}}<br><b>{{__('Телефон медиатора:')}}</b> {{$data['mediator_phone']}}<br><b>{{__('Email медиатора:')}}</b> {{$data['mediator_email']}}<br><b>{{__('Оценка:')}}</b> {{$data['stars']}}</p>
    <p style="word-wrap: break-word; color: #282828"><b>{{__('Отзыв:')}}</b><br> {!! $data['feedback']!!}</p>




    <p><a href="{{ config('app.app_url') . '/login' }}" class="btn btn-primary" style="background: #29abe2;border-radius: 5px;color: #ffffff;display: inline-block;padding: 10px 15px 10px 15px;text-decoration: none;">{{ __('Войти на сайт') }}</a></p>
    <p style="word-wrap: break-word;">{{__('Страница перехода')}} -
        <span style=" color: #29abe2"> {{$data['url']}}</span></p>
@endsection

