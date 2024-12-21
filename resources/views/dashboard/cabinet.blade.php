@extends('layouts.layout_cabinet')
<x-seo.meta
    title="Кабинет пользователя  - {{ $user->user }} "
    description="Кабинет пользователя"
    keywords="Кабинет пользователя"
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

                            <div class="c__title_subtitle">
                                <h3 class="F_h1">{{ __('Персональные данные') }}</h3>
                                <div class="F_h2 pad_t5"><span>{{__('Персональные данные редактируется самостоятельно')}}</span></div>
                            </div>

                            @include('dashboard.forms.edit_profile')

                            <hr>
                            <div class="c__title_subtitle">
                                <h3 class="F_h1">{{ __('Изменить пароль') }}</h3>
                                <div class="F_h2 pad_t5"><span>{{__('Пароль минимум из пяти символов')}}</span></div>
                            </div>

                            @include('dashboard.forms.edit_password')

                        </div>


                    </div>
                </div>

            </div>
        </div><!--.cabinet-->
    </div>
    </main>
@endsection

