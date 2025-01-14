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





                                        <div class="formCabinet">
                                            <x-forms.auth-form
                                                title=""
                                                subtitle=""
                                                action="{{ route('active_comments') }}"
                                                method="POST"
                                                enctype="multipart/form-data"
                                            >

                                                <div class="c__block pad_b8 pad_t20">
                                                    <div class="c__flex">


                                                        <div class="c__flex_50 c__flex_50_left">

                                                            <div class="text_input">

                                                                <span class="blue_label">Показать в профиле</span>
                                                                <div class="selectClass _active_comments">
                                                                    <select class="js-chosen" data-placeholder="Показать в профиле" name="active_comments"
                                                                            id="registerActive_contact">

                                                                        <option value="1" @if($user->active_comments)
                                                                            {{ 'selected' }}
                                                                            @endif>Да
                                                                        </option>
                                                                        <option value="0" @if(!$user->active_comments)
                                                                            {{ 'selected' }}
                                                                            @endif>Нет
                                                                        </option>
                                                                    </select>
                                                                    <label class="labelInput show" for="registerActive_comments"></label>
                                                                    <x-forms.error class="error_active_comments"/>
                                                                </div>

                                                            </div>


                                                        </div><!--.c__flex_50_left-->

                                                        <div class="c__flex_50 c__flex_50_right">

                                                            <div class="text_input">
                                                                <div class="active_contact">{{ config('site.constants.active_comments_text') }}</div>
                                                            </div>


                                                        </div><!--.c__flex_50_right-->

                                                    </div><!--.c__flex-->
                                                </div>

                                                <div class="slotButtons slotButtons__right pad_t15">
                                                    <div class=" text_input w_30">
                                                        <input type="hidden" value="{{ $user->id  }}" name="id">
                                                        <x-forms.primary-button>
                                                            {{ __('Изменить профиль') }}
                                                        </x-forms.primary-button>
                                                    </div>
                                                </div>

                                            </x-forms.auth-form>

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



