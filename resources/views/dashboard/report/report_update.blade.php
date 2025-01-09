@extends('layouts.layout_cabinet')
<x-seo.meta
    title="Редактировать | Отчеты  - {{ $user->user }} "
    description="Кабинет пользователя | Редактировать"
    keywords="Кабинет пользователя | Редактировать"
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

                                @include('dashboard.report.forms.update_report')


                            </div>

                        </div>
                    </div>

                </div>
            </div><!--.cabinet-->
        </div>
    </main>
@endsection



