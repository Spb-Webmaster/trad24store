@extends('layouts.layout_cabinet')
@section('title', ($seo_title) ?? __('Редактировать профиль') )
@section('description', ($seo_description)?? __('Редактировать профиль') )
@section('keywords', ($seo_keywords)?? __('Редактировать профиль') )
@section('cabinet')
    <main class="m_cabinet">

        <div class="auth">
            <div class="cabinet">
                <div class="block">

                    @include('dashboard._partial.top', ['title' => 'Редактировать профиль', 'view' => true])

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
                                    <h3 class="F_h1">{{ __('Редактировать профиль') }}</h3>
                                    <div class="F_h2 pad_t5"><span>{{__('Изменения будут проверены модератоом')}}</span></div>
                                </div>
                                @include('dashboard.forms.edit_profile_fulldata')



                            </div>


                        </div>
                    </div>

                </div>
            </div><!--.cabinet-->
        </div>
    </main>
@endsection


