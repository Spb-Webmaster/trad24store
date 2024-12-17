@extends('layouts.layout_cabinet')
@section('title', ($seo_title) ?? __('Кабинет пользователя / Фотогалерея') )
@section('description', ($seo_description)?? __('Кабинет пользователя / Фотогалерея') )
@section('keywords', ($seo_keywords)?? __('Кабинет пользователя / Фотогалерея') )
@section('cabinet')
    <div class="auth">
        <div class="cabinet">
            <div class="block">

                <div class="hbox__top pad_b1">
                    <h1>{{__('Личный кабинет')}}</h1>
                </div>

                <div class="cabinet__flex  height_100">
                    <div class="cabinet__left">
                        <div class="cl">

                            @include('dashboard.left_bar.left')

                        </div>
                    </div>

                    <div class="cabinet__right">

                        @include('dashboard.menu.cabinet_menu')

                        <div class="cabinet_radius12_fff">

                            <div class="c__title_subtitle">
                                <h3 class="F_h1">{{ __('Тесты') }}</h3>
                                <div class="F_h2 pad_t5">
                                    <span>{{__('Вы можете спмостоятельно писать на свою страницу.')}}</span>
                                </div>
                            </div>

                   {{--          @include('dashboard.user_test._part')
                             @stack('scripts')--}}
                            <div class="main-container">
                                <div class="editor-container editor-container_classic-editor" id="editor-container">
                                    <div class="editor-container__editor">
                                        <div id="editor"><p>Hello from CKEditor 5!</p></div>
                                    </div>
                                </div>
                            </div>





                        </div>

                    </div>
                </div>

            </div>
        </div><!--.cabinet-->
    </div>
@endsection



