@extends('layouts.layout_cabinet')
<x-seo.meta
    title="{{ $item->title }}"
    description="{{ $item->title }}"
    keywords="{{ $item->title }}"
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
                                    <h3 class="F_h1">{{ __('Новости') }}</h3>
                                    <div class="F_h2 pad_t5"><span>{{ __('Новости от администрации портала') }}</span>
                                    </div>
                                </div>

                                    <div class="user_page">

                                        <div class="m_items">
                                                <a href="{{ route('m_user_new', ['id' => $item->id]) }}" class="a_temp">
                                                    <div class="user_item_title">{{ $item->title }}</div>
                                                    <div class="user_item_teaser desc">{!!  $item->desc !!}</div>
                                                    <div class="user_item_date">{{ rusdate3($item->created_at) }}</div>

                                                </a>

                                        </div>

                                    </div>



                            </div>


                        </div>
                    </div>

                </div>
            </div><!--.cabinet-->
        </div>
    </main>
@endsection




