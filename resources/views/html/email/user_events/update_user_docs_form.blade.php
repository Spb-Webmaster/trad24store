@extends('html.email.layouts.layout_default_mail')
@section('title', 'Пользователь '. \App\Models\User::find($item['id'])->user .' изменил личные данные.')
@section('description')
    {{__('Необходимо корректно проверить изображения  перед публикацией.')}}<br>
@endsection
@section('content')
    <p style="word-wrap: break-word; color: #282828"><b>{{__('Документы:')}}</b><br>
        @foreach($item['files'] as $img)

            <img style="padding: 5px 20px 5px 0; width: 100%; height:auto; box-sizing: border-box" alt="logo" width="234" height="48" loading="lazy"  src="{{ Storage::url($img['json_file_file']) }}"><br>
            <a href="{{ Storage::url($img['json_file_file']) }}">{{ Storage::url($img['json_file_file']) }}</a><br>

        @endforeach
    </p>
    <hr style=" margin-top: 1rem; margin-bottom: 1.4rem;  border: 0; border-top: 1px solid rgba(0, 0, 0, 0.1);">
    <p><a href="{{ route('update_user_self', ['token'=> $item['hash'], 'id' => $item['id']  ]) }}" class="btn btn-primary" style="background: #29abe2;border-radius: 5px;color: #ffffff;display: inline-block;padding: 10px 15px 10px 15px;text-decoration: none;">{{ __('Одобрить изменения') }}</a></p>
    <p style="word-wrap: break-word;">{{ route('update_user_self', ['token'=> $item['hash'], 'id' => $item['id']  ]) }}</p>
@endsection


