@extends('layouts.layout_cabinet')
<x-seo.meta
    title="Кабинет пользователя | Комментарии  - {{ $user->user }} "
    description="Кабинет пользователя | Комментарии"
    keywords="Кабинет пользователя | Комментарии"
/>

@section('cabinet')
    <main class="m_cabinet">

        <div class="auth">
            <div class="cabinet">
                <div class="block">

                    @include('dashboard._partial.top')

                    <div class="cabinet__flex  height_100">
                        <div class="cabinet__left">
                            <div class="cl">

                                @include('dashboard.left_bar.left')

                            </div>
                        </div>
                        <div class="cabinet__right">
                            @include('dashboard.menu.cabinet_menu')


                            <div class="cabinet_radius12_fff">
                                <div class="c__title_subtitle pad_b13_important">
                                    <h3 class="F_h1">Отзывы о Вас</h3>
                                    <div class="F_h2 pad_t5"><span>Эти отзывы собраны на вашей странице, они прошли модерацию</span>
                                    </div>
                                </div>

                                @if($user->status_pay_subscr() == 0)
                                    <br>
                                    <div class="cabinet_radius12_fff yellow_mess">
                                        @include('dashboard.comment._partial.comments_no')
                                    </div>
                                    <br>
                                @else
                                    @if($user->status_pay_subscr() == 1)

                                        <div class="text_input">
                                            <div class="active_contact">{!! config('site.constants.active_comments_text') !!}</div>
                                        </div>
                                    @endif
                                    @if($user->status_pay_subscr() == 2)
                                            <br>
                                            <div class="cabinet_radius12_fff yellow_mess">
                                                @include('dashboard.comment._partial.comments_wait')
                                            </div>
                                            <br>
                                    @endif
                                @endif


                                @if(count($user->user_comment))

                                    <div class="com_responce">

                                            @foreach($comments as $comment)

                                                <div class="com_responce_tr">
                                                    <div class="com_responce__flex">
                                                        <div class="com_responce__left">
                                                            <div class="com_responce__name">{{ $comment->title }}</div>
                                                            <div class="com_responce__stars">@include('pages.users.partial.stars', ['star'=> $comment->stars])</div>

                                                        </div>
                                                        <div class="com_responce__right">
                                                            {!! $comment->desc !!}

                                                        </div>
                                                    </div>

                                                </div><!--.com_responce_tr-->
                                            @endforeach

                                            {{ $comments->withQueryString()->links('pagination::default') }}


                                    </div><!--.com_responce-->

                                @else

                                    <div class="c__title_subtitle">
                                        <h3 class="F_h1">Отзывы</h3>
                                        <div class="F_h2 pad_t5"><span>У вас нет отзывов</span></div>
                                    </div>
                                @endif


                            </div>


                        </div>
                    </div>

                </div>
            </div><!--.cabinet-->
        </div>
    </main>
@endsection



