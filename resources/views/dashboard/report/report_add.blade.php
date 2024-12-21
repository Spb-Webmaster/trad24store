@extends('layouts.layout_cabinet')
<x-seo.meta
    title="Cоздать отчет | Кабинет пользователя | Отчеты  - {{ $user->user }} "
    description="Кабинет пользователя | Отчеты"
    keywords="Кабинет пользователя | Отчеты"
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

                                @include('dashboard.report.forms.add_report')




                            </div>

                        </div>
                    </div>

                </div>
            </div><!--.cabinet-->
        </div>
    </main>
@endsection



