@extends('layouts.layout_cabinet')
@section('title', ($seo_title) ?? __('Кабинет пользователя - полисы') )
@section('description', ($seo_description)?? __('Кабинет пользователя - полисы') )
@section('keywords', ($seo_keywords)?? __('Кабинет пользователя - полисы') )
@section('cabinet')
    <main class="m_cabinet">

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
                                    <h3 class="F_h1">{{ __('Мои полисы') }}</h3>
                                    {{--   <div class="F_h2 pad_t5"><span>{{__('Список всех имеющихся полисов.')}}</span></div>--}}
                                </div>

                                <div class="calc_top_th color_grey" style="display: block;">
                                    <div class="c_r__company_flex">
                                        <div class="c_r__flex_1">
                                            <div class="td">Компания / Тип страхования</div>
                                        </div>
                                        <div class="c_r__flex_2">
                                            <div class="c_r__month">
                                                <div class="td">Срок</div>
                                            </div>
                                            <div class="c_r__price">
                                                <div class="td">Цена</div>
                                            </div>
                                            <div class="c_r__button_2">Полис</div>
                                        </div>
                                    </div>
                                </div>

                                @if(isset($items))

                                @foreach($items as $item)

                                    <div class="c_r__company_flex cborder">
                                        <div class="c_r__flex_1">
                                            <div class="c_r__img" title="{{$item->company->title}}"
                                                 style="background-image: url('{{ Storage::url($item->company->img) }}')">
                                            </div>
                                            <div class="c_r__title_2">
                                                <div class="c_r__title_2__policy">{{ $item->title }}</div>
                                                <div class="c_r__title_2__company">{{ $item->company->title }}</div>
                                            </div>
                                        </div>

                                        <div class="c_r__flex_2">
                                            <div class="c_r__month">12 месяцев</div>
                                            <div class="c_r__price">{{ $item->price }}</div>
                                            <div class="c_r__button_2">
                                                <div class="c_r__button__pdf"></div>
                                                <div class="c_r__button__date">До <span>{{rusdate3($item->created_at)}}</span></div>
                                            </div>


                                        </div>
                                    </div>

                                @endforeach

                                @endif

                            </div>


                        </div>
                    </div>

                </div>
            </div><!--.cabinet-->
        </div>
    </main>
@endsection

