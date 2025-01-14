@extends('layouts.layout')
<x-seo.meta
    title="{{ $item->user_type->title }}  - {{ $item->username }} | {{ $item->email }}"
    description="{{ $item->user_type->title }} - {{ $item->username }}"
    keywords="{{ $item->user_type->title }} {{ $item->username }} "

/>
@section('content')
    <main>
        <div class="block">
            <div class="brod pad_b1_important">
                <ul>
                    <li><a href="{{route('home')}}">{{__('Главная')}}</a> •</li>
                    <li><span>{{ $item->user_type->title }}</span> •</li>
                    <li><span>{{ ($item->username)?: $item->name  }}</span></li>
                </ul>

            </div>
        </div>

        <div class="block">
            <h1 class="h1">{{ $item->user_type->title }}</h1>
            <div class="content_Flex">
                <div class="left_bar">
                    @include('pages.users.partial.left_menu')

                </div>
                <div class="center_content">
                    <div class="mediator">
                        <div class="mediator__flex">
                            <div class="mediator_left">

                                <div class="mediator_left__block_1">
                                    <div class="mediator_left__flex_1">
                                        <div class="mediator_left__avatar">
                                            <div class="m_avamed"
                                                 style="background-image: url('@if($item->avatar) {{ Storage::disk('public')->url($item->avatar) }} @else {!! 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzYiIGhlaWdodD0iMzYiIHZpZXdCb3g9IjAgMCAzNiAzNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xOCAwQzguMDU5NSAwIDAgOC4wNTk1IDAgMThDMCAyNy45NDA1IDguMDU5NSAzNiAxOCAzNkMyNy45NDA1IDM2IDM2IDI3Ljk0MDUgMzYgMThDMzYgOC4wNTk1IDI3Ljk0MDUgMCAxOCAwWk0xOCA3LjUwMDA3QzIxLjcyMTUgNy41MDAwNyAyNC43NSAxMC41Mjg2IDI0Ljc1IDE0LjI1MDFDMjQuNzUgMTcuOTcxNiAyMS43MjE1IDIxLjAwMDEgMTggMjEuMDAwMUMxNC4yNzg1IDIxLjAwMDEgMTEuMjUgMTcuOTcxNiAxMS4yNSAxNC4yNTAxQzExLjI1IDEwLjUyODYgMTQuMjc4NSA3LjUwMDA3IDE4IDcuNTAwMDdaTTcuOTQ1NTEgMjkuMDk4NEMxMC42MDk1IDMxLjUxNDkgMTQuMTMgMzIuOTk5OSAxOCAzMi45OTk5QzIxLjg3IDMyLjk5OTkgMjUuMzkwNSAzMS41MTQ5IDI4LjA1NDUgMjkuMDk4NEMyNi43ODU1IDI2LjE2MTQgMjIuNzc2IDIzLjk5OTkgMTggMjMuOTk5OUMxMy4yMjQgMjMuOTk5OSA5LjIxNDUxIDI2LjE2MTQgNy45NDU1MSAyOS4wOTg0WiIgZmlsbD0iI0UwRTBFMCIvPgo8L3N2Zz4K' !!} @endif '); width: 123px; height: 123px"></div>

                                        </div>
                                        <div class="mediator_left__content">
                                            @include('pages.users.partial.stars', ['star' =>  (!is_null($item->stars))?$item->stars:0 ])
                                            <h2 class="h2_blue">{{ $item->user  }}</h2>
                                            <div class="desc">
                                                <p class="">{{ $item->user_type->type }}</p>
                                                @if($item->certificate)
                                                    <p class="">{{ $item->certificate }}</p>
                                                @endif
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mediator__options">
                                        <div class="item_cities _item_opt">
                                            <div class="_label">Город:</div>
                                            <div class="_value">@foreach($item->user_city as $city)
                                                    @if($loop->last)
                                                        {{ $city->title }}
                                                    @else
                                                        {{ $city->title }},
                                                    @endif

                                                @endforeach</div>
                                        </div>
                                        @if($item->active_contact)

                                            <div class="item_address _item_opt">
                                                <div class="_label">Адрес:</div>
                                                <div class="_value">
                                                    @if($item->street)
                                                        {{ $item->street }},
                                                        <span>д.</span> {{ ($item->home)?:' - ' }},
                                                        <span>Офис/кв.</span> {{ ($item->office)?:' - '}}
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                        <div class="item_status _item_opt">
                                            <div class="_label">Статус:</div>
                                            <div class="_value">
                                                @if($item->status)

                                                    {{ $item->user_status }}

                                                @endif
                                            </div>
                                        </div>
                                        @if($item->sphere)

                                            <div class="item_sphere _item_opt">
                                                <div class="_label">Сфера специализации:</div>
                                                <div class="_value">
                                                    {!!  $item->sphere !!}
                                                </div>
                                            </div>
                                        @endif

                                        <div class="item_language _item_opt">
                                            <div class="_label">Язык медиации:</div>
                                            <div class="_value">
                                                <div class="_value">@foreach($item->user_language as $language)
                                                        @if($loop->last)
                                                            {{ $language->title }}
                                                        @else
                                                            {{ $language->title }},
                                                        @endif

                                                    @endforeach</div>
                                            </div>
                                        </div>
                                        @if($item->oput)
                                            <div class="item_oput _item_opt">
                                                <div class="_label">Опыт работы:</div>
                                                <div class="_value">
                                                    <div class="_value">

                                                        {!!   $item->oput !!}

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($item->dop)

                                            <div class="item_dop _item_opt">
                                                <div class="_label">Дополнительно:</div>
                                                <div class="_value">
                                                    <div class="_value">
                                                        {!!  $item->dop !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="item_language _item_opt">
                                            <div class="_label">Виды медиации:</div>
                                            <div class="_value">
                                                <div class="_value">@foreach($item->user_list as $list)
                                                        @if($loop->last)
                                                            {{ $list->title }}
                                                        @else
                                                            {{ $list->title }},
                                                        @endif

                                                    @endforeach</div>
                                            </div>
                                        </div>

                                        @if($item->teacher)
                                            <div class="item_teacher _item_opt">
                                                <div class="_label">Тренер медиатор:</div>
                                                <div class="_value">
                                                    <div class="_value">
                                                        {{ $item->user_teacher }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                    </div>


                                </div>
                                @if($item->active_comments)
                                        @include('pages.users.partial.comments')
                                @endif

                            </div>

                            <div class="mediator_right">
                                <h3 class="h3_bold">Контакты</h3>


                                @if($item->status_pay_subscr() == 0)
                                    {{-- Нет подписки--}}
                                    <div class="m_cont">
                                        <div class="m_cont__label">
                                            Почта:
                                        </div>
                                        <div class="m_cont__value">
                                            {{ $item->email }}
                                        </div>

                                    </div>

                                    <div class="m_cont">
                                        <div class="m_cont__label">
                                            Телефон:
                                        </div>
                                        <div class="m_cont__value">
                                            {{ (format_phone($item->phone))?:' - ' }}
                                        </div>

                                    </div>
                                @endif

                                @if($item->status_pay_subscr() == 2)
                                    {{-- Ожидает--}}
                                    <div class="m_cont">
                                        <div class="m_cont__label">
                                            Почта:
                                        </div>
                                        <div class="m_cont__value">
                                            {{ $item->email }}
                                        </div>

                                    </div>

                                    <div class="m_cont">
                                        <div class="m_cont__label">
                                            Телефон:
                                        </div>
                                        <div class="m_cont__value">
                                            {{ (format_phone($item->phone))?:' - ' }}
                                        </div>

                                    </div>
                                @endif

                                @if($item->status_pay_subscr() == 1)
                                    {{-- Есть подписка--}}

                                @if($item->active_contact)

                                        <div class="m_cont">
                                            <div class="m_cont__label">
                                                Адрес:
                                            </div>
                                            <div class="m_cont__value">
                                                @if($item->street)
                                                    {{ $item->street }},
                                                    <span>д.</span> {{ ($item->home)?:' - ' }},
                                                    <span>Офис/кв.</span> {{ ($item->office)?:' - '}}
                                                @endif
                                            </div>

                                        </div>

                                        <div class="m_cont">
                                            <div class="m_cont__label">
                                                Почта:
                                            </div>
                                            <div class="m_cont__value">
                                                {{ $item->email }}
                                            </div>

                                        </div>

                                        <div class="m_cont">
                                            <div class="m_cont__label">
                                                Телефон:
                                            </div>
                                            <div class="m_cont__value">
                                                {{ (format_phone($item->phone))?:' - ' }}
                                            </div>

                                        </div>


                                        <div class="m_cont">
                                            <div class="m_cont__label">
                                                Telegram:
                                            </div>
                                            <div class="m_cont__value">
                                                {{ ($item->telegram)?:' - ' }}
                                            </div>

                                        </div>

                                        <div class="m_cont">
                                            <div class="m_cont__label">
                                                WhatsApp:
                                            </div>
                                            <div class="m_cont__value">
                                                {{ ($item->whatsapp)?:' - ' }}
                                            </div>

                                        </div>



                                        <div class="m_cont">
                                            <div class="m_cont__label">
                                                Instagram:
                                            </div>
                                            <div class="m_cont__value">
                                                {{ ($item->instagram)?:' - ' }}
                                            </div>

                                        </div>

                                        <div class="m_cont">
                                            <div class="m_cont__label">
                                                FaceBook:
                                            </div>
                                            <div class="m_cont__value">
                                                {{ ($item->social)?:' - ' }}
                                            </div>

                                        </div>

                                        <div class="m_cont">
                                            <div class="m_cont__label">
                                                WebSite:
                                            </div>
                                            <div class="m_cont__value">
                                                {{ ($item->website)?:' - ' }}
                                            </div>

                                        </div>

                                    @else

                                        <div class="m_cont">
                                            <div class="m_cont__label">
                                                Почта:
                                            </div>
                                            <div class="m_cont__value">
                                                {{ $item->email }}
                                            </div>

                                        </div>

                                        <div class="m_cont">
                                            <div class="m_cont__label">
                                                Телефон:
                                            </div>
                                            <div class="m_cont__value">
                                                {{ (format_phone($item->phone))?:' - ' }}
                                            </div>

                                        </div>

                                    @endif
                                @endif


                                @if( $item->user_mediator_sum )
                                    <x-dashboard.report.report_sum
                                        sum="{{$item->user_mediator_sum}}"
                                        sem="{{$item->user_mediator_sem}}"
                                        ugo="{{$item->user_mediator_ugo}}"
                                        gra="{{$item->user_mediator_gra}}"
                                        kor="{{$item->user_mediator_kor}}"
                                        uve="{{$item->user_mediator_uve}}"
                                        tru="{{$item->user_mediator_tru}}"
                                        ban="{{$item->user_mediator_ban}}"
                                    />
                                @endif

                            </div>
                        </div>



                    </div>
                </div>


            </div>
        </div>
    </main>
@endsection


