@extends('html.email.layouts.layout_default_mail')
@section('title', 'Пользователь  создал отчет')
@section('description')
    {{ $item->title }}<br>
@endsection
@section('content')
    <p style="word-wrap: break-word; color: #282828"><b>{{__('Отчет:')}}</b><br>

    <div class="count_to_mediators">

        <div class="count_t_m_middle">
            <div class="count_m_opt">
                Семейная
                <span style="color: #282828">{{ ($item->sem)??'-' }}</span></div><!--.count_m_opt-->
            <div class="count_m_opt">
                Уголовная
                <span style="color: #282828">{{ ($item->ugo)??'-' }}</span></div><!--.count_m_opt-->
            <div class="count_m_opt">
                Гражданская
                <span style="color: #282828">{{ ($item->gra)??'-' }}</span></div><!--.count_m_opt-->
            <div class="count_m_opt">
                Корпоративная
                <span style="color: #282828">{{ ($item->kor)??'-' }}</span></div><!--.count_m_opt-->
            <div class="count_m_opt">
                Ювенальная
                <span style="color: #282828">{{ ($item->uve)??'-' }}</span></div><!--.count_m_opt-->
            <div class="count_m_opt">
                Трудовые споры
                <span style="color: #282828">{{ ($item->tru)??'-' }}</span></div><!--.count_m_opt-->
            <div class="count_m_opt">
                Банковские споры
                <span style="color: #282828">{{ ($item->ban)??'-' }}</span></div><!--.count_m_opt-->
        </div>
        <div class="count_t_m_bottom"></div>
    </div>



    </p>
    <hr style=" margin-top: 1rem; margin-bottom: 1.4rem;  border: 0; border-top: 1px solid rgba(0, 0, 0, 0.1);">
    <p><a href="{{ config('app.app_url') . '/login' }}" class="btn btn-primary" style="background: #29abe2;border-radius: 5px;color: #ffffff;display: inline-block;padding: 10px 15px 10px 15px;text-decoration: none;">{{ __('Войти на сайт') }}</a></p>
@endsection


