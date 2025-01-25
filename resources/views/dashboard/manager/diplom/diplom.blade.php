@extends('layouts.layout_cabinet')
<x-seo.meta
    title="{{ $item->title }} = {{ $item->name }}"
    description="{{ $item->title }} = {{ $item->name }}"
    keywords="{{ $item->title }} = {{ $item->name }}"
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
                                    <h3 class="F_h1">{{ __('Диплом') }} {{ $item->title }}</h3>
                                    <div class="F_h2 pad_t5"><span>{{__('Редактировать диплом')}}</span></div>
                                </div>

                                <div class="dashboardBox">


                                </div><!--.dashboardBox-->
                            </div>


                        </div>
                    </div>

                </div>
            </div><!--.cabinet-->
        </div>
    </main>
@endsection



