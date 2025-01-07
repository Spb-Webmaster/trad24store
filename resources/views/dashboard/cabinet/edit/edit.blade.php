@extends('layouts.layout_cabinet')
<x-seo.meta
    title="Редактировать профиль  - {{ $user->user }} "
    description="Редактировать профиль"
    keywords="Редактировать профиль"
/>
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

                                @include('dashboard.forms.edit_profile_fulldata')

                                <div class="c__title_subtitle pad_t32">
                                    <h3 class="F_h1">{{ __('Мои документы. Личные документы не публикуются') }}</h3>
                                    <div class="F_h2 pad_t5"><span></span></div>
                                </div>

                                @include('dashboard.forms.edit_profile_self_user_files')

                                <div class="c__title_subtitle ">
                                    <h3 class="F_h1">{{ __('Сертификаты') }}</h3>
                                    <div class="F_h2 pad_t5"><span></span></div>
                                </div>

                                @include('dashboard.forms.edit_profile_certificate_user_files')


                            </div>


                        </div>
                    </div>

                </div>
            </div><!--.cabinet-->
        </div>
    </main>
@endsection


