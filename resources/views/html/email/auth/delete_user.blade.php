@extends('html.email.layouts.layout_default_mail')
@section('title', 'Запрос на удаление')
@section('description', 'Нужно удалить аккаунт и все файлы.')
@section('content')
    <p style="word-wrap: break-word;"><b>{{__('Логин')}}</b> - <span style="color: #282828">{{ $user['email']  }}</span></p>
    <p style="word-wrap: break-word; color: #282828">В панели пользователя виден статус ожидания на удаление своей анкеты. Если пользователь передумал вам необходимо изменить статус удаления анкеты. Это можно делать только админу сайта.</p>


    <p><a href="{{ config('app.app_url') . '/admin' }}" class="btn btn-primary" style="background: #29abe2;border-radius: 5px;color: #ffffff;display: inline-block;padding: 10px 15px 10px 15px;text-decoration: none;">{{ __('Войти на сайт') }}</a></p>

@endsection

