@extends('html.email.layouts.layout_default_mail')
@section('title', 'Пользователь '. $data['name'] .' изменил личные данные.')
@section('description')
    {{__('Необходимо корректно проверить данные перед публикацией.')}}<br>
@endsection
@section('content')
    <p style="word-wrap: break-word; color: #282828"><b>{{__('Имя:')}}</b> {{$data['name']}}<br><b>{{__('ФИО:')}}</b> {{$data['username']}}<br><b>{{__('Телефон:')}}</b> {{$data['phone']}}<br><b>{{__('Дата рождения:')}}</b> {{rusdate3($data['birthday'])}}</p>
    <hr style=" margin-top: 1rem; margin-bottom: 1.4rem;  border: 0; border-top: 1px solid rgba(0, 0, 0, 0.1);">
    <p><a href="{{ route('update_user_self', ['token'=> $data['hash'], 'id' => $data['id']  ]) }}" class="btn btn-primary" style="background: #29abe2;border-radius: 5px;color: #ffffff;display: inline-block;padding: 10px 15px 10px 15px;text-decoration: none;">{{ __('Одобрить изменения') }}</a></p>
    <p style="word-wrap: break-word;">{{ route('update_user_self', ['token'=> $data['hash'], 'id' => $data['id']  ]) }}</p>
@endsection

